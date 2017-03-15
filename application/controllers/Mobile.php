<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        // $this->load->library('session');
        $this->load->library('encrypt');
    }

    public function index() {
        $pass = urldecode($this->uri->segment(3));
        if ($pass != "123456") {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">  <strong> You are a cheat like Andrew</div>');
            redirect('welcome', 'refresh');
            return;
        }

        $data['users'] = array();
        $data['orgs'] = array();
        $query = $this->Md->query("SELECT * FROM users");
        if ($query)
            $data['users'] = $query;

        $query = $this->Md->query("SELECT * FROM organisation");
        if ($query)
            $data['orgs'] = $query;

        $this->load->view('org-page', $data);
    }

    public function login() {

        $this->load->helper(array('form', 'url'));

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //  $username = "0782481746";
        // $password = "123456";
        $password_now = md5($password);

        $get_result = $this->Md->check($username, 'contact', 'users');
        if (!$get_result) {
            $result = $this->Md->get('contact', $username, 'users');
            // var_dump($result);
            foreach ($result as $res) {
                $key = $username;
                //$password = $this->encrypt->decode($res->password, $key);
                //  $password = md5($this->input->post('passwords'));
                if ($password_now == $res->password) {
                    $b["info"] = "login successfull";
                    $b["status"] = "true";
                    $b["orgID"] = $res->orgID;

                    $orgname = $this->Md->query_cell("SELECT name FROM org WHERE orgID ='" . $res->orgID . "'", 'name');
                    $b["orgName"] = $orgname;
                    $b["name"] = $res->name;
                    $b["userID"] = $res->userID;
                    $b["contact"] = $res->contact;
                    $b["image"] = $res->image;

                    echo json_encode($b);
                    return;
                } else {
                    $b["info"] = "invalid password";
                    $b["status"] = "false";
                    echo json_encode($b);
                    return;
                }
            }
        } else {
            $b["info"] = "Invalid contact!";
            $b["status"] = "false";
            echo json_encode($b);
            return;
        }
    }

    public function calendar() {

        $this->load->helper(array('form', 'url'));
        // $info = array('name' =>'true');
        $username = $this->input->post('username');
        //$username = "Douglas Were";
        $orgID = $this->input->post('orgID');
        //$orgID = "A3CEA444-1F39-4F91-955D-0CA57E3C7962";

        $query = $this->Md->query("SELECT * FROM events  WHERE user ='" . $username . "' AND orgID ='" . $orgID . "' AND (cal<>'t' OR cal=NULL)");
        //echo json_encode($query);
       // return;
        $g = array();
       
        foreach ($query as $res) {
            $r = new stdClass();
       
            $r->details = $res->name;
            $r->file = $res->file;
            $r->startTime = date('H:i', strtotime($res->start));
            $r->day = date('l', strtotime($res->start));
            $r->endTime = date('H:i', strtotime($res->end));
            $r->status = $res->status;
            $r->date = $res->date;
            $g[] = $r;
        }
        //header('Content-Type: application/json');
        echo json_encode($g);
    }

    public function updated() {

        $this->load->helper(array('form', 'url'));
        $info = array('cal' => 't');
        $name = $this->input->post('name');
        $this->Md->update_dynamic($name, "user", "events", $info);
        return;
    }

    public function users() {


        $data['users'] = array();
        $data['orgs'] = array();
        $query = $this->Md->query("SELECT * FROM users");
        if ($query)
            $data['users'] = $query;

        $query = $this->Md->query("SELECT * FROM organisation");
        if ($query)
            $data['orgs'] = $query;

        $this->load->view('users-page', $data);
    }

    public function procedures() {


        $data['users'] = array();
        $data['orgs'] = array();
        $data['procedures'] = array();
        $query = $this->Md->query("SELECT * FROM users");
        if ($query)
            $data['users'] = $query;

        $query = $this->Md->query("SELECT * FROM organisation");
        if ($query)
            $data['orgs'] = $query;

        $query = $this->Md->query("SELECT * FROM procedures");
        if ($query)
            $data['procs'] = $query;

        $this->load->view('procedure-page', $data);
    }

    public function update() {

        if ($this->session->userdata('level') == 1) {

            $this->load->helper(array('form', 'url'));
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $address = $this->input->post('address');
            $code = $this->input->post('code');

            $org = array('id' => $id, 'name' => $name, 'address' => $address, 'code' => $code);

            $content = json_encode($org);
            $query = $this->Md->query("SELECT * FROM client where org = '" . $this->session->userdata('orgid') . "'");
            if ($query) {
                foreach ($query as $res) {
                    $syc = array('org' => $this->session->userdata('orgid'), 'object' => 'org', 'contents' => $content, 'action' => 'update', 'oid' => $id, 'created' => date('Y-m-d H:i:s'), 'checksum' => $this->GUID(), 'client' => $res->name);
                    $this->Md->save($syc, 'sync_data');
                }
            }
            $this->Md->update($id, $org, 'organisation');
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                 You may need to re-login for these changes to be carried out' . '	</strong>									
						</div>');
            redirect('welcome/info', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                 You cannot carry out this action ' . '	</strong>									
						</div>');
            redirect('welcome/info', 'refresh');
        }
    }

    public function api() {

        $orgname = urldecode($this->uri->segment(3));
        $verification = urldecode($this->uri->segment(4));
        if ($orgname != "" || $verification != "") {
            $query = $this->Md->query("SELECT * FROM organisation WHERE  name ='" . $orgname . "' AND `keys` = '" . $verification . "'");
            if ($query) {
                foreach ($query as $res) {
                    $clientname = $res->code . "-DESKTOP" . date('y') . "-" . date('m') . (int) date('d') . (int) date('H') . (int) date('i') . (int) date('s');
                    $orgid = $res->id;
                }
                $client = array('org' => $orgid, 'active' => 'T', 'name' => $clientname, 'created' => date('Y-m-d H:i:s'));
                $this->Md->save($client, 'client');
                $temp = json_encode($query);  //$json={"var1":"value1","var2":"value2"}   
                $temp = substr($temp, 0, -2);
                $temp.=',"oid":"' . $clientname . '"}]';
                echo $temp;
            }
        } else {
            echo "";
        }
    }

    public function exists() {
        $this->load->helper(array('form', 'url'));
        $email = trim($this->input->post('user'));
        if (strlen($email) < 5) {
            echo '<span style="color:#f00"> empty field! too short </span>';
            return;
        }
        $get_result = $this->Md->returns($email, 'email', 'users');
        //href= "index.php/patient/add_chronic/'.$chronic.'"
        if (!$get_result) {
            echo '<span style="color:#008000"> available not in use </span>';
        } else {
            echo '<span style="color:#f00"> not available ! already in use </span> <br>';
            echo '' . $get_result->contact . '<br>';
            echo '' . $get_result->email . '<br>';
            echo '' . $get_result->address . '<br>';
        }
    }

    public function name() {
        $this->load->helper(array('form', 'url'));
        $name = trim($this->input->post('name'));
        if (strlen($name) < 3) {
            echo '<span style="color:#f00"> empty field </span>';
            return;
        }
        $get_result = $this->Md->returns($name, 'name', 'organisation');
        //href= "index.php/patient/add_chronic/'.$chronic.'"
        if (!$get_result) {
            echo '<span style="color:#008000"> available not in use </span>';
        } else {
            echo '<span style="color:#f00"> ! already in use </span> <br>';
        }
    }

    public function code() {
        $this->load->helper(array('form', 'url'));
        $code = trim($this->input->post('code'));
        if (strlen($code) < 1) {
            echo '<span style="color:#f00"> empty field </span>';
            return;
        }
        $get_result = $this->Md->returns($code, 'code', 'organisation');
        //href= "index.php/patient/add_chronic/'.$chronic.'"
        if (!$get_result) {
            echo '<span style="color:#008000"> available not in use </span>';
        } else {
            echo '<span style="color:#f00"> not available ! already in use </span> <br>';
        }
    }

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function generate_key_string() {

        $tokens = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $segment_chars = 5;
        $num_segments = 4;
        $key_string = '';

        for ($i = 0; $i < $num_segments; $i++) {

            $segment = '';

            for ($j = 0; $j < $segment_chars; $j++) {
                $segment .= $tokens[rand(0, 35)];
            }

            $key_string .= $segment;

            if ($i < ($num_segments - 1)) {
                $key_string .= '-';
            }
        }

        return $key_string;
    }

    public function register() {
//organisation information
        $this->load->helper(array('form', 'url'));
        $name = $this->input->post('name');
        $code = $this->input->post('code');
        $license = $this->generate_key_string();
        $address = $this->input->post('address');
        $active = 'T';
        $starts = date('Y-m-d');
        $yourDate = date('Y-m-d');
        $mydate = date('Y-m-d', strtotime('+6 month', strtotime($yourDate)));
        $ends = $mydate;
        $sync = "";
        $oid = '';
        $action = '';
        $key = '';
        $version = '';
        $orgid = $this->GUID();

        //user information
        $userid = $this->GUID();
        $email = $this->input->post('email');
        $first = $this->input->post('first');
        $last = $this->input->post('last');
        $username = $first . ' ' . $last;
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $contact = $this->input->post('contact');
        $gender = "";
        $level = 1;
        $type = 'administrator';



        if ($first != "" && $last != "") {

            $password = $password;
            $key = $email;
            $password = $this->encrypt->encode($password, $key);
            $result = $this->Md->check($email, 'email', 'users');

            if (!$result) {
                $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                 email already in use please try again	</strong>									
						</div>');
                redirect('/organisation/register', 'refresh');
            }

            $result_org = $this->Md->check($code, 'code', 'organisation');

            if (!$result_org) {
                $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                 organisation code already registered</strong>									
						</div>');
                redirect('/organisation/register', 'refresh');
            }

            $result_org = $this->Md->check($name, 'name', 'organisation');

            if (!$result_org) {
                $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                 organisation name already registered</strong>									
						</div>');
                redirect('/organisation/register', 'refresh');
            }


            ///organisation image uploads
            $file_element_name = 'userfile';
            $file_element_organisation = 'orgfile';
            $config['upload_path'] = 'uploads/';
            // $config['upload_path'] = '/uploads/';
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
                $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>' . $msg . '</strong></div>');
            }
            if (!$this->upload->do_upload($file_element_organisation)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
                $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                  
                                                <strong>' . $msg . '</strong></div>');
            }
            $data = $this->upload->data();

            ///user image uploads

            $submitted = date('Y-m-d');
            $orgfile = $data['file_name'];
            $userfile = $data['file_name'];

            $users = array('id' => $userid, 'image' => '', 'email' => $email, 'name' => $username, 'org' => $orgid, 'address' => $address, 'sync' => $sync, 'oid' => $oid, 'contact' => $contact, 'password' => $password, 'types' => $type, 'level' => $level, 'created' => date('Y-m-d H:i:s'), 'status' => 'T');
            $this->Md->save($users, 'users');

            // $client = array('org' => $orgid,'name' => 'web', 'active' => 'T', 'created' =>  date('Y-m-d H:i:s'));
            //$file_id = $this->Md->save($client, 'client');
            ///syncs
            $content = array('id' => $userid, 'image' => $userfile, 'email' => $email, 'name' => $username, 'org' => $orgid, 'address' => $address, 'sync' => $sync, 'oid' => $oid, 'contact' => $contact, 'password' => $password, 'types' => $type, 'level' => $level, 'created' => date('Y-m-d H:i:s'), 'status' => 'T');
            $content = json_encode($content);

            $query = $this->Md->query("SELECT * FROM client where org = '" . $orgid . "'");
            if ($query) {
                foreach ($query as $res) {
                    $syc = array('object' => 'users', 'contents' => $content, 'action' => 'create', 'oid' => $userid, 'created' => date('Y-m-d H:i:s'), 'checksum' => $this->GUID(), 'client' => $res->name);
                    $file_id = $this->Md->save($syc, 'sync_data');
                }
            }
            /*             * */
            $org = array('id' => $orgid, 'image' => $orgfile, 'name' => $name, 'ends' => $ends, 'starts' => $starts, 'sync' => $sync, 'active' => $active, 'oid' => $oid, 'address' => $address, 'keys' => $license, 'version' => $version, 'code' => $code);
            $file_id = $this->Md->save($org, 'organisation');

            $this->session->set_flashdata('msg', '<div class="alert alert-success">
                                   <strong>information submitted</strong>									
						</div>');
            $newdata = array(
                'id' => $res->id,
                'username' => $username,
                'name' => $name,
                'email' => $email,
                'orgimage' => $orgfile,
                'orgid' => $orgid,
                'address' => $address,
                'userimage' => $userfile,
                'starts' => $starts,
                'ends' => $ends,
                'code' => $code,
                'license' => $license,
                'level' => $level,
                'status' => $status,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            redirect('/welcome/home', 'refresh');
        }
        $this->index();
    }

    public function logout() {

        $this->session->sess_destroy();
        redirect('welcome/logout', 'refresh');
    }

    public function student() {
        $this->load->view('private');
    }

    public function management() {

        $cty = $this->session->userdata('country');

        $name = $this->session->userdata('name');
        $query = $this->Md->get('reciever', $name, 'chat');
        //  var_dump($query);
        if ($query) {
            $data['chats'] = $query;
        } else {
            $data['chats'] = array();
        }
        $query = $this->Md->query("SELECT * FROM outbreak where country = '" . $cty . "'");
        //  var_dump($query);
        if ($query) {
            $data['outbreaks'] = $query;
        } else {
            $data['outbreaks'] = array();
        }

        $query = $this->Md->query("SELECT * FROM publication where country = '" . $cty . "'");
        //  var_dump($query);
        if ($query) {
            $data['pubs'] = $query;
        } else {
            $data['pubs'] = array();
        }
        $query = $this->Md->query("SELECT * FROM student where status = 'false'");
        //  var_dump($query);
        if ($query) {
            $data['student_cnt_false'] = $query;
        } else {
            $data['student_cnt_false'] = array();
        }

        $query = $this->Md->query("SELECT * FROM publication where verified = 'false'");
        //  var_dump($query);
        if ($query) {
            $data['publication_cnt_review'] = $query;
        } else {
            $data['publication_cnt_review'] = array();
        }
        $query = $this->Md->query("SELECT * FROM publication where accepted = 'no'");
        //  var_dump($query);
        if ($query) {
            $data['publication_cnt_accepted'] = $query;
        } else {
            $data['publication_cnt_accepted'] = array();
        }

        $query = $this->Md->query("SELECT * FROM presentation where accepted = 'no'");
        //  var_dump($query);
        if ($query) {
            $data['present_cnt_accepted'] = $query;
        } else {
            $data['present_cnt_accepted'] = array();
        }


        $this->load->view('center_page', $data);
    }

    public function projects() {

        $query = $this->Md->show('project');
        if ($query) {
            $data['projects'] = $query;
        } else {
            $data['projects'] = array();
        }


        $this->load->view('projects', $data);
    }

    public function services() {

        $query = $this->Md->show('service');
        if ($query) {
            $data['services'] = $query;
        } else {
            $data['services'] = array();
        }
        $this->load->view('services', $data);
    }

    public function profile() {

        $query = $this->Md->show('profile');
        if ($query) {
            $data['profiles'] = $query;
        } else {
            $data['profiles'] = array();
        }
        $this->load->view('profile', $data);
    }

    public function contact() {
        $this->load->view('contact');
    }

    public function project() {
        $this->load->view('project');
    }

    public function files() {

        $lawyer = $this->input->post('name');
        $orgID = $this->input->post('orgID');
        // $lawyer = "Douglas Were";
        // $orgID = "A3CEA444-1F39-4F91-955D-0CA57E3C7962";

        $g = new stdClass();
        $count = 1;
        $query2 = $this->Md->query("select * from file WHERE orgID='" . $orgID . "' AND lawyer='" . $lawyer . "'");
        // $query2 = $this->Md->query("select * from file");
        $results = $query2;
        foreach ($results as $res) {
            $r = new stdClass();
            $r->count = $count++;
            $r->name = $res->name;
            $r->client = $res->client;
            $r->contact = $res->contact;
            $r->due = $res->due;
            $r->note = $res->note;
            $r->progress = $res->progress;
            $g->files[] = $r;
        }
        header('Content-Type: application/json');
        echo json_encode($g);
    }

    public function upcoming_files() {

        $lawyer = $this->input->post('name');
        $orgID = $this->input->post('orgID');
        // $lawyer = "Douglas Were";
        //$orgID = "A3CEA444-1F39-4F91-955D-0CA57E3C7962";


        $g = new stdClass();
        $count = 1;
        $query2 = $this->Md->query("select * from file WHERE orgID='" . $orgID . "' AND lawyer ='" . $lawyer . "' AND due='" . date('Y-m-d') . "'");
        //$query2 = $this->Md->query("select * from file");
        $results = $query2;
        foreach ($results as $res) {
            $r = new stdClass();
            $r->count = $count++;
            $r->name = $res->name;
            $r->client = $res->client;
            $r->contact = $res->contact;
            $r->due = $res->due;
            $r->note = $res->note;
            $r->progress = $res->progress;
            $g->files[] = $r;
        }
        header('Content-Type: application/json');
        echo json_encode($g);
    }

    public function upcoming_events() {

        $lawyer = $this->input->post('name');
        $orgID = $this->input->post('orgID');
        // $lawyer = "Douglas Were";
        // $orgID = "A3CEA444-1F39-4F91-955D-0CA57E3C7962";


        $g = new stdClass();
        $count = 1;
        $query2 = $this->Md->query("select * from events WHERE orgID='" . $orgID . "' AND user ='" . $lawyer . "' AND MONTH(STR_TO_DATE(date,'%Y-%m-%d'))='" . date('m') . "' AND YEAR(STR_TO_DATE(date,'%Y-%m-%d'))='" . date('Y') . "' ORDER BY date DESC ");
        //$query2 = $this->Md->query("select * from events");

        $results = $query2;
        foreach ($results as $res) {
            $r = new stdClass();
            $r->count = $count++;
            $r->name = $res->name;
            $r->file = $res->file;
            $r->start = date('H:i', strtotime($res->start));
            $r->day = date('l', strtotime($res->start));
            $r->end = date('H:i', strtotime($res->end));
            $r->status = $res->status;
            $r->date = $res->date;
            $g->events[] = $r;
        }
        header('Content-Type: application/json');
        echo json_encode($g);
    }

    public function clients() {

        $lawyer = $this->input->post('name');
        $orgID = $this->input->post('orgID');
        // $lawyer = "Douglas Were";
        // $orgID = "A3CEA444-1F39-4F91-955D-0CA57E3C7962";


        $g = new stdClass();
        $count = 1;
        $query2 = $this->Md->query("select * from client WHERE orgID='" . $orgID . "' AND lawyer ='" . $lawyer . "'");
        // $query2 = $this->Md->query("select * from client");
        $results = $query2;
        foreach ($results as $res) {
            $r = new stdClass();
            $r->count = $count++;
            $r->name = $res->name;
            $r->image = $res->image;
            $r->contact = $res->contact;
            $r->email = $res->email;
            $r->address = $res->address;
            $r->status = $res->status;

            $g->clients[] = $r;
        }
        header('Content-Type: application/json');
        echo json_encode($g);
    }

    public function docs() {

        $lawyer = $this->input->post('name');
        $orgID = $this->input->post('orgID');

        $g = new stdClass();
        $count = 1;
        $query2 = $this->Md->query("select * from document WHERE orgID='$orgID' AND lawyer ='$lawyer'");
        //$query2 = $this->Md->query("select * from client");
        $results = $query2;
        foreach ($results as $res) {
            $r = new stdClass();
            $r->count = $count++;
            $r->name = $res->name;
            $r->fileUrl = $res->fileUrl;
            $g->docs[] = $r;
        }
        header('Content-Type: application/json');
        echo json_encode($g);
    }

}
