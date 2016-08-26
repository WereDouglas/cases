<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message extends CI_Controller {

    function __construct() {
        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->library('email');
        $this->load->library('upload');
        $this->load->model('Md');
    }

    public function index() {

        $query = $this->Md->query("SELECT * FROM message where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['messages'] = $query;
        }
        $this->load->view('message-page', $data);
    }

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function save() {

        $guid = $this->GUID();

        $schedule = $this->input->post('starts');
        if ($schedule == "") {
            $schedule = date('d-m-Y');
        }
        foreach ($this->input->post('ccs') as $cc) {

            $mail = array('message' => $this->input->post('message'), 'subject' => $this->input->post('subject'), 'schedule' => $schedule, 'reciever' => $cc, 'created' => date('Y-m-d H:i:s'), 'org' => $this->session->userdata('emails'), 'sent' => 'false', 'guid' => $guid);
            $this->Md->save($mail, 'emails');
        }
        $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong> Saved and mail will be sent on' . $schedule . '	</strong>									
						</div>');
        redirect('/schedule/mail', 'refresh');

        return;
    }

    public function appmail() {

        $guid = $this->GUID();

        $schedule = $this->input->post('starts');
        if ($schedule == "") {
            $schedule = date('d-m-Y');
        }
        $mail = array('message' => $this->input->post('message'), 'subject' => $this->input->post('subject'), 'schedule' => $schedule, 'reciever' => $this->input->post('email'), 'created' => date('Y-m-d H:i:s'), 'org' => $this->input->post('org'), 'sent' => 'false', 'guid' => $guid);
        $this->Md->save($mail, 'emails');

        return;
    }

    public function mailing() {

        $this->load->library('email');
        $today = date('Y-m-d');
        $get_result = $this->Md->query("SELECT * FROM message WHERE  date='" . $today . "' AND sent ='false' OR sent ='true'");
        foreach ($get_result as $res) {
            if ($res->email != "") {

                $this->email->from($res->from, 'Case Professional');
                $this->email->to($res->email);
                $this->email->subject($res->subject);
                $this->email->message($res->body);
                $this->email->send();
                echo $this->email->print_debugger();
                $data = array('sent' => 'true');
                $this->Md->update_dynamic($res->messageID, 'messageID', 'message', $data);
                echo 'Sent ' . $res->email . '<br>';
            }
        }
    }

    public function users() {
        $query = $this->Md->query("SELECT * FROM users where  org='" . $this->session->userdata('orgid') . "'");
        echo json_encode($query);
    }

    public function delete() {

        if ($this->session->userdata('level') == 1) {
            $this->load->helper(array('form', 'url'));
            $id = $this->uri->segment(3);

            $query = $this->Md->delete($id, 'emails');
            if ($this->db->affected_rows() > 0) {

                $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                Information deleted	</strong>									
						</div>');
                redirect('schedule/mail', 'refresh');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                             Action Failed	</strong>									
						</div>');
                redirect('schedule/email', 'refresh');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                 You cannot carry out this action ' . '	</strong>									
						</div>');
            redirect('/schedule/mail', 'refresh');
        }
    }

}
