<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set('Africa/Kampala');
    }

    public function index() {
        $query = $this->Md->query("SELECT * FROM users where orgID = '" . $this->session->userdata('orgID') . "' ");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $query = $this->Md->query("SELECT * FROM file where orgID = '" . $this->session->userdata('orgID') . "' ");

        if ($query) {
            $data['files'] = $query;
        } else {
            $data['files'] = array();
        }
        $this->load->view('transaction-page', $data);
    }

    public function transaction() {

        $orgids = urldecode($this->uri->segment(3));
        $results = $this->Md->query("SELECT * FROM transactions WHERE org ='" . $orgids . "'");

        if ($results) {

            echo json_encode($results);
        }
    }

    public function activate() {
        $this->load->helper(array('form', 'url'));
        $id = trim($this->input->post('id'));
        $actives = trim($this->input->post('actives'));
        if ($actives == "true") {
            $active = "false";
        }
        if ($actives == "false") {
            $active = "true";
        }
        if ($this->session->userdata('level') == 1) {

            $approve = array('approved' => $active);
            $this->Md->update($id, $approve, 'transactions');
            $query = $this->Md->query("SELECT * FROM client where org = '" . $this->session->userdata('orgid') . "'");
            if ($query) {
                foreach ($query as $res) {
                    $syc = array('org' => $this->session->userdata('orgid'), 'object' => 'transactions', 'contents' => $id, 'action' => 'approve', 'oid' => $active, 'created' => date('Y-m-d H:i:s'), 'checksum' => $this->GUID(), 'client' => $res->name);
                    $this->Md->save($syc, 'sync_data');
                }
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                 You cannot carry out this action ' . '	</strong>									
						</div>');
        }
    }

    public function pay() {

        $orgid = urldecode($this->uri->segment(3));
        $result = $this->Md->query("SELECT * FROM payments WHERE org ='" . $orgid . "'");

        if ($result) {
            echo json_encode($result);
        }
    }

    public function item() {

        $orgid = urldecode($this->uri->segment(3));
        $result = $this->Md->query("SELECT * FROM item WHERE org ='" . $orgid . "'");

        if ($result) {

            echo json_encode($result);
        }
    }

    public function file() {

        if ($this->session->userdata('username') == "") {
            $this->session->sess_destroy();
            redirect('welcome', 'refresh');
        }

        $this->load->helper(array('form', 'url'));
        $fileID = $this->uri->segment(3);
        $fileName = $this->uri->segment(4);
        $clientID = $this->uri->segment(5);
        $query = $this->Md->query("SELECT * FROM users where org = '" . $this->session->userdata('orgid') . "' ");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $query = $this->Md->query("SELECT * FROM files where org = '" . $this->session->userdata('orgid') . "' ");

        if ($query) {
            $data['files'] = $query;
        } else {
            $data['files'] = array();
        }
        $data['fileID'] = $fileID;
        $data['fileName'] = $fileName;
        $data['clientID'] = $clientID;

        $this->load->view('file-receipt', $data);
    }

    public function balance() {
        if ($this->session->userdata('username') == "") {
            $this->session->sess_destroy();
            redirect('welcome', 'refresh');
        }

        $this->load->helper(array('form', 'url'));
        $transactionID = $this->uri->segment(3);
        $query = $this->Md->query("SELECT * FROM users where org = '" . $this->session->userdata('orgid') . "' ");
        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $query = $this->Md->query("SELECT * FROM transactions where org = '" . $this->session->userdata('orgid') . "' AND id ='" . $transactionID . "' ");
        //  var_dump($query);
        if ($query) {
            $data['trans'] = $query;
        } else {
            $data['trans'] = array();
        }
        //  echo 'we are coming from the controller';
        $query = $this->Md->query("SELECT * FROM payments WHERE transactionID ='" . $transactionID . "' ");
        //  var_dump($query);
        if ($query) {
            $data['pay'] = $query;
        } else {
            $data['pay'] = array();
        }
        $query = $this->Md->query("SELECT * FROM item where org = '" . $this->session->userdata('orgid') . "' AND transactionID ='" . $transactionID . "'");
        //  var_dump($query);
        if ($query) {
            $data['items'] = $query;
        } else {
            $data['items'] = array();
        }
        $this->load->view('balance-page', $data);
    }

    public function view() {

        if ($this->session->userdata('username') == "") {
            $this->session->sess_destroy();
            redirect('welcome', 'refresh');
        }

        $this->load->helper(array('form', 'url'));
        $transactionID = $this->uri->segment(4);
        $paymentID = $this->uri->segment(3);
        $query = $this->Md->query("SELECT * FROM item where org = '" . $this->session->userdata('orgid') . "' AND transactionID ='" . $transactionID . "'");
        //  var_dump($query);
        if ($query) {
            $data['items'] = $query;
        } else {
            $data['items'] = array();
        }
        $query = $this->Md->query("SELECT * FROM users where org = '" . $this->session->userdata('orgid') . "' ");
        //  var_dump($query);
        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $query = $this->Md->query("SELECT * FROM transactions where org = '" . $this->session->userdata('orgid') . "' AND id ='" . $transactionID . "' ");
        //  var_dump($query);
        if ($query) {
            $data['trans'] = $query;
        } else {
            $data['trans'] = array();
        }
        //  echo 'we are coming from the controller';
        $query = $this->Md->query("SELECT * FROM payments WHERE id ='" . $paymentID . "' ");
        //  var_dump($query);
        if ($query) {
            $data['pay'] = $query;
        } else {
            $data['pay'] = array();
        }

        $this->load->view('view-reciept-page', $data);
    }

    public function all() {

        $this->load->helper(array('form', 'url'));

        $query = $this->Md->query("SELECT *  FROM transaction  WHERE orgID ='" . $this->session->userdata('orgID') . "' ");
        //  var_dump($query);
        if ($query) {
            $data['payments'] = $query;
        } else {
            $data['payments'] = array();
        }
        $query = $this->Md->query("SELECT * FROM item where orgID = '" . $this->session->userdata('orgID') . "'");
        //  var_dump($query);
        if ($query) {
            $data['items'] = $query;
        } else {
            $data['items'] = array();
        }

        $this->load->view('transactions-page', $data);
    }

    public function income() {

        $this->load->helper(array('form', 'url'));

        $query = $this->Md->query("SELECT *  FROM transaction  WHERE orgID ='" . $this->session->userdata('orgID') . "' AND type='Income'");
        //  var_dump($query);
        if ($query) {
            $data['payments'] = $query;
        } else {
            $data['payments'] = array();
        }
        $query = $this->Md->query("SELECT * FROM item where orgID = '" . $this->session->userdata('orgID') . "'");
        //  var_dump($query);
        if ($query) {
            $data['items'] = $query;
        } else {
            $data['items'] = array();
        }

        $this->load->view('income-page', $data);
    }

    public function expense() {

        $this->load->helper(array('form', 'url'));

        $query = $this->Md->query("SELECT *  FROM transaction  WHERE orgID ='" . $this->session->userdata('orgID') . "' AND type='Expense'  ");
        //  var_dump($query);
        if ($query) {
            $data['payments'] = $query;
        } else {
            $data['payments'] = array();
        }
        $query = $this->Md->query("SELECT * FROM item where orgID = '" . $this->session->userdata('orgID') . "'");
        //  var_dump($query);
        if ($query) {
            $data['items'] = $query;
        } else {
            $data['items'] = array();
        }

        $this->load->view('expense-page', $data);
    }

    public function advanced() {

        $this->load->helper(array('form', 'url'));

        $query = $this->Md->query("SELECT *  FROM transaction  WHERE orgID ='" . $this->session->userdata('orgID') . "' AND created='".  date('Y-m-d')."'");
        //  var_dump($query);
        if ($query) {
            $data['payments'] = $query;
        } else {
            $data['payments'] = array();
        }
        $query = $this->Md->query("SELECT * FROM item where orgID = '" . $this->session->userdata('orgID') . "'");
        //  var_dump($query);
        if ($query) {
            $data['items'] = $query;
        } else {
            $data['items'] = array();
        }

        $this->load->view('transaction-advanced', $data);
    }

    public function payments() {

        $this->load->helper(array('form', 'url'));

        $query = $this->Md->query("SELECT *,users.name as client FROM payment INNER JOIN transaction ON payment.transID = transaction.transID INNER JOIN users ON transaction.client = users.userID  WHERE payment.orgID ='" . $this->session->userdata('orgID') . "' ");
        //  var_dump($query);
        if ($query) {
            $data['payments'] = $query;
        } else {
            $data['payments'] = array();
        }
        $query = $this->Md->query("SELECT * FROM item where orgID = '" . $this->session->userdata('orgID') . "'");
        //  var_dump($query);
        if ($query) {
            $data['items'] = $query;
        } else {
            $data['items'] = array();
        }

        $this->load->view('payment-page', $data);
    }

    public function invoice() {

        $this->load->helper(array('form', 'url'));
        $transactionID = $this->uri->segment(3);

        $query = $this->Md->query("SELECT * FROM item where org = '" . $this->session->userdata('orgid') . "' AND transactionID ='" . $transactionID . "'");
        //  var_dump($query);
        if ($query) {
            $data['items'] = $query;
        } else {
            $data['items'] = array();
        }
        $query = $this->Md->query("SELECT * FROM users where org = '" . $this->session->userdata('orgid') . "' ");
        //  var_dump($query);
        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $query = $this->Md->query("SELECT * FROM transactions where org = '" . $this->session->userdata('orgid') . "' AND id ='" . $transactionID . "' ");
        //  var_dump($query);
        if ($query) {
            $data['trans'] = $query;
        } else {
            $data['trans'] = array();
        }
        //  echo 'we are coming from the controller';
        $query = $this->Md->query("SELECT * FROM payments WHERE id ='" . $paymentID . "' ");
        //  var_dump($query);
        if ($query) {
            $data['pay'] = $query;
        } else {
            $data['pay'] = array();
        }

        $this->load->view('invoice-page', $data);
    }

    public function payment() {

        $query = $this->Md->query("SELECT * FROM item where org = '" . $this->session->userdata('orgid') . "' ");
        //  var_dump($query);
        if ($query) {
            $data['items'] = $query;
        } else {
            $data['items'] = array();
        }
        $query = $this->Md->query("SELECT * FROM users where org = '" . $this->session->userdata('orgid') . "' ");
        //  var_dump($query);
        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }

        $query = $this->Md->query("SELECT * FROM transactions where org = '" . $this->session->userdata('orgid') . "' ");
        //  var_dump($query);
        if ($query) {
            $data['trans'] = $query;
        } else {
            $data['trans'] = array();
        }
        //  echo 'we are coming from the controller';
        $query = $this->Md->query("SELECT * FROM payments where org = '" . $this->session->userdata('orgid') . "'");
        //  var_dump($query);
        if ($query) {
            $data['pay'] = $query;
        } else {
            $data['pay'] = array();
        }

        $this->load->view('payment-page', $data);
    }

    public function save() {

        $this->load->helper(array('form', 'url'));
        $transactionID = $this->GUID();
        $values = $this->input->post('name');
        $e = json_decode($values);
        $client = $e->userid;
        $types = 'credit';
        $created = $e->day;
        $details = $e->details;
        $users = $this->session->userdata('username');
        $org = $this->session->userdata('orgID');
        $approved = 'false';
        $total = $e->total;
        $file = 'none';
        if ($e->fileid != "") {
            $file = $e->fileid;
        }
        /* payment */
        $amount = $e->paid;
        $balance = $e->balance;
        $method = $e->method;
        $no = $e->no;
        $invoice = $e->invoice;
        $category = $e->category;
        $type = $e->type;

        if ($users == "") {
            echo "please select the client";
            return;
        }
        if ($total <= 0) {
            echo "invalid sum value";
            return;
        }
        if ($org == "") {
            echo "wrong entry";
            return;
        }
        if ($values == "") {
            echo "please post information";
            return;
        }
        if ($no == "") {
            echo "please post information";
            return;
        }

        /* items */
        $items = (array) $e->items;
        $ts = 0;
        //$n = count($items);
        foreach ($items as $t) {

            // echo $t. "\n";
            if ($ts == 0) {
                $name = $t;
            }
            if ($ts == 1) {
                $description = $t;
            }
            if ($ts == 2) {
                $rate = $t;
            }
            if ($ts == 3) {
                $qty = $t;
            }
            if ($ts == 4) {
                $price = $t;
                $ts = 0;
                $itemID = $this->GUID();
                $itema = array('itemID' => $itemID, 'name' => $name, 'transID' => $transactionID, 'description' => $description, 'rate' => $rate, 'qty' => $qty, 'total' => $price, 'orgID' => $this->session->userdata('orgID'), 'action' => 'none');
                $this->Md->save($itema, 'item');
            } else {

                $ts++;
            }
        }
        // $paymentID = $this->GUID();
        // $payment = array('paymentID' => $paymentID, 'transID' => $transactionID, 'amount' => $amount, 'balance' => $balance, 'created' => $created, 'method' => $method, 'no' => $no, 'userID' => $users, 'approved' => $approved, 'recieved' => $this->session->userdata('username'), 'orgID' => $this->session->userdata('orgID'));
        //$this->Md->save($payment, 'payment');


        $trans = array('transID' => $transactionID, 'no' => $no, 'invoice' => $invoice, 'amount' => $amount, 'balance' => $balance, 'method' => $method, 'orgID' => $this->session->userdata('orgID'), 'client' => $client, 'type' => $types, 'created' => $created, 'staff' => $this->session->userdata('username'), 'details' => $details, 'category' => $category, 'total' => $total, 'fileID' => $file, 'action' => 'none');
        $this->Md->save($trans, 'transaction');

        echo 'saved';
    }

    public function bal() {

        $this->load->helper(array('form', 'url'));


        $transactionID = $this->input->post('transactionID');

        $created = $this->input->post('day');
        $users = $this->session->userdata('username');
        $org = $this->session->userdata('orgid');
        $approved = 'false';

        //$var = floatval(preg_replace('/[^\d.]/', '', $var));

        $file = ' ';
        /* payment */
        $amount = floatval(preg_replace('/[^\d.]/', '', $this->input->post('amount')));
        $balance = floatval(preg_replace('/[^\d.]/', '', $this->input->post('balance')));
        $method = $this->input->post('method');
        $no = $this->input->post('no');

        if ($users == "") {
            echo "please select the client";
            return;
        }

        if ($org == "") {
            echo "wrong entry";
            return;
        }
        if ($amount == "") {
            echo "please post information";
            return;
        }
        if ($no == "") {
            echo "please post information";
            return;
        }
        $paymentID = $this->GUID();
        $payment = array('id' => $paymentID, 'transactionID' => $transactionID, 'amount' => $amount, 'balance' => $balance, 'created' => $created, 'method' => $method, 'no' => $no, 'users' => $users, 'approved' => $approved, 'org' => $org);
        $this->Md->save($payment, 'payments');
        $content = json_encode($payment);
        $query = $this->Md->query("SELECT * FROM client where org = '" . $this->session->userdata('orgid') . "'");
        if ($query) {
            foreach ($query as $res) {
                $syc = array('org' => $this->session->userdata('orgid'), 'object' => 'payments', 'contents' => $content, 'action' => 'create', 'oid' => $paymentID, 'created' => date('Y-m-d H:i:s'), 'checksum' => $this->GUID(), 'client' => $res->name);
                $this->Md->save($syc, 'sync_data');
            }
        }
        $this->session->set_flashdata('msg', '<div class="alert alert-info">                                                   
                                                <strong>
                                          Information saved	</strong>									
						</div>');
        redirect('reciept/payment', 'refresh');
    }

    public function users() {
        $query = $this->Md->query("SELECT * FROM users where types <>'client'");
        //  var_dump($query);
        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $this->load->view('user-page', $data);
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

        $info = array('type' => $this->input->post('type'), 'total' => $this->input->post('total'), 'category' => $this->input->post('category'), 'details' => $this->input->post('details'));
        $this->Md->update_dynamic($id, 'transID', 'transaction', $info);

        echo 'INFORMATION UPDATED';
    }

    public function updatepayment() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');

        $info = array('amount' => $this->input->post('amount'), 'method' => $this->input->post('method'), 'balance' => $this->input->post('balance'));
        $this->Md->update_dynamic($id, 'paymentID', 'payment', $info);

        echo 'INFORMATION UPDATED';
    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $transID = $this->uri->segment(3);
        $query = $this->Md->cascade($transID, 'transaction', 'transID');
        $query = $this->Md->cascade($transID, 'item', 'transID');
        redirect('/transaction/all', 'refresh');
    }

    public function add() {

        $this->load->helper(array('form', 'url'));
        //user information
        $fileid = $this->GUID();
        $users = $this->input->post('client');
        $details = $this->input->post('details');
        $names = $this->input->post('named');
        $types = $this->input->post('types');
        $subject = $this->input->post('subject');
        $app = "O";
        switch ($types) {
            case Litigation:
                $app = "L";
                break;
            case General:
                $app = "G";
                break;
        }
        $no = $this->session->userdata('code') . "/" . $app . "/" . date('y') . "/" . date('m') . (int) date('d') . (int) date('H') . (int) date('i') . (int) date('s');

        $orgid = $this->session->userdata('orgid');

        if ($names != "") {

            $result = $this->Md->check($names, 'name', 'files');

            if (!$result) {
                $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                File name in use please </strong>									
						</div>');
                redirect('/file', 'refresh');
            }


            $files = array('id' => $fileid, 'users' => $users, 'org' => $orgid, 'details' => $details, 'name' => $names, 'types' => $types, 'created' => date('Y-m-d H:i:s'), 'status' => 'T', 'no' => $no, 'subject' => $subject);
            $this->Md->save($files, 'files');
            $contents = array('id' => $fileid, 'users' => $users, 'org' => $orgid, 'details' => $details, 'name' => $names, 'types' => $types, 'created' => date('Y-m-d H:i:s'), 'status' => 'T', 'no' => $no, 'subject' => $subject);

            $content = json_encode($contents);

            $query = $this->Md->query("SELECT * FROM client where org = '" . $this->session->userdata('orgid') . "'");
            if ($query) {
                foreach ($query as $res) {
                    $syc = array('org' => $this->session->userdata('orgid'), 'object' => 'files', 'contents' => $content, 'action' => 'create', 'oid' => $fileid, 'created' => date('Y-m-d H:i:s'), 'checksum' => $this->GUID(), 'client' => $res->name);
                    $file_id = $this->Md->save($syc, 'sync_data');
                }
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-success">
                                   <strong>New File Saved</strong>									
						</div>');

            redirect('/file', 'refresh');
        }
        redirect('/file', 'refresh');
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
                    $this->Md->update_dynamic($user_id, 'transID', 'transaction', $task);
                    echo "Updated";
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

            $sql[] = "created BETWEEN '$start' AND '$end' ";
        }
        $sql[] = "orgID = '" . $this->session->userdata('orgID') . "'";
        $query = "SELECT * FROM transaction";

        if (!empty($sql)) {
            $query .= ' WHERE ' . implode(' AND ', $sql);
        }

        $get_result = $this->Md->query($query);

        if ($get_result) {
            //  var_dump($query);
            if ($query) {
                $data['payments'] = $get_result;
            } else {
                $data['payments'] = array();
            }

            $this->load->view('transaction-advanced', $data);
        }
        else{
            $data = "No such data";
            $this->load->view('transaction-advanced', $data);
        }
    }

}
