<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Organisation extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
    }

    public function index() {
        $this->load->view('login');
    }
    public function lists() {
        //  $query = $this->Md->query("SELECT * FROM client WHERE  orgID='" . $this->session->userdata('orgID') . "'");
        $query = $this->Md->query("SELECT * FROM org");
        echo json_encode($query);
    }
    public function update() {

        if ($this->session->userdata('level') == 1) {

            $this->load->helper(array('form', 'url'));
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $address = $this->input->post('address');
            $code = $this->input->post('code');
            $email = $this->input->post('email');

            $org = array('id' => $id, 'name' => $name, 'address' => $address, 'code' => $code, 'sync' => $email);

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
    }  public function session() {
        
       $new_session =  $this->input->post('organisation');
        $this->session->set_userdata('orgid',$new_session);
        $this->session->set_userdata('orgID',$new_session);
        redirect('administration', 'refresh');
        
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
        $get_result = $this->Md->returns($name, 'name', 'org');
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
        $get_result = $this->Md->returns($code, 'code', 'org');
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

        $license = $this->generate_key_string();
        $active = 'Active';
        $starts = date('Y-m-d');
        $yourDate = date('Y-m-d');
        $mydate = date('Y-m-d', strtotime('+6 month', strtotime($yourDate)));
        $ends = $mydate;

        $orgID = $this->GUID();
        $userID = $this->GUID();

        $result_org = $this->Md->check($code, 'code', 'org');

        if (!$result_org) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                 Organisation code already registered</strong>									
						</div>');
            redirect('/home', 'refresh');
        }

        $result_org = $this->Md->check($name, 'name', 'org');

        if (!$result_org) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                 Organisation name already registered</strong>									
						</div>');
            redirect('/home', 'refresh');
            return;
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
        $orgfile = $data['file_name'];
        $userfile = $data['file_name'];

        $users = array('userID' => $userID, 'image' => 'default.png', 'email' => $this->input->post('userEmail'), 'name' => $this->input->post('username'), 'orgID' => $orgID, 'address' => $this->input->post('address'), 'contact' => $this->input->post('contact'), 'password' => md5($this->input->post('password')), 'category' => 'Staff', 'designation' => 'Administrator', 'created' => date('Y-m-d H:i:s'), 'status' => 'Active', 'action' => 'none');
        $this->Md->save($users, 'users');


        $org = array('orgID' => $orgID, 'image' => $orgfile, 'name' => $this->input->post('name'), 'ends' => $ends, 'starts' => $starts, 'currency' => $this->input->post('currency'), 'status' => 'Active', 'region' => $this->input->post('region'), 'address' => $this->input->post('address'), 'license' => $license, 'country' => $this->input->post('country'), 'code' => $this->input->post('code'), 'city' => $this->input->post('city'), 'email' => $this->input->post('companyEmail'), 'action' => 'none');
        $this->Md->save($org, 'org');

        $this->session->set_flashdata('msg', '<div class="alert alert-success">
                                   <strong>Information submitted</strong>									
						</div>');
        $newdata = array(
            'username' => $this->input->post('name'),
            'name' => $this->input->post('name'),
            'useremail' => $this->input->post('userEmail'),
            'orgemail' => $this->input->post('companyEmail'),
            'orgimage' => $orgfile,
            'orgid' => $orgID,
            'address' => $this->input->post('address'),
            'userimage' => 'default.png',
            'starts' => $starts,
            'ends' => $ends,
            'code' => $code,
            'license' => $license,
            'status' => $status,
            'logged_in' => TRUE
        );

        $this->session->set_userdata($newdata);
        redirect('/home/home', 'refresh');

        $this->index();
    }

    public function logout() {

        $this->session->sess_destroy();
        redirect('welcome/logout', 'refresh');
    }

    public function login() {


        $this->load->helper(array('form', 'url'));
        $email = $this->input->post('email');
        $password_now = $this->input->post('password');
        $key = $email;

        $get_student = $this->Md->check($email, 'email', 'student');
        $get_user = $this->Md->check($email, 'email', 'user');


        if (!$get_student || !$get_user) {
            if (count($get_student) > 0) {

                $result = $this->Md->get('email', $email, 'student');
                // var_dump($result);
                foreach ($result as $res) {
                    $key = $email;
                    $password = $this->encrypt->decode($res->password, $key);

                    if ($password_now == $password) {
                        $status = $res->status;
                        $newdata = array(
                            'id' => $res->id,
                            'name' => $res->fname . ' ' . $res->lname . ' ' . $res->other,
                            'email' => $res->email,
                            'image' => $res->image,
                            'contact' => $res->contact,
                            'country' => $res->country,
                            'cohort' => $res->cohort,
                            'level' => 'student',
                            'status' => $res->status,
                            'logged_in' => TRUE
                        );

                        $this->session->set_userdata($newdata);

                        $cty = $this->session->userdata('country');
                        $country = $this->Md->get('name', $cty, 'country');
                        foreach ($country as $res) {
                            $county = $res->image;
                        }
                        $this->session->set_userdata('flag', $county);

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

                        $query = $this->Md->show('event');
                        //  var_dump($query);
                        if ($query) {
                            $data['events'] = $query;
                        } else {
                            $data['events'] = array();
                        }
                        $query = $this->Md->show('event');
                        //  var_dump($query);
                        if ($query) {
                            $data['events'] = $query;
                        } else {
                            $data['events'] = array();
                        }
                        $query = $this->Md->show('student');
                        //  var_dump($query);
                        if ($query) {
                            $data['students'] = $query;
                        } else {
                            $data['students'] = array();
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
                        if ($status != 'false') {
                            $this->load->view('center_page', $data);
                        } else {
                            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                your account has not yet been activated</strong>									
						</div>');
                            redirect('welcome/register', 'refresh');
                        }
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                 invalid password for student</strong>									
						</div>');
                        redirect('welcome/register', 'refresh');
                    }
                }
            }

            if (count($get_user) > 0) {
                $get_result = $this->Md->check($email, 'email', 'user');
                if (!$get_result) {
                    //$this->session->set_flashdata('msg', 'Welcome'.$email);
                    //get($field,$value,$table)
                    $result = $this->Md->get('email', $email, 'user');
                    // var_dump($result);
                    foreach ($result as $res) {
                        $key = $email;
                        $password = $this->encrypt->decode($res->password, $key);

                        if ($password_now == $password) {

                            $newdata = array(
                                'id' => $res->id,
                                'name' => $res->fname . ' ' . $res->lname . ' ',
                                'email' => $res->email,
                                'contact' => $res->contact,
                                'country' => $res->country,
                                'image' => $res->image,
                                'status' => $res->status,
                                'level' => $res->level,
                                'logged_in' => TRUE
                            );
                            $this->session->set_userdata($newdata);

                            if ($this->session->userdata('level') > 0) {
                                $cty = $this->session->userdata('country');
                                $country = $this->Md->get('name', $cty, 'country');
                                foreach ($country as $res) {
                                    $county = $res->image;
                                }
                                $this->session->set_userdata('flag', $county);

                                redirect('welcome/management/', 'refresh');
                                return;
                            }


                            redirect('welcome/management/', 'refresh');
                        } else {
                            $this->session->set_flashdata('msg', '<div class="alert alert-error"> <strong>! invalid password</strong></div>');
                            redirect('welcome/register', 'refresh');
                        }
                    }
                }
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">  <strong>  ! invalid login credentials</div>');
            redirect('welcome/register', 'refresh');
        }
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

        $this->load->helper(array('form', 'url'));
        $name = urldecode($this->uri->segment(3));


        $query = $this->Md->query("SELECT * FROM org where orgID='" . $this->session->userdata('orgID') . "'");

        if ($query) {
            $data['org'] = $query;
        } else {
            $data['org'] = array();
        }

        $this->load->view('organisation-profile', $data);
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
                    $task = array($field_name => $val,'sync'=>'f');
                    // $this->Md->update($user_id, $task, 'tasks');
                    $this->Md->update_dynamic($user_id, 'orgID', 'org', $task);
                    echo "Updated";
                } else {
                    echo "Invalid Requests";
                }
            }
        } else {
            echo "Invalid Requests";
        }
    }

    public function update_image() {

        $this->load->helper(array('form', 'url'));
        //user information

        $userID = $this->input->post('orgID');
        $namer = $this->input->post('namer');


        $file_element_name = 'userfile';
        // $new_name = $userID;
        $config['file_name'] = $userID;
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = FALSE;
        $config['allowed_types'] = 'jpg';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_element_name)) {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
            $this->session->set_flashdata('msg', '<div class="alert alert-error"> <strong>' . $msg . '</strong></div>');
            redirect('/organisation/profile/' . $namer, 'refresh');

            return;
        }
        $data = $this->upload->data();
        $userfile = $data['file_name'];
        $user = array('image' => $userfile,'sync'=>'f');
        $this->Md->update_dynamic($userID, 'orgID', 'org', $user);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">  <strong>Image updated saved</strong></div>');

        redirect('/organisation/profile/' . $namer, 'refresh');
    }

    public function contact() {
        $this->load->view('contact');
    }

    public function project() {
        $this->load->view('project');
    }

    public function updates() {

        $this->load->helper(array('form', 'url'));

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $code = $this->input->post('code');
        $org = array('id' => $id, 'name' => $name, 'code' => $code);



        $this->Md->update($id, $org, 'organisation');
    }

    public function delete() {






        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(3);
        $this->Md->remove($id, 'organisaton', 'image');
        $this->Md->cascade($id, 'org', 'attend');
        $this->Md->cascade($id, 'org', 'bill');
        $this->Md->cascade($id, 'org', 'client');
        $this->Md->cascade($id, 'org', 'document');
        $this->Md->cascade($id, 'org', 'files');
        $this->Md->cascade($id, 'org', 'item');
        $this->Md->cascade($id, 'org', 'note');
        $this->Md->cascade($id, 'org', 'schedule');
        $this->Md->cascade($id, 'org', 'sync_data');
        $this->Md->cascade($id, 'org', 'payments');
        $this->Md->cascade($id, 'org', 'transactions');
        $this->Md->cascade($id, 'org', 'users');
        $query = $this->Md->delete($id, 'organisation');
        if ($this->db->affected_rows() > 0) {

            $query = $this->Md->query("SELECT * FROM client where org = '" . $this->session->userdata('orgid') . "'");
            if ($query) {
                foreach ($query as $res) {
                    $syc = array('object' => 'users', 'contents' => '', 'action' => 'delete', 'oid' => $id, 'created' => date('Y-m-d H:i:s'), 'checksum' => $this->GUID(), 'client' => $res->name);
                    $this->Md->save($syc, 'sync_data');
                }
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                Information deleted	</strong>									
						</div>');
            redirect('user/client', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                             Action Failed	</strong>									
						</div>');
            redirect('user/client', 'refresh');
        }
    }

}
