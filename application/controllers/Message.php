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

        $query = $this->Md->query("SELECT * FROM message where  orgID='" . $this->session->userdata('orgID') . "' AND date= '" . date('Y-m-d') . "'");
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

    public function mail() {

        $mail = array('email' => $this->input->post('email'), 'created' => date('Y-m-d H:i:s'), 'active' => 'true');
        $this->Md->save($mail, 'mailing');

        redirect('web', 'refresh');

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
        $get_result = $this->Md->query("SELECT * FROM message WHERE  date='" . $today . "' AND sent ='false'");
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

    public function contact() {
        $this->load->library('email');
        if ($this->input->post('sender') != "") {
            $this->email->from($this->input->post('sender'), 'Case Professional User contact us');
            $this->email->to('weredouglas@gmail.com');
            $this->email->subject('Contact us');
            $this->email->message($this->input->post('message'));
            $this->email->send();
            echo $this->email->print_debugger();
            $data = array('sent' => 'true');           
           
        }
       redirect('web', 'refresh');
    }

    public function event() {

        $this->load->library('email');
        $today = date('Y-m-d');
        $get_result = $this->Md->query("SELECT * FROM events WHERE  date='" . $today . "' AND (notify <>'false')");
        foreach ($get_result as $res) {
            if ($res->user != "") {
                $emails = $this->Md->query_cell("SELECT * FROM users where name= '" . $res->user . "'", 'email');
                $phones = $this->Md->query_cell("SELECT * FROM users where name= '" . $res->user . "'", 'contact');
                $body = "Reminder " . 'You have a meeting on ' . $res->date . ' at ' . date('H:i:s', strtotime($res->start)) . ' to ' . date('H:i:s', strtotime($res->end)) . ' Details: ' . $res->name;
                $subject = "REMINDER";
                $this->email->from('info@caseprofessional.org', 'Case Professional');
                $this->email->to($emails);
                $this->email->subject($subject);
                $this->email->message($body);
                $this->email->send();
                echo $this->email->print_debugger();
                $data = array('notify' => 'false');
                $this->Md->update_dynamic($res->id, 'id', 'events', $data);
                echo 'Sent ' . $res->email . '<br>';
            }
        }
    }

    public function users() {
        $query = $this->Md->query("SELECT * FROM users where  org='" . $this->session->userdata('orgid') . "'");
        echo json_encode($query);
    }

    public function updater() {
        $this->load->helper(array('form', 'url'));

        if (!empty($_POST)) {

            foreach ($_POST as $field_name => $val) {
                //clean post values
                $field_id = strip_tags(trim($field_name));
                $val = strip_tags(trim(mysql_real_escape_string($val)));
                //from the fieldname:user_id we need to get user_id
                $split_data = explode(':', $field_id);
                $user_id = $split_data[1];
                $field_name = $split_data[0];
                if (!empty($user_id) && !empty($field_name) && !empty($val)) {
                    //update the values
                    $task = array($field_name => $val);
                    // $this->Md->update($user_id, $task, 'tasks');
                    $this->Md->update_dynamic($user_id, 'messageID', 'message', $task);
                    echo "Updated";
                } else {
                    echo "Invalid Requests";
                }
            }
        } else {
            echo "Invalid Requests";
        }
    }

    public function generate_post() {

        $this->load->helper(array('form', 'url'));
        $gen = "";
        $start = $this->input->post('starts');
        $end = $this->input->post('ends');
        $gen = $start . " to " . $end;

        echo '<h3>' . $gen . '</h3>';

        $sql[] = NULL;
        unset($sql);
        if ($start != "" && $end != "") {

            $sql[] = "date BETWEEN '$start' AND '$end' ";
        }
        $sql[] = "orgID = '" . $this->session->userdata('orgID') . "'";
        $query = "SELECT * FROM message";

        if (!empty($sql)) {
            $query .= ' WHERE ' . implode(' AND ', $sql);
        }

        $get_result = $this->Md->query($query);

        if ($get_result) {
            //  var_dump($query);
            if ($query) {
                $data['messages'] = $get_result;
            } else {
                $data['messages'] = array();
            }
            $this->load->view('message-page', $data);
        } else {

            $data = "";
            $this->load->view('message-page', $data);
        }
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
