<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Petty extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set('Africa/Kampala');
    }

    public function index() {

        $query = $this->Md->query("SELECT * FROM petty where orgID = '" . $this->session->userdata('orgID') . "' ");

        if ($query) {
            $data['petty'] = $query;
        } else {
            $data['petty'] = array();
        }
        $this->load->view('petty-page', $data);
    }

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
     public function lists() {
        //  $query = $this->Md->query("SELECT * FROM client WHERE  orgID='" . $this->session->userdata('orgID') . "'");
        $query = $this->Md->query("SELECT * FROM wallet WHERE  orgID='" . $this->session->userdata('orgID') . "'");
        echo json_encode($query);
    }


    public function updating() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $method = $this->input->post('method');
        $user = array('method' => $method);
        $this->Md->update($id, $user, 'wallet');
    }

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $info = array('type' => $this->input->post('type'), 'total' => $this->input->post('total'), 'category' => $this->input->post('category'), 'details' => $this->input->post('details'));
        $this->Md->update_dynamic($id, 'transID', 'transaction', $info);

        echo 'INFORMATION UPDATED';
    }

    public function delete() {

        $this->load->helper(array('form', 'url'));
        $expID = $this->uri->segment(3);
        $query = $this->Md->cascade($expID, 'petty', 'id');

        redirect('/petty', 'refresh');
    }

    public function create() {

        $this->load->helper(array('form', 'url'));
        $no = $this->session->userdata('code') . "-" . date('d-m-Y') . "-" . date('H-m');
        if ($this->input->post('particulars') != "") {

            $result = $this->Md->check($no, 'id', 'petty');
            if (!$result) {
                $this->session->set_flashdata('msg', '<div class="alert alert-error"><strong>
                                                Name in use please </strong>									
						</div>');
                redirect('/petty', 'refresh');
            }
            $files = array('id' => $no, 'user' => $this->session->userdata('username'), 'date' => $this->input->post('date'), 'orgID' => $this->session->userdata('orgID'), 'name' => $this->input->post('name'), 'total' => $this->input->post('total'), 'unit' => $this->input->post('unit'), 'method' => $this->input->post('method'),'qty' => $this->input->post('qty'),'paid' => $this->input->post('paid'), 'wallet' => $this->input->post('wallet'),'approved' => $this->input->post('approved'),'reason' => $this->input->post('reason'),'sync' => 'f');
            $this->Md->save($files, 'petty');

            $this->session->set_flashdata('msg', '<div class="alert alert-success"><strong>Information saved</strong>									
						</div>');

            redirect('/petty', 'refresh');
        }
        redirect('/petty', 'refresh');
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
                    $this->Md->update_dynamic($user_id, 'id', 'petty', $task);
                    echo "Updated information ";
                } else {
                    echo "Invalid Requests";
                }
            }
        } else {
            echo "Invalid Requests";
        }
    }

    public function generate() {

        $this->load->helper(array('form', 'url'));
        $gen = "";
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $gen = $start . " to " . $end;

        echo '<h3>' . $gen . '</h3>';

        $sql[] = NULL;
        unset($sql);
        if ($start != "" && $end != "") {

            $sql[] = "created BETWEEN '$start' AND '$end' ";
        }

        $query = "SELECT * FROM transaction";

        if (!empty($sql)) {
            $query .= ' WHERE ' . implode(' AND ', $sql);
        }

        $get_result = $this->Md->query($query);

        if ($get_result) {

            echo '<div class="scroll">  
                 <table id="datatables" class="table table-striped table-bordered scroll ">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>CLIENT</th>                   
                    <th>CATEGORY</th>
                    <th>TYPE</th>
                    <th>DETAILS</th>
                    <th>TOTAL</th>                   
                    <th>CREATED:</th>                  
                    <th></th>
                </tr>
            </thead>
            <tbody>';

            if (is_array($get_result) && count($get_result)) {
                foreach ($get_result as $loop) {

                    echo '<tr class="odd">'
                    . '<td id="created:"' . $loop->transID . '" contenteditable="true"><span class="green">' . $loop->created . '</span></td>
                    <td id="client:"' . $loop->transID . '" contenteditable="true">' . $loop->client . '</td>
                    <td id="category:"' . $loop->category . '" contenteditable="true">' . $loop->category . '</td>
                    <td id="type:"' . $loop->type . '" contenteditable="true"><span class="red">' . $loop->type . '</span></td>
                    <td id="details:"' . $loop->details . '" contenteditable="true"><span class="blue">' . $loop->details . '</span></td>
                    <td id="total:"' . $loop->total . '" contenteditable="true"><span class="green">' . $loop->total . '</span></td>
                    <td>' . $loop->created . '</td>
                    <td>  <a class="btn-danger btn-small icon-remove" href="' . base_url() . "index.php/transaction/delete/" . $loop->transID . '">delete' . '</a></td>
                    </tr>
                  ';
                }
                echo ' </tbody>   </table></div>';
            } else {

                echo ' no values ';
            }
        }
    }

}
