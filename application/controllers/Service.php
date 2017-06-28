<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set('Africa/Kampala');
        $this->load->library('excel');
        $this->load->library('email');
    }

    public function index() {
       // echo $this->session->userdata('orgID');        
        $query = $this->Md->query("SELECT * FROM services WHERE orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['s'] = $query;
        } else {
            $data['s'] = array();
        }
        $this->load->view('view-services', $data);
    }

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function create() {

        $this->load->helper(array('form', 'url'));
        //user information
        // $userID = $this->GUID();
        $name = $this->input->post('name');
        if ($name != "") {
            $user = array('sync' => 'f', 'id' => $this->GUID(), 'title' => $this->input->post('name'), 'views' => $this->input->post('views'), 'actions' => $this->input->post('actions'), 'orgID' => $this->session->userdata('orgID'));
            $this->Md->save($user, 'roles');

            $status .= '<div class="alert alert-success">  <strong>Information submitted</strong></div>';
            $this->session->set_flashdata('msg', $status);
            redirect('role', 'refresh');
        }
    }

    public function update() {

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
                    $task = array($field_name => $val,'sync'=>  date('Y-m-d H:i:s'));
                    // $this->Md->update($user_id, $task, 'tasks');
                    $this->Md->update_dynamic($user_id, 'id', 'roles', $task);
                    echo "Updated";
                } else {
                    echo "Invalid Requests";
                }
            }
        } else {
            echo "Invalid Requests";
        }
    }

    public function lists() {

        $query = $this->Md->query("SELECT * FROM services WHERE orgID='" . $this->session->userdata('orgID') . "' ");

        echo json_encode($query);
    }

    public function details() {

        $this->load->helper(array('form', 'url'));
        $role = trim($this->input->post('role'));

        $get_result = $this->Md->query("SELECT * FROM roles WHERE title ='" . $role . "'");
        // var_dump($get_result);
        if (!$get_result) {
            echo '<span style="color:#f00"> No information in the database </strong> does not exist in our database</span>';
        } else {
            foreach ($get_result as $res) {

                echo '<font class="red">PERMITTED ACTIONS:</font>  <div class="alert alert-info">' . $res->actions . '</div>';
                echo '<font class="red">PERMITTED VIEWS:</font>  <div class="alert alert-info">' . $res->views . '</div>';
            }
        }
    }

    public function delete() {

        $this->load->helper(array('form', 'url'));
        $id = urldecode($this->uri->segment(3));
        $query = $this->Md->delete($id, 'roles');
        //cascade($id,$table,$field)
        //$query = $this->Md->cascade($id, 'user', 'id');
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                Information deleted	</strong>									
						</div>');
            redirect('role', 'refresh');
        }
    }

    public function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}

?>