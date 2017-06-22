<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
    }

    public function index() {

        $query = $this->Md->query("SELECT name,image FROM org  WHERE image<>''");

        if ($query) {
            $data['orgs'] = $query;
        } else {
            $data['orgs'] = array();
        }
        $query = $this->Md->query("SELECT * FROM template WHERE orgID=''  LIMIT 3 ");

        if ($query) {
            $data['docs'] = $query;
        } else {
            $data['docs'] = array();
        }
        $query = $this->Md->query("SELECT * FROM events WHERE YEAR(STR_TO_DATE(date,'%Y-%m-%d')) = '" . date('Y') . "' ");
        if ($query) {
            $data['payments_year'] = $query;
        }
         $query = $this->Md->query("SELECT * FROM users ");
        if ($query) {
            $data['users'] = $query;
        }
         $query = $this->Md->query("SELECT * FROM client");
        if ($query) {
            $data['clients'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM file");
        if ($query) {
            $data['files'] = $query;
        }
        
        $this->load->view('web', $data);
    }

    public function registration() {

        // $query = $this->Md->query("SELECT * FROM users where org='".$this->session->userdata('orgid')."'");
        $query = $this->Md->query("SELECT * FROM users");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $this->load->view('login-page', $data);
    }

    public function home() {

        if ($this->session->userdata('orgID') == "") {
            $this->session->sess_destroy();
            redirect('home', 'refresh');
        }

        // $query = $this->Md->query("SELECT * FROM users where org='".$this->session->userdata('orgid')."'");
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
        $query = $this->Md->query("SELECT * FROM events where  orgID='" . $this->session->userdata('orgID') . "' AND status<>'complete' AND date='" . date('Y-m-d') . "'");
        if ($query) {
            $data['notcomplete'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM message where  orgID='" . $this->session->userdata('orgID') . "' AND sent='false' AND date='" . date('Y-m-d') . "'");
        if ($query) {
            $data['notsent'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM tasks where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['tasks'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM client where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['clients'] = $query;
        }

        $query = $this->Md->query("SELECT * FROM transaction where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['transactions'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM payment where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['payments'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM expenses where  orgID='" . $this->session->userdata('orgID') . "' AND approved<>'true'");
        if ($query) {
            $data['expenses_not_approved'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM expenses where  orgID='" . $this->session->userdata('orgID') . "' AND paid<>'true'");
        if ($query) {
            $data['expenses_not_paid'] = $query;
        }

        $query = $this->Md->query("SELECT * FROM fees where  orgID='" . $this->session->userdata('orgID') . "' AND paid<>'true'");
        if ($query) {
            $data['fees_not_paid'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM disbursements where  orgID='" . $this->session->userdata('orgID') . "' AND paid<>'true'");
        if ($query) {
            $data['dis_not_paid'] = $query;
        }
        $query = $this->Md->query("SELECT SUM(sizes) AS size FROM document where  orgID='" . $this->session->userdata('orgID') . "'");
        // var_dump($query);
        if ($query) {
            $data['sizes'] = $query;
        }

        $query = $this->Md->query("SELECT  DISTINCT(fileID) FROM tasks WHERE  orgID='" . $this->session->userdata('orgID') . "' AND MONTH(date) = MONTH(CURDATE()) ORDER BY date DESC"); //AND date ='".date('m')."'
        //var_dump($query);
        if ($query) {
            $data['usage_tasks'] = $query;
        }

        $query = $this->Md->query("SELECT  DISTINCT(fileID) FROM disbursements WHERE  orgID='" . $this->session->userdata('orgID') . "' AND MONTH(date) = MONTH(CURDATE()) ORDER BY date DESC"); //AND date ='".date('m')."'
        //var_dump($query);
        if ($query) {
            $data['usage_dis'] = $query;
        }
        $query = $this->Md->query("SELECT  DISTINCT(fileID) FROM fees WHERE  orgID='" . $this->session->userdata('orgID') . "' AND MONTH(date) = MONTH(CURDATE()) ORDER BY date DESC"); //AND date ='".date('m')."'
        //var_dump($query);
        if ($query) {
            $data['usage_fees'] = $query;
        }
        $query = $this->Md->query("SELECT  DISTINCT(fileID) FROM expenses WHERE  orgID='" . $this->session->userdata('orgID') . "' AND MONTH(date) = MONTH(CURDATE()) ORDER BY date DESC"); //AND date ='".date('m')."'
        //var_dump($query);
        if ($query) {
            $data['usage_exp'] = $query;
        }
        //SELECT DISTINCT(Date) AS Date FROM buy ORDER BY Date DESC;
        $this->load->view('home-page', $data);
    }

    public function version() {

        $this->load->view('version');
    }

    public function page() {

        $this->load->view('page');
    }

    public function contact() {

        // $query = $this->Md->query("SELECT * FROM users where org='".$this->session->userdata('orgid')."'");
        $query = $this->Md->query("SELECT * FROM users");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $this->load->view('login-page', $data);
    }

    public function start() {
        // $query = $this->Md->query("SELECT * FROM users where org='".$this->session->userdata('orgid')."'");
        $query = $this->Md->query("SELECT * FROM users");


//  var_dump($query);
        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }


        $this->load->view('start-page', $data);
    }

    public function logout() {

        $this->session->sess_destroy();
        redirect('home', 'refresh');
    }

    public function login() {

        // redirect('/home/home', 'refresh');
        //return;

        $this->load->helper(array('form', 'url'));
        $email = $this->input->post('emails');
        $password = md5($this->input->post('passwords'));
        // echo md5($password) ;


        $get_user = $this->Md->query("SELECT *,org.email AS email,users.email AS userEmail,users.address AS userAddress,org.address AS address,users.orgID AS orgID,users.name AS user,org.name AS org,org.image AS orgImage,users.image AS image FROM users LEFT JOIN org ON org.orgID = users.orgID LEFT JOIN roles ON roles.title = users.designation WHERE contact = '$email' AND password='$password'");

        if (count($get_user) > 0) {
            // var_dump($results);
            //return;
            foreach ($get_user as $resv) {
                $level = $resv->level;
                $this->session->set_userdata('name', $resv->org);
                $this->session->set_userdata('orgimage', $resv->orgImage);
                $this->session->set_userdata('address', $resv->address);
                $this->session->set_userdata('level', $level);
                $this->session->set_userdata('code', $resv->code);
                $this->session->set_userdata('top', $resv->top);
                $this->session->set_userdata('vat', $resv->vat);
                $this->session->set_userdata('tin', $resv->tin);
                $this->session->set_userdata('country', $resv->country);
                $this->session->set_userdata('orgemail', $resv->emaill);
                // $this->session->set_userdata('license', $license);
                $this->session->set_userdata('username', $resv->name);
                $this->session->set_userdata('orgid', $resv->orgID);

                $views = $this->Md->query_cell("SELECT * FROM  roles where title= '" . $resv->designation . "' AND orgID = '" . $resv->orgID . "'", 'views');
                $actions = $this->Md->query_cell("SELECT * FROM  roles where title= '" . $resv->designation . "' AND orgID = '" . $resv->orgID . "'", 'actions');

                if (strlen($views) < 3 || strlen($actions) < 3) {
                    if (strlen($resv->designation) > 2) {

                        $user = array('sync' => 'f', 'id' => $this->GUID(), 'title' => $resv->designation, 'views' => 'calendar time sheets files clients tasks  templates  documents users page', 'actions' => 'create update delete edit', 'orgID' => $resv->orgID);
                        $this->Md->save($user, 'roles');
                        $views = 'calendar time sheets files clients tasks  templates documents users';
                        $actions = 'create update delete edit';
                    } else {

                        $user = array('sync' => 'f', 'id' => $this->GUID(), 'title' => 'Administrator', 'views' => 'fee expense petty wallet report calendar time sheets files clients tasks payments expenses wallet templates roles  documents users page additions', 'actions' => 'create update delete edit', 'orgID' => $resv->orgID);
                        $this->Md->save($user, 'roles');
                        $views = 'fee expense petty wallets report profile organisation calendar time sheets files clients tasks payments expenses wallet templates roles  documents users page additions';
                        $actions = 'create update delete edit';
                    }
                }
                $newdata = array(
                    'userID' => $resv->userID,
                    'orgID' => $resv->orgID,
                    'username' => $resv->user,
                    'email' => $resv->userEmail,
                    'userimage' => $resv->image,
                    'category' => $resv->category,
                    'designation' => $resv->designation,
                    'views' => $views,
                    'actions' => $actions,
                    'status' => $resv->status,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
            }
            redirect('home', 'refresh');
        } else {

            $this->session->set_flashdata('msg', '<span href="<?php echo base_url(); ?>index.php/home/registration" class="btn btn-error"> ! User does not exist</span>');
            redirect('home', 'refresh');
        }
    }

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function student() {
        $this->load->view('private');
    }

    public function register() {
        $this->load->helper(array('form', 'url'));

        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $password = $this->input->post('password1');


        if ($fname != "" && $lname != "") {


            $email = $this->input->post('email');
            $password = $password;
            $key = $email;

            $password = $this->encrypt->encode($password, $key);

            $get_result = $this->Md->check($email, 'email', 'student');

            if (!$get_result) {
                $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                 Email already in use	</strong>									
						</div>');
                redirect('/management/student', 'refresh');
            }


            $file_element_name = 'userfile';



            $config['upload_path'] = 'uploads/';
// $config['upload_path'] = '/uploads/';
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                echo $msg = $this->upload->display_errors('', '');
            } else {

                $data = $this->upload->data();
                $other = $this->input->post('other');
                $gender = $this->input->post('gender');
                $dob = date('Y-m-d', strtotime($this->input->post('dob')));
                $country = $this->input->post('country');
                if ($this->session->userdata('level') == 1) {

                    $country = $this->session->userdata('country');
                }
                $contact = $this->input->post('contact');
                $cohort = $this->input->post('cohort');
                $submitted = date('Y-m-d');
                $file = $data['file_name'];
                $email = $this->input->post('email');

                $student = array('image' => $file, 'fname' => $fname, 'lname' => $lname, 'other' => $other, 'email' => $email, 'gender' => $gender, 'dob' => $dob, 'country' => $country, 'password' => $password, 'contact' => $contact, 'cohort' => $cohort, 'submitted' => date('Y-m-d H:i:s'), 'status' => 'false');
                $file_id = $this->Md->save($student, 'student');
                ;
                $this->session->set_flashdata('msg', '<div class="alert alert-success">
                                                   
                                                <strong>
                                                 information saved</strong>									
						</div>');

                redirect('/management/student', 'refresh');
            }
        }
    }

    public function info() {

        $this->load->view('info-page', $data);
    }

    public function help() {

        $this->load->view('help-page', $data);
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

    public function project() {
        $this->load->view('project');
    }

}
