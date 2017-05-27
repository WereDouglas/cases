<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

    function __construct() {

        parent::__construct();
        //error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set('Africa/Kampala');
        $this->load->library('excel');
    }

    public function index() {

        $this->load->helper(array('form', 'url'));
        $query = $this->Md->query("SELECT * FROM template where orgID = '" . $this->session->userdata('orgID') . "' OR orgID='' ");

        if ($query) {
            $data['docs'] = $query;
        } else {
            $data['docs'] = array();
        }
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

        $this->load->view('view-templates', $data);
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
                    $this->Md->update_dynamic($user_id, 'id', 'template', $task);
                    echo "Updated";
                } else {
                    echo "Invalid Requests";
                }
            }
        } else {
            echo "Invalid Requests";
        }
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
        $result = $this->Md->query("SELECT * FROM template WHERE orgID ='" . $orgid . "'");

        if ($result) {

            echo json_encode($result);
        }
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

    public function name() {
        $this->load->helper(array('form', 'url'));
        $name = trim($this->input->post('name'));
        if (strlen($name) < 3) {
            echo '<span style="color:#f00"> empty field </span>';
            return;
        }
        $get_result = $this->Md->returns($name, 'name', 'template');
        //href= "index.php/patient/add_chronic/'.$chronic.'"
        if (!$get_result) {
            echo '<span style="color:#008000"> Available</span>';
        } else {
            echo '<span style="color:#f00"> ! Already submittted </span> <br>';
        }
    }

    public function countries() {

        echo '[ 
{"name": "Afghanistan", "code": "AF"}, {"name": "land Islands", "code": "AX"}, {"name": "Albania", "code": "AL"},{"name": "Algeria", "code": "DZ"}, 
{"name": "American Samoa", "code": "AS"}, {"name": "AndorrA", "code": "AD"}, {"name": "Angola", "code": "AO"}, {"name": "Anguilla", "code": "AI"}, 
{"name": "Antarctica", "code": "AQ"}, {"name": "Antigua and Barbuda", "code": "AG"}, {"name": "Argentina", "code": "AR"}, 
{"name": "Armenia", "code": "AM"}, {"name": "Aruba", "code": "AW"}, {"name": "Australia", "code": "AU"}, {"name": "Austria", "code": "AT"}, {"name": "Azerbaijan", "code": "AZ"}, 
{"name": "Bahamas", "code": "BS"}, {"name": "Bahrain", "code": "BH"}, {"name": "Bangladesh", "code": "BD"}, {"name": "Barbados", "code": "BB"}, 
{"name": "Belarus", "code": "BY"}, {"name": "Belgium", "code": "BE"}, {"name": "Belize", "code": "BZ"}, {"name": "Benin", "code": "BJ"}, 
{"name": "Bermuda", "code": "BM"}, {"name": "Bhutan", "code": "BT"}, {"name": "Bolivia", "code": "BO"}, {"name": "Bosnia and Herzegovina", "code": "BA"}, 
{"name": "Botswana", "code": "BW"}, {"name": "Bouvet Island", "code": "BV"}, {"name": "Brazil", "code": "BR"}, {"name": "British Indian Ocean Territory", "code": "IO"}, 
{"name": "Brunei Darussalam", "code": "BN"}, {"name": "Bulgaria", "code": "BG"}, {"name": "Burkina Faso", "code": "BF"}, 
{"name": "Burundi", "code": "BI"}, {"name": "Cambodia", "code": "KH"}, {"name": "Cameroon", "code": "CM"}, {"name": "Canada", "code": "CA"}, 
{"name": "Cape Verde", "code": "CV"}, {"name": "Cayman Islands", "code": "KY"}, {"name": "Central African Republic", "code": "CF"}, 
{"name": "Chad", "code": "TD"}, {"name": "Chile", "code": "CL"}, {"name": "China", "code": "CN"}, {"name": "Christmas Island", "code": "CX"}, 
{"name": "Cocos (Keeling) Islands", "code": "CC"}, {"name": "Colombia", "code": "CO"}, {"name": "Comoros", "code": "KM"},{"name": "Congo", "code": "CG"}, 
{"name": "Congo, The Democratic Republic of the", "code": "CD"}, {"name": "Cook Islands", "code": "CK"}, {"name": "Costa Rica", "code": "CR"}, 
{"name": "Cote D\"Ivoire", "code": "CI"}, {"name": "Croatia", "code": "HR"}, {"name": "Cuba", "code": "CU"}, {"name": "Cyprus", "code": "CY"}, 
{"name": "Czech Republic", "code": "CZ"}, {"name": "Denmark", "code": "DK"}, {"name": "Djibouti", "code": "DJ"},{"name": "Dominica", "code": "DM"}, 
{"name": "Dominican Republic", "code": "DO"}, {"name": "Ecuador", "code": "EC"}, {"name": "Egypt", "code": "EG"}, {"name": "El Salvador", "code": "SV"}, 
{"name": "Equatorial Guinea", "code": "GQ"}, 
{"name": "Eritrea", "code": "ER"}, 
{"name": "Estonia", "code": "EE"}, 
{"name": "Ethiopia", "code": "ET"}, 
{"name": "Falkland Islands (Malvinas)", "code": "FK"}, 
{"name": "Faroe Islands", "code": "FO"}, 
{"name": "Fiji", "code": "FJ"}, 
{"name": "Finland", "code": "FI"}, 
{"name": "France", "code": "FR"}, 
{"name": "French Guiana", "code": "GF"}, 
{"name": "French Polynesia", "code": "PF"}, 
{"name": "French Southern Territories", "code": "TF"}, 
{"name": "Gabon", "code": "GA"}, 
{"name": "Gambia", "code": "GM"}, 
{"name": "Georgia", "code": "GE"}, 
{"name": "Germany", "code": "DE"}, 
{"name": "Ghana", "code": "GH"}, 
{"name": "Gibraltar", "code": "GI"}, 
{"name": "Greece", "code": "GR"}, 
{"name": "Greenland", "code": "GL"}, 
{"name": "Grenada", "code": "GD"}, 
{"name": "Guadeloupe", "code": "GP"}, 
{"name": "Guam", "code": "GU"}, 
{"name": "Guatemala", "code": "GT"}, 
{"name": "Guernsey", "code": "GG"}, 
{"name": "Guinea", "code": "GN"}, 
{"name": "Guinea-Bissau", "code": "GW"}, 
{"name": "Guyana", "code": "GY"}, 
{"name": "Haiti", "code": "HT"}, 
{"name": "Heard Island and Mcdonald Islands", "code": "HM"}, 
{"name": "Holy See (Vatican City State)", "code": "VA"}, 
{"name": "Honduras", "code": "HN"}, 
{"name": "Hong Kong", "code": "HK"}, 
{"name": "Hungary", "code": "HU"}, 
{"name": "Iceland", "code": "IS"}, 
{"name": "India", "code": "IN"}, 
{"name": "Indonesia", "code": "ID"}, 
{"name": "Iran, Islamic Republic Of", "code": "IR"}, 
{"name": "Iraq", "code": "IQ"}, 
{"name": "Ireland", "code": "IE"}, 
{"name": "Isle of Man", "code": "IM"}, 
{"name": "Israel", "code": "IL"}, 
{"name": "Italy", "code": "IT"}, 
{"name": "Jamaica", "code": "JM"}, 
{"name": "Japan", "code": "JP"}, 
{"name": "Jersey", "code": "JE"}, 
{"name": "Jordan", "code": "JO"}, 
{"name": "Kazakhstan", "code": "KZ"}, 
{"name": "Kenya", "code": "KE"}, 
{"name": "Kiribati", "code": "KI"}, 
{"name": "Korea, Democratic People\"S Republic of", "code": "KP"}, 
{"name": "Korea, Republic of", "code": "KR"}, 
{"name": "Kuwait", "code": "KW"}, 
{"name": "Kyrgyzstan", "code": "KG"}, 
{"name": "Lao People\"S Democratic Republic", "code": "LA"}, 
{"name": "Latvia", "code": "LV"}, 
{"name": "Lebanon", "code": "LB"}, 
{"name": "Lesotho", "code": "LS"}, 
{"name": "Liberia", "code": "LR"}, 
{"name": "Libyan Arab Jamahiriya", "code": "LY"}, 
{"name": "Liechtenstein", "code": "LI"}, 
{"name": "Lithuania", "code": "LT"}, 
{"name": "Luxembourg", "code": "LU"}, 
{"name": "Macao", "code": "MO"}, 
{"name": "Macedonia, The Former Yugoslav Republic of", "code": "MK"}, 
{"name": "Madagascar", "code": "MG"}, 
{"name": "Malawi", "code": "MW"}, 
{"name": "Malaysia", "code": "MY"}, 
{"name": "Maldives", "code": "MV"}, 
{"name": "Mali", "code": "ML"}, 
{"name": "Malta", "code": "MT"}, 
{"name": "Marshall Islands", "code": "MH"}, 
{"name": "Martinique", "code": "MQ"}, 
{"name": "Mauritania", "code": "MR"}, 
{"name": "Mauritius", "code": "MU"}, 
{"name": "Mayotte", "code": "YT"}, 
{"name": "Mexico", "code": "MX"}, 
{"name": "Micronesia, Federated States of", "code": "FM"}, 
{"name": "Moldova, Republic of", "code": "MD"}, 
{"name": "Monaco", "code": "MC"}, 
{"name": "Mongolia", "code": "MN"}, 
{"name": "Montenegro", "code": "ME"},
{"name": "Montserrat", "code": "MS"},
{"name": "Morocco", "code": "MA"}, 
{"name": "Mozambique", "code": "MZ"}, 
{"name": "Myanmar", "code": "MM"}, 
{"name": "Namibia", "code": "NA"}, 
{"name": "Nauru", "code": "NR"}, 
{"name": "Nepal", "code": "NP"}, 
{"name": "Netherlands", "code": "NL"}, 
{"name": "Netherlands Antilles", "code": "AN"}, 
{"name": "New Caledonia", "code": "NC"}, 
{"name": "New Zealand", "code": "NZ"}, 
{"name": "Nicaragua", "code": "NI"}, 
{"name": "Niger", "code": "NE"}, 
{"name": "Nigeria", "code": "NG"}, 
{"name": "Niue", "code": "NU"}, 
{"name": "Norfolk Island", "code": "NF"}, 
{"name": "Northern Mariana Islands", "code": "MP"}, 
{"name": "Norway", "code": "NO"}, 
{"name": "Oman", "code": "OM"}, 
{"name": "Pakistan", "code": "PK"}, 
{"name": "Palau", "code": "PW"}, 
{"name": "Palestinian Territory, Occupied", "code": "PS"}, 
{"name": "Panama", "code": "PA"}, 
{"name": "Papua New Guinea", "code": "PG"}, 
{"name": "Paraguay", "code": "PY"}, 
{"name": "Peru", "code": "PE"}, 
{"name": "Philippines", "code": "PH"}, 
{"name": "Pitcairn", "code": "PN"}, 
{"name": "Poland", "code": "PL"}, 
{"name": "Portugal", "code": "PT"}, 
{"name": "Puerto Rico", "code": "PR"}, 
{"name": "Qatar", "code": "QA"}, 
{"name": "Reunion", "code": "RE"}, 
{"name": "Romania", "code": "RO"}, 
{"name": "Russian Federation", "code": "RU"}, 
{"name": "RWANDA", "code": "RW"}, 
{"name": "Saint Helena", "code": "SH"}, 
{"name": "Saint Kitts and Nevis", "code": "KN"}, 
{"name": "Saint Lucia", "code": "LC"}, 
{"name": "Saint Pierre and Miquelon", "code": "PM"}, 
{"name": "Saint Vincent and the Grenadines", "code": "VC"}, 
{"name": "Samoa", "code": "WS"}, 
{"name": "San Marino", "code": "SM"}, 
{"name": "Sao Tome and Principe", "code": "ST"}, 
{"name": "Saudi Arabia", "code": "SA"}, 
{"name": "Senegal", "code": "SN"}, 
{"name": "Serbia", "code": "RS"}, 
{"name": "Seychelles", "code": "SC"}, 
{"name": "Sierra Leone", "code": "SL"}, 
{"name": "Singapore", "code": "SG"}, 
{"name": "Slovakia", "code": "SK"}, 
{"name": "Slovenia", "code": "SI"}, 
{"name": "Solomon Islands", "code": "SB"}, 
{"name": "Somalia", "code": "SO"}, 
{"name": "South Africa", "code": "ZA"}, 
{"name": "South Georgia and the South Sandwich Islands", "code": "GS"}, 
{"name": "Spain", "code": "ES"}, 
{"name": "Sri Lanka", "code": "LK"}, 
{"name": "Sudan", "code": "SD"}, 
{"name": "Suriname", "code": "SR"}, 
{"name": "Svalbard and Jan Mayen", "code": "SJ"}, 
{"name": "Swaziland", "code": "SZ"}, 
{"name": "Sweden", "code": "SE"}, 
{"name": "Switzerland", "code": "CH"}, 
{"name": "Syrian Arab Republic", "code": "SY"}, 
{"name": "Taiwan, Province of China", "code": "TW"}, 
{"name": "Tajikistan", "code": "TJ"}, 
{"name": "Tanzania, United Republic of", "code": "TZ"}, 
{"name": "Thailand", "code": "TH"}, 
{"name": "Timor-Leste", "code": "TL"}, 
{"name": "Togo", "code": "TG"}, 
{"name": "Tokelau", "code": "TK"}, 
{"name": "Tonga", "code": "TO"}, 
{"name": "Trinidad and Tobago", "code": "TT"}, 
{"name": "Tunisia", "code": "TN"}, 
{"name": "Turkey", "code": "TR"}, 
{"name": "Turkmenistan", "code": "TM"}, 
{"name": "Turks and Caicos Islands", "code": "TC"}, 
{"name": "Tuvalu", "code": "TV"}, 
{"name": "Uganda", "code": "UG"}, 
{"name": "Ukraine", "code": "UA"}, 
{"name": "United Arab Emirates", "code": "AE"}, 
{"name": "United Kingdom", "code": "GB"}, 
{"name": "United States", "code": "US"}, 
{"name": "United States Minor Outlying Islands", "code": "UM"}, 
{"name": "Uruguay", "code": "UY"}, 
{"name": "Uzbekistan", "code": "UZ"}, 
{"name": "Vanuatu", "code": "VU"}, 
{"name": "Venezuela", "code": "VE"}, 
{"name": "Viet Nam", "code": "VN"}, 
{"name": "Virgin Islands, British", "code": "VG"}, 
{"name": "Virgin Islands, U.S.", "code": "VI"}, 
{"name": "Wallis and Futuna", "code": "WF"}, 
{"name": "Western Sahara", "code": "EH"}, 
{"name": "Yemen", "code": "YE"}, 
{"name": "Zambia", "code": "ZM"}, 
{"name": "Zimbabwe", "code": "ZW"} 
]';
    }

    public function templates() {

        $query = $this->Md->query("SELECT * FROM document WHERE  orgID='" . $this->session->userdata('orgID') . "'");
        echo json_encode($query);
    }

    public function delete() {

        $this->load->helper(array('form', 'url'));
        $ID = $this->uri->segment(3);

        $fileUrl = $this->Md->query_cell("SELECT file FROM template WHERE id ='" . $ID . "'", 'file');

        $this->Md->file_remove($fileUrl, 'documents');
        $query = $this->Md->cascade($ID, 'template', 'id');
        //file_remove($file, $folder)
        redirect('/template/', 'refresh');
    }
    public function create() {

        $this->load->helper(array('form', 'url'));
        $start = date('Y-m-d', strtotime($this->input->post('start')));
        $end = date('Y-m-d', strtotime($this->input->post('end')));

        $result_org = $this->Md->check($this->input->post('name'), 'name', 'template');
        if (!$result_org) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                 Template name already registered</strong>									
						</div>');
            redirect('/template', 'refresh');
            return;
        }

        if ($this->input->post('name') != "") {
            ///organisation image uploads
            $file_element_name = 'userfile';
            $new_name = $this->input->post('name');
            $config['file_name'] = $new_name;
            $config['upload_path'] = 'documents/';
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = FALSE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
                $this->session->set_flashdata('msg', '<div class="alert alert-error"> <strong>' . $msg . '</strong></div>');
            }
            if($this->session->userdata('level')=='Administrator'){
                $orgID= "";                
            }
            else{
               $orgID= $this->session->userdata('orgID');
            }
            $data = $this->upload->data();

            $userfile = $data['file_name'];
            $size = $data['file_size'];
            $doc = array('orgID' => $orgID, 'name' => $this->input->post('name'), 'country' => $this->input->post('country'), 'file' => $userfile, 'created' => date('Y-m-d'), 'period' => $start . ' to ' . $end, 'description' => $this->input->post('description'),'title' => $this->input->post('title'), 'sync' => 'f', 'size' => $size);
            $this->Md->save($doc, 'template');
            $this->session->set_flashdata('msg', '<div class="alert alert-success">  <strong>Information saved</strong></div>');
            redirect('/template/', 'refresh');
        }
    }

}
