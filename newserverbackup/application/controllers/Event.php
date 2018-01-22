<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function createEvent() {
        if ($this->input->post('submitForm') == 'eventForm') {

            $this->load->library('upload');
            $dataInfo = array();
            $files = $_FILES;
            //echo "<pre>";print_r($_FILES);
            //print_r($_POST);
            //die;
            $cpt = count($_FILES['userfile']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['userfile']['name'] = date("YMDh:i:s") . "_" . $i . "_" . $files['userfile']['name'][$i];
                $imageName[] = $_FILES['userfile']['name'];
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload();
                $dataInfo[] = $this->upload->data();
                //echo "<pre>";print_r($dataInfo);
            }
            //die("Complete");
            //echo "<pre>";print_r($imageName);die;
            $i = 1;
            foreach ($imageName as $key => $value) {
                $postData["image$i"] = $value;
                $i++;
            }
            $postData['name'] = $_POST['event_name'];
            $postData['location'] = $_POST['event_location'];
            $postData['description'] = $_POST['event_description'];
            $postData['tags'] = $_POST['event_tags'];
            $postData['date'] = $_POST['event_date'];
            $postData['user_id'] = $this->session->userdata('user_id');
            //echo "<pre>";
            //print_r($postData);
            $this->db->set($postData)->insert('vefinder_event');
            //echo $this->db->last_query();die;
            redirect('Events');
        }
        $this->load->view('create_event_HTML');
    }

    function eventList() {
        error_reporting(0);
        $data['eventsData'] = $this->Product_model->getEvents($this->session->userdata('user_id'));
        //echo "<pre>";print_r($_SESSION);die;
        $this->load->view('event_list_HTML', $data);
    }
    
    function IndividualEventDetails() {
        error_reporting(0);
        $data['eventsData'] = $this->Product_model->getEvents($this->session->userdata('user_id'));
        $data['comment_data'] = $this->ProductComment_model->GetCommentForEvent();
        //echo "<pre>";print_r($data);die;
        $this->load->view('individual_event_list_HTML', $data);
    }

    private function set_upload_options() {
        //upload an image options
        $config = array();
        $config['upload_path'] = './assets/event/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

    function JoinEvent() {

        $data = array();
        $data['user_id'] = $_SESSION['user_id'];
        $data['event_id'] = $_GET['eventId'];
        $this->db->set($data)->insert('vefinder_join_event');
        $this->load->library('user_agent');
        if ($this->agent->is_referral()) {
            $refer = $this->agent->referrer();
        }
        redirect($this->agent->referrer());
    }

    function inviteForEvent() {
        error_reporting(0);
        $data['eventsData'] = $this->Product_model->getFans($this->session->userdata('user_id'));
        //echo "<pre>";print_r($data);die;
        $this->load->view('Invite_event_HTML', $data);
    }

    function sendInvite() {
        $data['from_id'] = $this->session->userdata('user_id');
        $data['to_id'] = $_GET['toID'];
        $data['type'] = '1';
        $data['message'] = "You have recevied invitation for event";
        $this->db->set($data)->insert('vefinder_notifications');
        redirect('Events');
    }

    public function EventLike() {
        $user_data = $this->session->userdata('user_id');
        $product_id = $_REQUEST['id'];
        if ($user_data == '') {
            $this->session->set_userdata('user_like_list', $product_id);
            print json_encode(array("exists" => "2", "message" => "Please Login First"));
            die();
        } else {
            $msg = $this->Product_model->EventModelLike($product_id, $user_data);
            //print_r($msg);
            if ($msg) {
                print json_encode(array("exists" => "1", "message" => $msg['msg'], "likeText" => $msg['like']));
            } else {
                print json_encode(array("exists" => "2", "message" => "Something Went Worng."));
            }
            die();
        }
    }

    public function Comment()
	{
        
		$user_data		=	$this->session->userdata('user_id');
		$product_data	=	explode('/',$_REQUEST['product_id']);
		$product_id		=	base64_decode($product_data[1]);		 
		$com_id			=	$_REQUEST['com_id'];		 
		$commentText	=	$_REQUEST['comment'];	
                
		if($user_data =='')
		{		
			$this->session->set_userdata('user_like_list',$product_data[1]);	
			print json_encode(array("exists"=>"2" ,"message"=>"Please Login First"));
			die();
		}
		else
		{		
			$msg=$this->ProductComment_model->AddEventComment($product_id,$com_id,$commentText);
			
			if($msg['msg']<>'')
			{        
				print json_encode(array("exists"=>"1","message"=>$msg['msg']));
			}
			else
			{
				print json_encode(array("exists"=>"0" ,"message"=>"Something Went Worng."));          
			}
		  die();
		}
	}

    /*     * ******************* */
}
