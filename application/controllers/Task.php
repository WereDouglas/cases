<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

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
        $data['procs'] = array();

        $query = $this->Md->query("SELECT * FROM procedures where org = '" . $this->session->userdata('orgid') . "' OR org=''");
        if ($query)
            $data['procs'] = $query;

        $this->load->view('file-page', $data);
    }
       public function cause() {

        if ($this->session->userdata('username') == "") {
            $this->session->sess_destroy();
            redirect('welcome', 'refresh');
        }

        $query = $this->Md->query("SELECT * FROM users where orgID = '" . $this->session->userdata('orgID') . "' ");
        //  var_dump($query);
        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }

        //$query = $this->Md->query("SELECT * FROM schedule where org = '" . $this->session->userdata('orgid') . "' ");
        // var_dump($query);
        $query = $this->Md->query("SELECT * FROM events  WHERE orgID = '" . $this->session->userdata('orgID') . "' ");
      //var_dump($query);
        if ($query) {
            $data['sch'] = $query;
        } else {
            $data['sch'] = array();
        }
        $query = $this->Md->query("SELECT * FROM attend where orgID = '" . $this->session->userdata('orgID') . "'");
        //  var_dump($query);
        if ($query) {
            $data['att'] = $query;
        } else {
            $data['att'] = array();
        }

        $this->load->view('calendar-page', $data);
    }

    public function users() {
        $query = $this->Md->query("SELECT * FROM users WHERE email<>'' AND orgID='" . $this->session->userdata('orgID') . "'");
        echo json_encode($query);
    }

    public function files() {
        $query = $this->Md->query("SELECT * FROM file WHERE  orgID='" . $this->session->userdata('orgID') . "'");
        echo json_encode($query);
    }
     public function staff() {
        $query = $this->Md->query("SELECT * FROM users WHERE  orgID='" . $this->session->userdata('orgID') . "'");
        echo json_encode($query);
    }
     public function client() {
        $query = $this->Md->query("SELECT * FROM client WHERE  orgID='" . $this->session->userdata('orgID') . "'");
        echo json_encode($query);
    }

    public function add() {

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

        $query = $this->Md->query("SELECT * FROM  events where orgID = '" . $this->session->userdata('orgID') . "' ");
        if ($query) {
            $data['sch'] = $query;
        } else {
            $data['sch'] = array();
        }
        $query = $this->Md->query("SELECT * FROM attend where orgID = '" . $this->session->userdata('orgID') . "'");
        //  var_dump($query);
        if ($query) {
            $data['att'] = $query;
        } else {
            $data['att'] = array();
        }
          $query = $this->Md->query("SELECT * FROM events where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['tasks'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM client where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['clients'] = $query;
        }
           $query = $this->Md->query("SELECT * FROM users where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['users'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM file where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['files'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM message where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['messages'] = $query;
        }
         $query = $this->Md->query("SELECT SUM(sizes) AS size FROM document where  orgID='" . $this->session->userdata('orgID') . "'");
        // var_dump($query);
         if ($query) {
            $data['sizes'] = $query;
        }
         $query = $this->Md->query("SELECT  DISTINCT(file) FROM events WHERE  orgID='" . $this->session->userdata('orgID') . "' AND MONTH(date) = MONTH(CURDATE()) ORDER BY date DESC" );//AND date ='".date('m')."'
         //var_dump($query);
         if ($query) {
            $data['usage_tasks'] = $query;
        }
        
         $query = $this->Md->query("SELECT  DISTINCT(fileID) FROM disbursements WHERE  orgID='" . $this->session->userdata('orgID') . "' AND MONTH(date) = MONTH(CURDATE()) ORDER BY date DESC" );//AND date ='".date('m')."'
         //var_dump($query);
         if ($query) {
            $data['usage_dis'] = $query;
        }
         $query = $this->Md->query("SELECT  DISTINCT(fileID) FROM fees WHERE  orgID='" . $this->session->userdata('orgID') . "' AND MONTH(date) = MONTH(CURDATE()) ORDER BY date DESC" );//AND date ='".date('m')."'
         //var_dump($query);
         if ($query) {
            $data['usage_fees'] = $query;
        }
        $query = $this->Md->query("SELECT  DISTINCT(fileID) FROM expenses WHERE  orgID='" . $this->session->userdata('orgID') . "' AND MONTH(date) = MONTH(CURDATE()) ORDER BY date DESC" );//AND date ='".date('m')."'
         //var_dump($query);
         if ($query) {
            $data['usage_exp'] = $query;
        }


        $this->load->view('view-calendar', $data);
    }

    public function upload() {

        $this->load->helper(array('form', 'url'));
        if ($this->input->post('action') == 'update') {

            $result = $this->Md->check($this->input->post('taskID'), 'userID', 'users');

            if (!$result) {
                $id = $this->input->post('taskID');
                $sch = array('taskID' => $this->input->post('taskID'), 'date' => $this->input->post('date'), 'priority' => $this->input->post('priority'), 'period' => $this->input->post('period'), 'details' => $this->input->post('details'), 'orgID' => $this->input->post('orgID'), 'startTime' => $this->input->post('startTime'), 'endTime' => $this->input->post('endTime'), 'trigger' => $this->input->post('trigger'), 'userID' => $this->input->post('userID'), 'created' => date('Y-m-d'), 'fileID' => $this->input->post('file'));

                $this->Md->update_dynamic($id, 'taskID', 'tasks', $sch);
                echo 'Schedule information updated';
                return;
            } else {
                $sch = array('taskID' => $this->input->post('taskID'), 'date' => $this->input->post('date'), 'priority' => $this->input->post('priority'), 'period' => $this->input->post('period'), 'details' => $this->input->post('details'), 'orgID' => $this->input->post('orgID'), 'startTime' => $this->input->post('startTime'), 'endTime' => $this->input->post('endTime'), 'trigger' => $this->input->post('trigger'), 'userID' => $this->input->post('userID'), 'created' => date('Y-m-d'), 'fileID' => $this->input->post('file'));
                $this->Md->save($sch, 'tasks');
                echo "Information saved online";
                return;
            }
        }
        if ($this->input->post('action') == 'create') {

            $sch = array('taskID' => $this->input->post('taskID'), 'date' => $this->input->post('date'), 'priority' => $this->input->post('priority'), 'period' => $this->input->post('period'), 'details' => $this->input->post('details'), 'orgID' => $this->input->post('orgID'), 'startTime' => $this->input->post('startTime'), 'endTime' => $this->input->post('endTime'), 'trigger' => $this->input->post('trigger'), 'userID' => $this->input->post('userID'), 'created' => date('Y-m-d'), 'fileID' => $this->input->post('file'));
            $id = $this->Md->save($sch, 'tasks');
            echo "Information saved online";
            return;
        }
        if ($this->input->post('action') == 'delete') {
            // $query = $this->Md->delete($id, 'files');
            $query = $this->Md->cascade($this->input->post('taskID'), 'tasks', 'taskID');
            $query = $this->Md->cascade($this->input->post('taskID'), 'attend', 'taskID');
            //  $query = $this->Md->cascade($this->input->post('taskID'), 'attend', 'taskID');
        }
    }

    public function upload_attend() {

        $this->load->helper(array('form', 'url'));
        if ($this->input->post('action') == 'create') {
            $schs = array('attendID' => $this->input->post('attendID'), 'orgID' => $this->input->post('orgID'), 'userID' => $this->input->post('userID'), 'taskID' => $this->input->post('taskID'));
            $id = $this->Md->save($schs, 'attend');
            echo "Attendance Information saved online";
            return;
        }
    }

    public function upload_msg() {

        $this->load->helper(array('form', 'url'));
        if ($this->input->post('action') == 'create') {
            $mails = array('messageID' => $this->input->post('messageID'), 'body' => $this->input->post('body'), 'subject' => $this->input->post('subject'), 'date' => $this->input->post('date'), 'to' => $this->input->post('to'), 'created' => $this->input->post('created'), 'from' => $this->input->post('from'), 'sent' => $this->input->post('sent'), 'type' => $this->input->post('type'), 'orgID' => $this->input->post('orgID'));
            $this->Md->save($mails, 'message');
            echo "Attendance Information saved online";
            return;
        }
    }

    public function import() {

        $orgid = $this->session->userdata('orgid');

        if (isset($_POST["Import"])) {
            $filename = $_FILES["file"]["tmp_name"];
            // echo $filename;
            if ($_FILES["file"]["size"] > 0) {
                $file = fopen($filename, "r");
                $file = $filename;

                $objPHPExcel = PHPExcel_IOFactory::load($file);
                //      Get worksheet dimensions
                $sheet = $objPHPExcel->getSheet(0);
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
                // Loop through each row of the worksheet in turn
                for ($row = 1; $row < 2; $row++) {
                    //  Read a row of data into an array
                    // echo $row;
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                    // var_dump($rowData[0]);
                    // echo count($rowData[0]);
                    for ($m = 0; $m < count($rowData[0]); $m++) {
                        // echo $rowData[0][$m]."<br> ";
                    }
                }
                for ($row = 2; $row <= $highestRow; $row++) {
                    //  Read a row of data into an array
                    // echo $row;
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

                    // var_dump($rowData);
                    for ($d = 0; $d < count($rowData); $d++) {
                        // var_dump($rowData[$d]);
                        //echo $rowData[$d][0] . "<br>";
                        $fileid = $this->GUID();
                        //get($field, $value, $table)
                        $namer = $this->Md->get('name', $rowData[$d][4], 'files');
                        $filer = $this->Md->get('no', $rowData[$d][1], 'files');
                        //echo $name.'<br>';
                        //return;
                        // var_dump($namer);
                        // return;
                        if (strlen($rowData[$d][0]) > 2 && count($namer) == 0 && count($filer) == 0) {
                            //$users = array('id' => $userid, 'image' => " ", 'email' => $rowData[$d][2], 'name' => $rowData[$d][0], 'org' => $this->session->userdata('orgid'), 'address' => $rowData[$d][4], 'sync' => $rowData[$d][1], 'oid' => " ", 'contact' => $rowData[$d][3], 'password' => " ", 'types' => 'client', 'level' => '4', 'created' => date('Y-m-d H:i:s'), 'status' => 'T');
                            //$users = $this->Md->query_cell("SELECT * FROM users where name = '" .$rowData[$d][0] . "'", 'id');                         
                            $query = $this->Md->query("SELECT * FROM users where name LIKE '" . $rowData[$d][0] . "' AND org= '" . $this->session->userdata('orgid') . "' LIMIT 1");
                            if ($query) {
                                foreach ($query as $res) {
                                    $clientid = $res->id;
                                }
                            }
                            $query2 = $this->Md->query("SELECT * FROM users where name LIKE '" . $rowData[$d][10] . "' AND org= '" . $this->session->userdata('orgid') . "'  LIMIT 1");
                            if ($query2) {
                                foreach ($query2 as $res2) {
                                    $userid = $res2->id;
                                }
                            }
                            if ($clientid == " " || $userid == " ") {

                                continue;
                            }
                            //date('Y-m-d', strtotime($date))
                            $files = array('id' => $fileid, 'users' => $clientid, 'org' => $orgid, 'details' => $rowData[$d][3], 'name' => $rowData[$d][4], 'types' => $rowData[$d][2], 'created' => date('d-m-Y', strtotime($rowData[$d][9])), 'status' => 'T', 'no' => $rowData[$d][1], 'subject' => $rowData[$d][6], 'citation' => $rowData[$d][7], 'law' => $rowData[$d][8], 'co' => $userid);
                            $this->Md->save($files, 'files');
                            $contents = array('id' => $fileid, 'users' => $clientid, 'org' => $orgid, 'details' => $rowData[$d][3], 'name' => $rowData[$d][4], 'types' => $rowData[$d][2], 'created' => date('d-m-Y', strtotime($rowData[$d][9])), 'status' => 'T', 'no' => $rowData[$d][1], 'subject' => $rowData[$d][6], 'citation' => $rowData[$d][7], 'law' => $rowData[$d][8], 'co' => $userid);
                            $content = json_encode($contents);
                            $query = $this->Md->query("SELECT * FROM client where org = '" . $this->session->userdata('orgid') . "'");
                            if ($query) {
                                foreach ($query as $res) {
                                    $syc = array('org' => $this->session->userdata('orgid'), 'object' => 'files', 'contents' => $content, 'action' => 'create', 'oid' => $fileid, 'created' => date('Y-m-d H:i:s'), 'checksum' => $this->GUID(), 'client' => $res->name);
                                    $this->Md->save($syc, 'sync_data');
                                }
                            }
                            echo 'saving';
                        } else {

                            echo 'Repeated';
                        }
                    }
                }
                //  Insert row data array into your database of choice here
            }
//send the data in an array format

            fclose($file);
        }

        echo '<div class="alert alert-info">   <strong>Information uploaded!  </strong>	</div>';
        redirect('file', 'refresh');
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


        $query = $this->Md->query("SELECT * FROM tasks where orgID = '" . $this->session->userdata('orgID') . "' AND date='" . date('Y-m-d') . "'");
        //  var_dump($query);
        if ($query) {
            $data['tasks'] = $query;
        } else {
            $data['tasks'] = array();
        }

        $this->load->view('view-tasks', $data);
    }

    public function delete() {

        $this->load->helper(array('form', 'url'));
        $taskID = $this->uri->segment(3);
        $query = $this->Md->cascade($taskID, 'tasks', 'taskID');
        $query = $this->Md->cascade($taskID, 'attend', 'taskID');
        $query = $this->Md->cascade($taskID, 'message', 'taskID');

        redirect('task/view', 'refresh');
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
                    $this->Md->update_dynamic($user_id, 'taskID', 'tasks', $task);
                    echo "Updated";
                } else {
                    echo "Invalid Requests";
                }
            }
        } else {
            echo "Invalid Requests";
        }
    }

    public function create() {

        $this->load->helper(array('form', 'url'));

        $day = date('Y-m-d', strtotime($this->input->post('date')));
        if ($day == "") {
            $day = date('Y-m-d');
        }
        $notify = $this->input->post('trig');
        $notify = 'False';
        if ($notify != "") {
            $notify = 'True';
        }
         if ($this->input->post('court') != "") {
            $court = 'True';
        }
        $taskID = $this->GUID();

        $sch = array('id' => $taskID, 'date' => $day, 'priority' => $this->input->post('priority'), 'court' => $court, 'hours' => $this->input->post('period'), 'name' => $this->input->post('details'), 'orgID' => $this->session->userdata('orgID'), 'start' => $day."T".$this->input->post('startTime').":00", 'end' => $day."T".$this->input->post('endTime').":00", 'notify' => $notify, 'user' => $this->session->userdata('username'), 'file' => $this->session->userdata('file'), 'created' => date('Y-m-d'), 'action' => 'create','sync' => 'f');
        $id = $this->Md->save($sch, 'events');

        $message = "Reminder " . 'You have a meeting on ' . $this->input->post('date') . ' at ' . $this->input->post('startTime') . ' to ' . $this->input->post('endTime') . ' Details: ' . $this->input->post('details');
       
            if ($notify == "True") {
                $schedule = $day;                // echo $email;

         
                $emails = $this->Md->query_cell("SELECT * FROM users where name= '" .$this->session->userdata('username') . "'", 'email');
                $phones = $this->Md->query_cell("SELECT * FROM users where name= '" . $this->session->userdata('username') . "'", 'contact');
                $names = $this->Md->query_cell("SELECT * FROM users where name= '" .$this->session->userdata('username'). "'", 'name');
                 $id = $this->Md->query_cell("SELECT * FROM users where name= '" .$this->session->userdata('username'). "'", 'userID');
           
                $mail = array('messageID' => $this->GUID(), 'body' => $message, 'subject' => 'REMINDER', 'date' => $this->input->post('date'), 'to' => $names, 'created' => date('Y-m-d H:i:s'), 'from' => $this->session->userdata('orgemail'), 'sent' => 'false', 'type' => 'email', 'orgID' => $this->session->userdata('orgID'), 'action' => 'none', 'taskID' => $taskID, 'contact' => $phones, 'email' => $emails);
                $this->Md->save($mail, 'message');           

               
                 $this->session->set_flashdata('msg', '<div class="alert">                                                   
                                                <strong>
                                                 Saved and mail will be sent on ' . $schedule. '</strong>									
						</div>');
                
                redirect('task/add', 'refresh');
            
        }
        $this->session->set_flashdata('msg', '<div class="alert">                                                   
                                                <strong>
                                                 Schedule added dated ' . $day . '</strong>									
						</div>');
          redirect('task/add', 'refresh');
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
        $query = "SELECT * FROM tasks";

        if (!empty($sql)) {
            $query .= ' WHERE ' . implode(' AND ', $sql);
        }

        $get_result = $this->Md->query($query);

        if ($get_result) {

            if ($query) {
                $data['tasks'] = $get_result;
            } else {
                $data['tasks'] = array();
            }
            $this->load->view('view-tasks', $data);
        } else {
            $data = "No such data";
            $this->load->view('view-tasks', $data);
        }
    }

}
