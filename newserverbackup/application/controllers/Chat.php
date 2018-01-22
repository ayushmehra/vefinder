<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        ini_set("display_errors","On");
//        error_reporting(E_ALL);
        if ($this->session->userdata('user_id') == '') {
            redirect(base_url());
        }
    }

    public function chatPage() {
        $user_id = $this->session->userdata('user_id');
        $to_id = $_GET['user_id'];
        if ($to_id != '') {
            $this->db->query("update tbl_messages set is_read='1' where to_id='$to_id'");
            //echo $this->db->last_query();die;
        }
        $data['user_info'] = $this->User_model->GetUserInfo($user_id);
        $data['to_info'] = $this->User_model->GetToUserInfo($to_id);
        $data['all_user_info'] = $this->User_model->GetAllUserInfoChat();
        $data['chat_user_info'] = $this->User_model->GetUserInfo(@$_GET['user_id']);
        $data['room_id'] = $this->User_model->GetRoomId(@$_GET['user_id'],$user_id);
		 $data['topic_info_all'] = $this->User_model->getGroupTopicList();
        //echo "<pre>";print_r($data);die;
        $this->load->view('Chat_Page_HTML', $data);
    }

    public function uploadAttachment() {

        $files = $_FILES;
        // print_r($_POST);
        //print_r($_FILES['file']);
        //die;
        $folderName = 'attachment';
        $pathToUpload = './assets/' . $folderName;
        if (!is_dir($pathToUpload)) {
            mkdir($pathToUpload, 0777, TRUE);
        }
        $config['upload_path'] = $pathToUpload;
        // Location to save the image
        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = true;
        $config['maintain_ratio'] = TRUE;
        $config['file_name'] = time() . $_FILES['image']['name'] . '.png';
        $this->load->library('upload', $config);
        $this->upload->do_upload("file");
        //echo $this->upload->display_errors();
        $image = base_url() . 'assets/attachment/' . $config['file_name'];
        echo $image;
        exit;
    }
    
    public function createGroup() {
        $user_id = $this->session->userdata('user_id');
        if($this->input->post('create')=='Create'){
             $files = $_FILES;
//        print_r($_POST);
//        print_r($_FILES['userfile']);
        //die;
        $folderName = 'attachment';
        $pathToUpload = './assets/' . $folderName;
        if (!is_dir($pathToUpload)) {
            mkdir($pathToUpload, 0777, TRUE);
        }
        $config['upload_path'] = $pathToUpload;
        // Location to save the image
        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = true;
        $config['maintain_ratio'] = TRUE;
        $config['file_name'] = time() . ".png";
        $this->load->library('upload', $config);
        $this->upload->do_upload("userfile");
        //echo $this->upload->display_errors()."<br>";//die;
        //echo 
        $image = base_url() . 'assets/attachment/' . $config['file_name'];//die;
            $group['group_image'] = $image;
            $group['group_owner']=$user_id;
            $group['group_name']=  $this->input->post('group_name');
			$group['group_info']=  $this->input->post('group_info');
			//$group['group_image']=  $this->input->post('group_image');
            $group['topic']=  '1';
            $this->db->set($group)->insert('tbl_groups');
            $group_id=  $this->db->insert_id();
            
            
            if($_POST['isTopic']!='1'){
            $owner['group_id']=$group_id;
            $owner['member_id']=$user_id;
            $this->db->set($owner)->insert('tbl_group_members');
            
            $users=$this->input->post('users');
            foreach ($users as $value){
                $members=array();
                $members['group_id']=$group_id;
                $members['member_id']=$value;
                $this->db->set($members)->insert('tbl_group_members');
            }            
            }
            
            $room['from_id']=$this->session->userdata('user_id');
            $room['group_id']=$group_id;
            $this->db->set($room)->insert('tbl_rooms');
            $roomId=  $this->db->insert_id();
            
            redirect(base_url()."Chat/groupChat?group_id=".$group_id."&room_id=".$roomId."&topic=".$group_id);
            
            
        }
        
        $data['all_user_info'] = $this->User_model->GetAllUserInfoChat();
        //echo "<pre>";print_r($data);die;
        $this->load->view('CreateGroup_HTML', $data);
    }
    
    function groupChat(){
        $user_id = $this->session->userdata('user_id');
        $data['group_info'] = $this->User_model->getGroupInfo($_GET['group_id']);
		 $data['topic_info'] = $this->User_model->getTopicInfo($_GET['group_id']);
        $data['group_info_all'] = $this->User_model->getGroupList();
        $data['topic_info_all'] = $this->User_model->getGroupTopicList();
		 $data['all_user_info'] = $this->User_model->GetAllUserInfoChat();
        $data['room_id']=$_GET['room_id'];
        $data['user_info'] = $this->User_model->GetUserInfo($user_id);
        //echo "<pre>";print_r($data);die;
        $this->load->view('GroupChat_HTML', $data);
    }
    
    function groupList(){
        $user_id = $this->session->userdata('user_id');
        $data['group_info'] = $this->User_model->getGroupList();
        $data['user_info'] = $this->User_model->GetUserInfo($user_id);
        $data['room_id']=$_GET['room_id'];
        //echo "<pre>";print_r($data);die;
        $this->load->view('GroupList_HTML', $data);
    }

}

?>