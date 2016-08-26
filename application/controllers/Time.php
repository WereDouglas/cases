<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Time extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set('Africa/Kampala');
        $this->load->library('excel');
    }

    public function index() {

        $this->load->view('time-page');
    }

    public function admin() {

        $this->load->view('time-admin');
    }

    public function create() {

        $eventID = $this->GUID();
        $syc = array('id' => $eventID, 'orgID' => $this->session->userdata('orgID'), 'name' => $this->input->post('name'), 'start' => $this->input->post('start'), 'end' => $this->input->post('end'), 'user' => $this->input->post('resource'), 'file' => $this->input->post('file'), 'created' => date('Y-m-d H:i:s'), 'action' => "none", 'status' => $this->input->post('status'));
        $this->Md->save($syc, 'events');
       
        $phpdate = strtotime( $this->input->post('end') );
        $ending = date( 'Y-m-d', $phpdate );
        $message = "You have a task due on ".$ending." for ".$this->input->post('name');
        $emails = $this->Md->query_cell("SELECT * FROM users where name= '" . $this->input->post('resource') . "'", 'email');
        $phones = $this->Md->query_cell("SELECT * FROM users where name= '" . $this->input->post('resource'). "'", 'contact');
        $names = $this->Md->query_cell("SELECT * FROM users where name= '" . $this->input->post('resource') . "'", 'name');

        $mail = array('messageID' => $this->GUID(), 'body' => $message, 'subject' => 'REMINDER', 'date' =>  $ending, 'to' => $names, 'created' => date('Y-m-d H:i:s'), 'from' => $this->session->userdata('orgemail'), 'sent' => 'false', 'type' => 'email', 'orgID' => $this->session->userdata('orgID'), 'action' => 'none', 'taskID' => $eventID, 'contact' => $phones, 'email' => $emails);
        $this->Md->save($mail, 'message');

        $response->id = "task saved";
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function add() {

        $this->load->view('add-time');
    }

    public function resources() {


//$resv = new stdClass();


        $g = new stdClass();
        $g->id = "Clients";
        $g->name = "Staff";
        $g->expanded = true;
        $g->children = array();
        $g->eventHeight = 25;
        $groups[] = $g;
        $query2 = $this->Md->query("select * from users WHERE category='staff'");
        $results = $query2;
        foreach ($results as $res) {

            $r = new stdClass();
            $r->id = $res->name;
            $r->name = $res->name;
            $g->children[] = $r;
        }
        header('Content-Type: application/json');
        echo json_encode($groups);
        //  array_push($all, $resv);
    }

    public function events() {

        $query = $this->Md->query("select * from events WHERE  orgID='" . $this->session->userdata('orgID') . "'");

        foreach ($query as $res) {

            $e = new stdClass();
            $e->id = $res->id;
            $e->text = $res->name;
            $e->start = $res->start;
            $e->end = $res->end;
            $e->resource = $res->user;
            $e->moveDisabled = true;
            $e->resizeDisabled = true;
            $e->clickDisabled = true;
            $e->backColor = "#E69138";   // lighter #F6B26B
            $e->bubbleHtml = "Not Available";
            $events[] = $e;
        }
        header('Content-Type: application/json');
        echo json_encode($events);
        //  array_push($all, $resv);
    }

    public function api() {

        $orgid = urldecode($this->uri->segment(3));
        $result = $this->Md->query("SELECT * FROM time ");

        if ($result) {

            echo json_encode($result);
        }
    }

    public function view() {

        $this->load->helper(array('form', 'url'));
        $fileid = $this->uri->segment(3);

        $query = $this->Md->query("SELECT * FROM file where orgID = '" . $this->session->userdata('orgID') . "'");

        if ($query) {
            $data['files'] = $query;
        } else {
            $data['files'] = array();
        }
        $this->load->view('view-file', $data);
    }

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');

        $file = array('name' => $this->input->post('name'), 'type' => $this->input->post('type'), 'details' => $this->input->post('details'), 'subject' => $this->input->post('subject'), 'client' => $this->input->post('client'), 'lawyer' => $this->input->post('lawyer'), 'no' => $this->input->post('no'), 'type' => $this->input->post('type'), 'citation' => $this->input->post('citation'), 'law' => $this->input->post('law'), 'status' => $this->input->post('status'));
        $this->Md->update_dynamic($id, 'fileID', 'file', $file);
        echo 'FILE INFORMATION UPDATED';
    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $fileID = $this->uri->segment(3);
        $query = $this->Md->cascade($fileID, 'file', 'fileID');
        redirect('/file/view', 'refresh');
    }

}
