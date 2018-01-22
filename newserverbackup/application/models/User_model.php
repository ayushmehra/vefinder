<?php

class User_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->hasher = new PasswordHash_helper(8, TRUE);
    }

    function GetUserInfo($user_id) {
        $this->db->select('`vefinder_user`.`user_id`,`vefinder_user`.`username`,`vefinder_user`.`first_name`,`vefinder_user`.`last_name`,`vefinder_user`.`profile_image`,
		`vefinder_user`.`mobile`,`vefinder_user`.`email`,`vefinder_user`.`birth_date`,`vefinder_user`.`gender`,`vefinder_user`.`mobile_verified`,`vefinder_user`.`email_verified`,
		`vefinder_user`.`user_info`,`vefinder_user`.`occupations`,`vefinder_user`.`maritalStatus`,`vefinder_user`.`device_token`,`vefinder_user`.`isdevice`,
		`vefinder_user`.`location`,`vefinder_user`.`user_type_id`,`vefinder_user`.`company_number`,`vefinder_user`.`current_lat`,
		`vefinder_user`.`current_long`,`vefinder_user`.`status`,`vefinder_user`.cover_image,vefinder_user.user_web,vefinder_user.cat_data');
        $this->db->from('vefinder_user');
        $this->db->where('vefinder_user.user_id', $user_id);
        $query = $this->db->get();
        $count = $query->num_rows();
        if ($count > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }

    function GetToUserInfo($to_id) {
        $this->db->select('`vefinder_user`.`user_id`,`vefinder_user`.`username`,`vefinder_user`.`first_name`,`vefinder_user`.`last_name`,`vefinder_user`.`profile_image`,`vefinder_user`.`cover_image`,
		`vefinder_user`.`mobile`,`vefinder_user`.`email`,`vefinder_user`.`birth_date`,`vefinder_user`.`gender`,`vefinder_user`.`mobile_verified`,`vefinder_user`.`email_verified`,
		`vefinder_user`.`user_info`,`vefinder_user`.`occupations`,`vefinder_user`.`maritalStatus`,`vefinder_user`.`device_token`,`vefinder_user`.`isdevice`,
		`vefinder_user`.`location`,`vefinder_user`.`user_type_id`,`vefinder_user`.`company_number`,`vefinder_user`.`current_lat`,
		`vefinder_user`.`current_long`,`vefinder_user`.`status`,`vefinder_user`.cover_image,vefinder_user.user_web,vefinder_user.cat_data');
        $this->db->from('vefinder_user');
        $this->db->where('vefinder_user.user_id', $to_id);
        $query = $this->db->get();
        $count = $query->num_rows();
        if ($count > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }

    function GetAllUserInfo() {
        $this->db->select('`vefinder_user`.`user_id`,`vefinder_user`.`username`,`vefinder_user`.`first_name`,`vefinder_user`.`last_name`,`vefinder_user`.`profile_image`,
		`vefinder_user`.`mobile`,`vefinder_user`.`email`,`vefinder_user`.`birth_date`,`vefinder_user`.`gender`,`vefinder_user`.`mobile_verified`,`vefinder_user`.`email_verified`,
		`vefinder_user`.`user_info`,`vefinder_user`.`occupations`,`vefinder_user`.`maritalStatus`,`vefinder_user`.`device_token`,`vefinder_user`.`isdevice`,
		`vefinder_user`.`location`,`vefinder_user`.`user_type_id`,`vefinder_user`.`company_number`,`vefinder_user`.`current_lat`,
		`vefinder_user`.`current_long`,`vefinder_user`.`status`,`vefinder_user`.cover_image,vefinder_user.user_web,vefinder_user.cat_data');
        $this->db->from('vefinder_user');
        $query = $this->db->get();
        $count = $query->num_rows();
        if ($count > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function GetAllUserInfoChat() {

//		ini_set("display_errors","On");
//		error_reporting(E_ALL);
//		
        $user_id = $this->session->userdata('user_id');
        $this->db->select('`vefinder_user`.`user_id`,`vefinder_user`.`username`,`vefinder_user`.`first_name`,`vefinder_user`.`last_name`,`vefinder_user`.`profile_image`,
		`vefinder_user`.`mobile`,`vefinder_user`.`email`,`vefinder_user`.`birth_date`,`vefinder_user`.`gender`,`vefinder_user`.`mobile_verified`,`vefinder_user`.`email_verified`,
		`vefinder_user`.`user_info`,`vefinder_user`.`occupations`,`vefinder_user`.`maritalStatus`,`vefinder_user`.`device_token`,`vefinder_user`.`isdevice`,
		`vefinder_user`.`location`,`vefinder_user`.`user_type_id`,`vefinder_user`.`company_number`,`vefinder_user`.`current_lat`,
		`vefinder_user`.`current_long`,`vefinder_user`.`status`,`vefinder_user`.cover_image,vefinder_user.user_web,vefinder_user.cat_data');
        $this->db->from('vefinder_user');
        $this->db->where('vefinder_user.user_id !=', $user_id);
        if (@$_GET['keyword'] != '') {
            $this->db->like('vefinder_user.username', $_GET['keyword'], 'both');
        }
		$query = $this->db->order_by("(select timestamp from tbl_messages where (from_id=`vefinder_user`.`user_id` and to_id='$user_id') or (from_id='$user_id' and to_id=`vefinder_user`.`user_id`) order by timestamp desc limit 1)","desc");
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $count = $query->num_rows();
        if ($count > 0) {
            $result = $query->result();
            //echo "<pre>";print_r($result);die;
            foreach ($result as $key => $value) {
                //echo "<pre>";print_r($value);die;
                $userListId = $value->user_id;
                $query1 = $this->db->query("select * from tbl_messages where is_read='0' and to_id='$userListId'");
                $result[$key]->unreadCount = $query1->num_rows();

                $query2 = $this->db->query("select * from tbl_messages where (from_id='$userListId' and to_id='$user_id') or (from_id='$user_id' and to_id='$userListId') order by timestamp desc limit 1");
                //echo $this->db->last_query(); die;
                $result2 = $query2->row_array();
                $result[$key]->last_message = $result2['message'];
                $result[$key]->last_message_time = $result2['timestamp'];
            }
            return $result;
        } else {
            return 0;
        }
    }

    function GetAddress() {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('vefinder_user_address.*');
        $this->db->from('vefinder_user_address');
        $this->db->where('vefinder_user_address.user_id', $user_id);
        $this->db->where('vefinder_user_address.status', 1);
        $query = $this->db->get();
        $count = $query->num_rows();
        if ($count > 0) {
            return $query->row();
        }
    }

    function GetShippingAddressforOrder($address_id, $user_id) {
        $this->db->select('vefinder_user_address.*');
        $this->db->from('vefinder_user_address');
        $this->db->where('vefinder_user_address.user_id', $user_id);
        $this->db->where('vefinder_user_address.user_address_id', $address_id);
        $query = $this->db->get();
        $count = $query->num_rows();
        if ($count > 0) {
            return $query->row();
        }
    }

    function InsertAddress($db_array) {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('vefinder_user_address.*');
        $this->db->from('vefinder_user_address');
        $this->db->where('vefinder_user_address.user_id', $user_id);
        $this->db->where('vefinder_user_address.status', 1);
        $query = $this->db->get();
        $count = $query->num_rows();
        if ($count > 0) {
            $add_data = $query->row();
            $data = array('updated_date' => date("Y-m-d H:i:s"),
                'status' => 0
            );
            $this->db->where('user_id', $user_id);
            $this->db->where('status', 1);
            $this->db->where('user_address_id', $add_data->user_address_id);
            $this->db->update('vefinder_user_address', $data);
            if ($this->db->affected_Rows()) {
                $this->db->insert('vefinder_user_address', $db_array);
                $max_last_id = $this->db->insert_id();
                if ($max_last_id <> '') {
                    return true;
                }
            }
        } else {
            $this->db->insert('vefinder_user_address', $db_array);
            $max_last_id = $this->db->insert_id();
            if ($max_last_id <> '') {
                return true;
            }
        }
    }

    function SetProfileComment($user_id, $comment_profile_id, $comment_text) {
        $db_array = array('user_id' => $comment_profile_id,
            'commentBy' => $user_id,
            'commentText' => $comment_text,
            'commentDate' => date("Y-m-d H:i:s"),
            'status' => 1
        );
        $this->db->insert('vefinder_profile_comments', $db_array);
        $last_id = $this->db->insert_id();
        if ($last_id <> '') {
            $user_data = $this->User_model->GetUserInfo($user_id);
            $html = '<div class="col-sm-12 follower-item">
                                    <div class="col-sm-1">
                                        <span class="follower-name-icon">
                                            ' . strtoupper(substr($user_data->first_name, 0, 1) . substr($user_data->last_name, 0, 1)) . '
                                        </span>
                                    </div>
                                    <div class="col-sm-11" align="left">
                                        <span class="follower-name">
                                            @' . $user_data->first_name . ' ' . $user_data->last_name . '
                                            <br>
                                            <span class="user-comment">
                                                ' . $comment_text . '
                                            </span>
                                        </span>
                                    </div>
                                </div>';
            $count = _GetCountForProfile('Comments', $comment_profile_id);
            $count = ($count == 0) ? '' : $count;
            $text = ($count > 1) ? 'Comments' : 'Comment';
            $data['msg'] = "You Commented On This User Profile";
            $data['count'] = $count;
            $data['profile_comment_count'] = '<span><img src="' . base_url() . 'assets/images/icons/comment-icon.png" /></span>&nbsp;' . $count . ' ' . $text;
            $data['html'] = $html;
        } else {
            $data['msg'] = '';
        }
        return $data;
    }

    function GetCommentList($user_id) {
        $comment_date = array();
        $this->db->select('vefinder_profile_comments.*');
        $this->db->from('vefinder_profile_comments');
        $this->db->where('vefinder_profile_comments.user_id', $user_id);
        $this->db->where('vefinder_profile_comments.status', 1);
        $query = $this->db->get();
        $count = $query->num_rows();
        if ($count > 0) {
            $i = 0;
            $data = $query->result();
            $comment_date[$i] = new stdClass;
            foreach ($data as $comment) {
                $user_data = $this->User_model->GetUserInfo($comment->commentBy);
                @$comment_date[$i]->profilecomment_id = $comment->profilecomment_id;
                @$comment_date[$i]->commentText = $comment->commentText;
                @$comment_date[$i]->comment_by_id = $comment->commentBy;
                @$comment_date[$i]->username = $user_data->username;
                @$comment_date[$i]->first_name = $user_data->first_name;
                @$comment_date[$i]->last_name = $user_data->last_name;
                @$comment_date[$i]->letter = strtoupper(substr($user_data->first_name, 0, 1) . substr($user_data->last_name, 0, 1));
                $i++;
            }
        }
        return $comment_date;
    }

    function GetRoomId($from_id, $to_id) {

        $query = $this->db->query("select * from tbl_rooms where (from_id='$from_id' and to_id='$to_id') or (from_id='$to_id' and to_id='$from_id')");
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['id'];
        } else {
            $data['from_id'] = $from_id;
            $data['to_id'] = $to_id;
            $this->db->set($data)->insert('tbl_rooms');
            return $this->db->insert_id();
        }
    }

    function getGroupInfo($groupId) {
        $row = array();
        if ($groupId > 0) {

            $query = $this->db->where('id', $groupId)->get('tbl_groups');
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $query2 = $this->db->select()
                        ->from('tbl_group_members as gm')
                        ->join('vefinder_user as vu', 'vu.user_id=gm.member_id', 'left')
                        ->where('gm.group_id', $row['id'])
                        ->get();
                if ($query2->num_rows() > 0) {
                    $row['members'] = $query2->result_array();
                } else {
                    $row['members'] = array();
                }
            }
        }
        return $row;
    }
	function getTopicInfo($groupId) {
        

           
                
                $query = $this->db->select()
                        ->from('tbl_groups as gm')
                        ->join('vefinder_user as vu', 'vu.user_id=gm.group_owner', 'left')
                        ->where('gm.id', $groupId)
                        ->get();
            //echo $this->db->last_query();die;
        $count = $query->num_rows();
        if ($count > 0) {
            return $query->row();
        } else {
            return 0;
        }
        }
       
    function getGroupList() {
        $row = array();
        $user_id = $this->session->userdata('user_id');
        $getMyGroups = $this->db->query("select GROUP_CONCAT(DISTINCT(group_id)) as group_id from tbl_group_members where member_id='$user_id'")->row_array();
        $groups = array();
        if ($getMyGroups['group_id'] != '') {
            $groups = explode(",", $getMyGroups['group_id']);
        }

        if (count($groups) > 0) {
            $query = $this->db
                    ->select('tg.*,tr.id as room_id')
                    ->where_in('group_id', $groups)
                    ->where('`status`','1')
                    ->join('tbl_rooms as tr', 'tr.group_id=tg.id', 'left')
                    ->get('tbl_groups as tg');
            if ($query->num_rows() > 0) {
                $row = $query->result_array();
            }
        }
        return $row;
    }

    public function getGroupTopicList() {

        $row = array();
        $query = $this->db->select('tg.*,tr.id as room_id')
                ->where('`topic`','1')
                ->where('`status`','1');
        if($_GET['keyword']){
            $query=  $this->db->like('group_name',$_GET['keyword'],'both');
        }
        $query = $this->db->join('tbl_rooms as tr', 'tr.group_id=tg.id', 'left')
                ->order_by('created_at', 'desc')
                ->get('tbl_groups as tg');
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
        }
        return $row;
    }

}

?>