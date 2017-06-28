<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

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

        $this->load->helper(array('form', 'url'));
        $query = $this->Md->query("SELECT * FROM library WHERE library.orgID = '" . $this->session->userdata('orgID') . "' ");

        if ($query) {
            $data['docs'] = $query;
        } else {
            $data['docs'] = array();
        }
        

        $this->load->view('view-library', $data);
    }
     

    public function upload() {

        $this->load->helper(array('form', 'url'));
        if ($this->input->post('action') == 'update') {

            $result = $this->Md->check($this->input->post('userID'), 'userID', 'users');

            if (!$result) {
                $id = $this->input->post('userID');
                $user = array('name' => $this->input->post('name'), 'address' => $this->input->post('address'), 'image' => $this->input->post('image'), 'contact' => $this->input->post('contact'), 'designation' => $this->input->post('designation'), 'status' => $this->input->post('status'), 'address' => $this->input->post('address'), 'category' => $this->input->post('category'));

                $this->Md->update_dynamic($id, 'userID', 'users', $user);
                echo 'user information updated';
                return;
            } else {
                $users = array('userID' => $this->input->post('userID'), 'orgID' => $this->input->post('orgID'), 'image' => $this->input->post('image'), 'name' => $this->input->post('name'), 'email' => $this->input->post('email'), 'password' => ($this->input->post('password')), 'designation' => $this->input->post('designation'), 'image' => $this->input->post('image'), 'address' => $this->input->post('address'), 'contact' => $this->input->post('contact'), 'category' => $this->input->post('category'), 'created' => $this->input->post('created'), 'status' => $this->input->post('status'), 'action' => 'null');
                $this->Md->save($users, 'users');
                echo "Information saved online";
                return;
            }
        }
        if ($this->input->post('action') == 'create') {

            $files = array('fileID' => $this->input->post('fileID'), 'client' => $this->input->post('client'), 'lawyer' => $this->input->post('lawyer'), 'orgID' => $this->session->userdata('orgID'), 'details' => $this->input->post('details'), 'name' => $this->input->post('name'), 'type' => $this->input->post('type'), 'created' => date('Y-m-d H:i:s'), 'status' => $this->input->post('status'), 'no' => $this->input->post('no'), 'subject' => $this->input->post('subject'), 'citation' => $this->input->post('citation'), 'law' => $this->input->post('law'));
            $this->Md->save($files, 'file');

            echo "File information saved online";
            return;
        }
        if ($this->input->post('action') == 'delete') {
            $query = $this->Md->cascade($this->input->post('fileID'), 'file', 'fileID');
        }
    }

    public function updater() {
        $this->load->helper(array('form', 'url'));

        if (!empty($_POST)) {

            foreach ($_POST as $field_name => $val) {
                //clean post values
                $field_id = strip_tags(trim($field_name));
                $val = strip_tags(trim($val));
                //from the fieldname:user_id we need to get user_id
                $split_data = explode(':', $field_id);
                $user_id = $split_data[1];
                $field_name = $split_data[0];
                if (!empty($user_id) && !empty($field_name) && !empty($val)) {
                    //update the values
                    $task = array($field_name => $val);
                    // $this->Md->update($user_id, $task, 'tasks');
                    $this->Md->update_dynamic($user_id, 'documentID', 'document', $task);
                    echo "Updated";
                } else {
                    echo "Invalid Requests";
                }
            }
        } else {
            echo "Invalid Requests";
        }
    }

    public function add() {

        $query = $this->Md->query("SELECT * FROM users where orgID = '" . $this->session->userdata('orgID') . "' ");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }

        $this->load->view('add-file', $data);
    }

    public function clients() {
        $query = $this->Md->query("SELECT * FROM users  where orgID = '" . $this->session->userdata('orgID') . "' ORDER BY name DESC");
        echo json_encode($query);
    }

    public function user() {
        $query = $this->Md->query("SELECT * FROM users  where org = '" . $this->session->userdata('orgid') . "' AND types<>'client' ORDER BY name DESC");
        echo json_encode($query);
    }

    public function api() {

        $orgid = urldecode($this->uri->segment(3));
        $result = $this->Md->query("SELECT * FROM files WHERE org ='" . $orgid . "'");

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

    public function schedule() {

        $this->load->helper(array('form', 'url'));
        $fileid = $this->uri->segment(3);

        $query = $this->Md->query("SELECT * FROM files where id = '" . $fileid . "'");
        if ($query) {
            foreach ($query as $res) {
                $data['name'] = $res->name;
                $data['details'] = $res->details;
                $data['types'] = $res->types;
                $data['no'] = $res->no;
                $data['created'] = $res->created;
                $data['subject'] = $res->subject;
            }
        }

        $query = $this->Md->query("SELECT * FROM schedule where org = '" . $this->session->userdata('orgid') . "' AND file='" . $fileid . "' ");
        //  var_dump($query);
        if ($query) {
            $data['sch'] = $query;
        } else {
            $data['sch'] = array();
        }
        $query = $this->Md->query("SELECT * FROM attend where org = '" . $this->session->userdata('orgid') . "'");
        //  var_dump($query);
        if ($query) {
            $data['att'] = $query;
        } else {
            $data['att'] = array();
        }
        $data['fileid'] = $fileid;

        $this->load->view('calendar-file', $data);
    }

    public function table() {
        $query = $this->Md->query("SELECT * FROM file where orgID = '" . $this->session->userdata('orgID') . "'");
        //  var_dump($query);
        if ($query) {
            $data['files'] = $query;
        } else {
            $data['files'] = array();
        }
        $query = $this->Md->query("SELECT * FROM users where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['users'] = $query;
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
     public function docs() {
         
        $query = $this->Md->query("SELECT * FROM document WHERE  orgID='" . $this->session->userdata('orgID') . "'");
        echo json_encode($query);
    }

    public function delete() {

        $this->load->helper(array('form', 'url'));
        $documentID = $this->uri->segment(3);

        $fileUrl = $this->Md->query_cell("SELECT fileUrl FROM document WHERE documentID ='" . $documentID . "'", 'fileUrl');

        $this->Md->file_remove($fileUrl, 'documents');
        $query = $this->Md->cascade($documentID, 'document', 'documentID');
        //file_remove($file, $folder)
        redirect('/document/', 'refresh');
    }

    public function create() {

        $this->load->helper(array('form', 'url'));

        //user information
        $documentID = $this->GUID();

        $orgID = $this->session->userdata('orgID');

        if ($this->input->post('name') != "") {


            ///organisation image uploads
            $file_element_name = 'userfile';
            $new_name = $this->input->post('name');
            $config['file_name'] = $new_name;
            $config['upload_path'] = 'documents/';
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
                $this->session->set_flashdata('msg', '<div class="alert alert-error"> <strong>' . $msg . '</strong></div>');
            }
            $data = $this->upload->data();
            $submitted = date('Y-m-d');
            $userfile = $data['file_name'];
            $size = $data['file_size'];
            $doc = array('documentID' => $documentID, 'orgID' => $this->session->userdata('orgID'), 'name' => $this->input->post('name'), 'fileID' => $this->input->post('file'), 'fileUrl' => $userfile, 'created' => date('Y-m-d'), 'action' => 'none', 'lawyer' => $this->input->post('lawyer'), 'client' => $this->input->post('client'), 'sync' => 'true', 'note' => $this->input->post('note'), 'sizes' => $size, 'details' => $this->input->post('details'));
            $this->Md->save($doc, 'document');

            $this->session->set_flashdata('msg', '<div class="alert alert-success">  <strong>Information saved</strong></div>');

            redirect('/document/', 'refresh');
        }
    }

}
