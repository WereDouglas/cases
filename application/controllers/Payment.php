<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

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
        $query = $this->Md->query("SELECT * FROM files where orgID = '" . $this->session->userdata('orgID') . "' ");

        if ($query) {
            $data['files'] = $query;
        } else {
            $data['files'] = array();
        }
        $this->load->view('view-payment', $data);
    }

    public function report() {

        $this->load->helper(array('form', 'url'));
        $from = date('d-m-Y', strtotime($this->input->post('from')));
        $to = date('d-m-Y', strtotime($this->input->post('to')));

        unset($sql);

        if ($from != '' & $to != '') {
            $sql[] = "DAY(STR_TO_DATE(payment.date,'%d-%m-%Y')) BETWEEN '$from' AND '$to' ";
        }
        if ($this->input->post('storeID') != "") {
            $storeID = trim($this->input->post('storeID'));
            $sql[] = "payment.branchID = '" . $storeID . "' ";
        }
        if ($this->input->post('type') != "") {
            $type = trim($this->input->post('type'));
            $sql[] = "payment.type = '" . $type . " '";
        }
        $query = "SELECT *,payment.type As type,users.surname AS user,client.name AS client,files.name AS file,payment.no AS no FROM payment LEFT JOIN users ON users.id = payment.userID LEFT JOIN client ON client.id = payment.clientID LEFT JOIN files ON files.id = payment.fileID";
        if (!empty($sql)) {
            $query .= ' WHERE ' . implode(' AND ', $sql);
        }
        $sql[] = "payment.orgID = '" . $this->session->userdata('orgID') . "'";
        $dailys = $this->Md->query($query);
        //var_dump($daily);
        if ($dailys) {

            echo '<div class="scroll"> 
                <table  class="scroll display table table-bordered table-striped scroll" id="dynamic-table"  border="1px" cellpadding="2px" border-width="thin"  style="font-size: 12px; border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>No</th>
                                    <th>Services/Particulars</th>
                                    <th>Quantity</th>
                                     <th>Cost</th>
                                    <th>Total</th>
                                    <th>Amount paid</th>
                                    <th>Balance</th>
                                     <th>Method</th>
                                    <th>Type</th>
                                    <th>Client</th>
                                    <th>File</th>
                                    <th>Done by</th>                                                                    
                                    <th>Details</th>
                                   
                                </tr>
                            </thead>
                            <tbody>';
            //var_dump($dailys);
            $sum = "0";
            $paid = "0";
            $bal = "0";
           
            $count = 1;
            if (is_array($dailys) && count($dailys)) {
                foreach ($dailys as $loop) {
                    echo '       <tr class="odd">
                                            <td>' . $count++ . '</td>
                                            <td>' . $loop->date . '</td>
                                            <td>' . $loop->no . '</td>
                                            <td>' . $loop->services . '</td>
                                            <td>' . $loop->qty . '</td>
                                            <td>' . number_format($loop->price) . '</td>
                                            <td>' . number_format($loop->total) . '</td>
                                             <td>' . number_format($loop->amount) . '</td>
                                            <td>' . number_format($loop->balance) . '</td>
                                            <td>' . $loop->method . '</td>
                                            <td>' . $loop->type . '</td>
                                            <td>' . $loop->client . '</td>
                                            <td>' . $loop->file . '</td>
                                            <td>' . $loop->user . '</td>                                           
                                            <td>' . $loop->details .'</td>
                                          
                                        </tr>';
                    $sum = $sum + $loop->total;
                    $paid = $paid + $loop->paid;
                    $bal = $bal + $loop->balance;
                }
            }
            echo '       <tr class="odd">
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td> 
                                           <td></td>
                                           <td>TOTAL </td>
                                           <td >' . number_format($sum) . '</td> 
                                           <td >' . number_format($paid) . '</td> 
                                           <td >' . number_format($bal) . '</td> 
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                            <td></td>
                                          
                                            </tr>';
            echo '    </tbody>

                        </table></div>';
        }
    }

    public function save() {

        $this->load->helper(array('form', 'url'));
        $feeID = $this->GUID();
        $disbursementID = $this->GUID();

        $clientID = $this->Md->query_cell("SELECT * FROM client where name= '" . $this->input->post('client') . "' AND orgID='" . $this->session->userdata('orgID') . "'", 'clientID');
        $fileID = $this->Md->query_cell("SELECT * FROM file where name= '" . $this->input->post('file') . "' AND orgID='" . $this->session->userdata('orgID') . "'", 'fileID');

        if ($this->input->post('fee') != "") {
            $payment = array('feeID' => $feeID, 'orgID' => $this->session->userdata('orgID'), 'clientID' => $clientID, 'fileID' => $fileID, 'details' => $this->input->post('note'), 'lawyer' => $this->input->post('laywer'), 'paid' => 'true', 'invoice' => $this->input->post('no'), 'vat' => $this->input->post('vatamount'), 'method' => $this->input->post('method'), 'amount' => $this->input->post('fee'), 'received' => $this->input->post('reciever'), 'balance' => $this->input->post('balance'), 'approved' => 'true', 'signed' => 'false', 'date' => date('Y-m-d', strtotime($this->input->post('date'))));
            $this->Md->save($payment, 'fees');
        }
        if ($this->input->post('disbursement') != "") {
            $payments = array('disbursementID' => $disbursementID, 'orgID' => $this->session->userdata('orgID'), 'clientID' => $clientID, 'fileID' => $fileID, 'details' => $this->input->post('note'), 'lawyer' => $this->input->post('laywer'), 'paid' => 'true', 'invoice' => $this->input->post('no'), 'method' => $this->input->post('method'), 'amount' => $this->input->post('disbursement'), 'received' => $this->input->post('reciever'), 'balance' => $this->input->post('balance'), 'approved' => 'true', 'signed' => 'false', 'date' => date('Y-m-d', strtotime($this->input->post('date'))));
            $this->Md->save($payments, 'disbursements');
        }


        $emails = $this->Md->query_cell("SELECT * FROM users where name= '" . $this->input->post('laywer') . "'", 'email');
        $phones = $this->Md->query_cell("SELECT * FROM users where userID= '" . $this->input->post('laywer') . "'", 'contact');
        $names = $this->Md->query_cell("SELECT * FROM users where userID= '" . $this->input->post('laywer') . "'", 'name');
        $message = "PAYMENT TRANSACTION ON CLIENT " . $this->input->post('client') . " FILE " . $this->input->post('file');

        $mail = array('messageID' => $this->GUID(), 'body' => $message, 'subject' => 'PAYMENT', 'date' => $this->input->post('date'), 'to' => $names, 'created' => date('Y-m-d H:i:s'), 'from' => $this->session->userdata('orgemail'), 'sent' => 'false', 'type' => 'email', 'orgID' => $this->session->userdata('orgID'), 'action' => 'none', 'taskID' => $taskID, 'contact' => $phones, 'email' => $emails);
        $this->Md->save($mail, 'message');

        $this->session->set_flashdata('msg', '<div class="alert alert-info">                                                   
                                                <strong>
                                          Information saved	</strong>									
						</div>');
        redirect('payment/payments', 'refresh');
    }

    public function request() {

        $this->load->helper(array('form', 'url'));
        $expenseID = $this->GUID();


        $clientID = $this->Md->query_cell("SELECT * FROM client where name= '" . $this->input->post('client') . "' AND orgID='" . $this->session->userdata('orgID') . "'", 'clientID');
        $fileID = $this->Md->query_cell("SELECT * FROM file where name= '" . $this->input->post('file') . "' AND orgID='" . $this->session->userdata('orgID') . "'", 'fileID');

        if ($this->input->post('amount') != "") {
            $payment = array('expenseID' => $expenseID, 'orgID' => $this->session->userdata('orgID'), 'clientID' => $clientID, 'fileID' => $fileID, 'details' => $this->input->post('reason'), 'wallet' => $this->input->post('wallet'), 'lawyer' => $this->input->post('laywer'), 'paid' => 'false', 'no' => $this->input->post('no'), 'method' => $this->input->post('method'), 'amount' => $this->input->post('amount'), 'balance' => $this->input->post('balance'), 'reason' => $this->input->post('reason'), 'outcome' => $this->input->post('outcome'), 'approved' => 'false', 'signed' => $this->input->post('signed'), 'date' => date('Y-m-d', strtotime($this->input->post('date'))), 'deadline' => date('Y-m-d', strtotime($this->input->post('deadline'))));
            $this->Md->save($payment, 'expenses');
        }

        $emails = $this->Md->query_cell("SELECT * FROM users where name= '" . $this->input->post('signed') . "'", 'email');
        $phones = $this->Md->query_cell("SELECT * FROM users where name= '" . $this->input->post('signed') . "'", 'contact');
        $names = $this->Md->query_cell("SELECT * FROM users where name= '" . $this->input->post('signed') . "'", 'name');
        $message = "PAYMENT TRANSACTION ON CLIENT " . $this->input->post('client') . " FILE " . $this->input->post('file');

        $mail = array('messageID' => $this->GUID(), 'body' => $message, 'subject' => 'REQUISTION PENDING APPROVAL', 'date' => $this->input->post('date'), 'to' => $names, 'created' => date('Y-m-d H:i:s'), 'from' => $this->session->userdata('orgemail'), 'sent' => 'false', 'type' => 'email', 'orgID' => $this->session->userdata('orgID'), 'action' => 'none', 'taskID' => $taskID, 'contact' => $phones, 'email' => $emails);
        $this->Md->save($mail, 'message');

        $this->session->set_flashdata('msg', '<div class="alert alert-info">                                                   
                                                <strong>
                                          Information saved	</strong>									
						</div>');
        redirect('expense/requisitions', 'refresh');
    }

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $expID = $this->uri->segment(3);
        $query = $this->Md->cascade($expID, 'expenses', 'expenseID');

        redirect('/expense/requisitions', 'refresh');
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
                    $task = array($field_name => $val);
                    // $this->Md->update($user_id, $task, 'tasks');
                    $this->Md->update_dynamic($user_id, 'expenseID', 'expenses', $task);
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
        } else {
            $data = "No such data";
            $this->load->view('transaction-advanced', $data);
        }
    }

}
