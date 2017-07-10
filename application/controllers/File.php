<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

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
        $query = $this->Md->query("SELECT * FROM users where orgID = '" . $this->session->userdata('orgid') . "' ");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $query = $this->Md->query("SELECT *,files.type AS type,users.surname AS user,users.image AS user_image,client.image AS client_image,files.name as name,client.name AS client FROM files LEFT JOIN users ON users.id = files.userID LEFT JOIN client ON client.id = files.client where files.orgID = '" . $this->session->userdata('orgID') . "' ");

        if ($query) {
            $data['files'] = $query;
        } else {
            $data['files'] = array();
        }
        $this->load->view('view-files', $data);
    }

    public function lists() {

        $query = $this->Md->query("SELECT * FROM files WHERE  orgID='" . $this->session->userdata('orgID') . "' ");
        //$query = $this->Md->query("SELECT * FROM client");
        echo json_encode($query);
    }

    public function add() {

        $query = $this->Md->query("SELECT * FROM users where orgID = '" . $this->session->userdata('orgID') . "'");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $query = $this->Md->query("SELECT * FROM client where orgID = '" . $this->session->userdata('orgID') . "'");

        if ($query) {
            $data['clients'] = $query;
        } else {
            $data['clients'] = array();
        }

        $this->load->view('add-file', $data);
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

    public function profile() {

        $this->load->helper(array('form', 'url'));
        $name = urldecode($this->uri->segment(3));

        $query = $this->Md->query("SELECT * FROM events where orgID = '" . $this->session->userdata('orgID') . "'AND user='" . $name . "' ");

        if ($query) {
            $data['events'] = $query;
        } else {
            $data['events'] = array();
        }
        $query = $this->Md->query("SELECT * FROM users where name ='" . $name . "' AND orgID='" . $this->session->userdata('orgID') . "'");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $this->load->helper(array('form', 'url'));
        $query = $this->Md->query("SELECT * FROM file where orgID = '" . $this->session->userdata('orgID') . "' AND name='" . $name . "' ");

        if ($query) {
            $data['files'] = $query;
        } else {
            $data['files'] = array();
        }
        $query = $this->Md->query("SELECT * FROM  tasks where orgID = '" . $this->session->userdata('orgID') . "' AND fileID = '" . $name . "' ");
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
        $query = $this->Md->query("SELECT * FROM document where orgID = '" . $this->session->userdata('orgID') . "' AND fileID = '" . $name . "'");

        if ($query) {
            $data['docs'] = $query;
        } else {
            $data['docs'] = array();
        }
        $query = $this->Md->query("SELECT * FROM transaction where orgID = '" . $this->session->userdata('orgID') . "'  AND fileID = '" . $name . "' ");
        //  var_dump($query);
        if ($query) {
            $data['trans'] = $query;
        } else {
            $data['trans'] = array();
        }
        $this->load->view('file-profile', $data);
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

        $file = array('name' => $this->input->post('name'), 'type' => $this->input->post('type'), 'details' => $this->input->post('details'), 'subject' => $this->input->post('subject'),'no' => $this->input->post('no'), 'type' => $this->input->post('type'), 'citation' => $this->input->post('citation'), 'law' => $this->input->post('law'), 'status' => $this->input->post('status'), 'created' => date('d-m-Y H:i:s'));
        $this->Md->update_dynamic($id, 'id', 'file', $file);
        echo 'FILE INFORMATION UPDATED';
    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $fileID = $this->uri->segment(3);
        $query = $this->Md->cascade($fileID, 'files', 'id');
        redirect('/file', 'refresh');
    }

    public function create() {

        $this->load->helper(array('form', 'url'));

        if ($this->input->post('name') != "" || $this->input->post('no') != "") {

            $files = array('id' => $this->GUID(), 'name' => $this->input->post('name'), 'client' => $this->input->post('clientID'), 'userID' => $this->input->post('userID'),'contact' => $this->input->post('contact'),'no' => $this->input->post('no'),'type' => $this->input->post('type'),'subject' => $this->input->post('subject'),'citation' => $this->input->post('citation'),'law' => $this->input->post('law'),'status' => $this->input->post('status'),'note' => $this->input->post('note'),'opened' => date('d-m-Y', strtotime($this->input->post('opened'))),'due' => date('d-m-Y', strtotime($this->input->post('due'))), 'created' => date('d-m-Y H:i:s'), 'orgID' => $this->session->userdata('orgID'), 'progress' => $this->input->post('progress'));
            $this->Md->save($files, 'files');
            $this->session->set_flashdata('msg', '<div class="alert alert-success"> <strong>New File Saved</strong></div>');

            redirect('/file', 'refresh');
        } else {

            $this->session->set_flashdata('msg', '<div class="alert alert-erro"><strong>Invalid fields</strong></div>');
        }

        redirect('/file', 'refresh');
    }

    public function advanced() {

        $this->load->helper(array('form', 'url'));
        $query = $this->Md->query("SELECT * FROM file where orgID = '" . $this->session->userdata('orgID') . "' ");

        if ($query) {
            $data['files'] = $query;
        } else {
            $data['files'] = array();
        }


        $this->load->view('file-advanced', $data);
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
                    $task = array($field_name => $val, 'sync' => date('Y-m-d H:i:s'));
                    // $this->Md->update($user_id, $task, 'tasks');
                    $this->Md->update_dynamic($user_id, 'fileID', 'file', $task);
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
        $name = $this->input->post('name');
        $client = $this->input->post('client');

        $gen = $name;

        echo '<h3>' . $gen . '</h3>';

        $sql[] = NULL;
        unset($sql);
        if ($name != "") {

            $sql[] = "name= '$name'";
        }
        if ($client != "") {

            $sql[] = "client= '$client'";
        }
        $sql[] = "orgID = '" . $this->session->userdata('orgID') . "'";
        $query = "SELECT * FROM file";

        if (!empty($sql)) {
            $query .= ' WHERE ' . implode(' AND ', $sql);
        }
        $get_result = $this->Md->query($query);

        if ($get_result) {

            if ($query) {
                $data['files'] = $get_result;
            } else {
                $data['files'] = array();
            }

            $this->load->view('file-advanced', $data);
        } else {
            $data = "No such data";
            $this->load->view('file-advanced', $data);
        }
    }

}
