<?php

/* * *****************************
 * ****** INSERT MAIL LOG ********
 * ****************************** */

function _insertlog_mail($user_id, $email, $type_of_email, $for = 0) {
    $obj = & get_instance();
    $post_data = array(
        'created_date' => date("Y-m-d H:i:s"),
        'user_id' => $user_id,
        'email' => $email,
        'for' => $for,
        'type_of_email' => $type_of_email
    );
    if ($obj->db->insert('vefinder_email_log', $post_data)) {
        return $obj->db->insert_id();
    }
}

/* * *******************
 * **** SEND MAIL ******
 * ******************** */

function _send_mail($from, $name, $to, $sub, $msg) {
    $obj = & get_instance();
    $obj->email->from($from, $name);
    $obj->email->to($to);
    //$obj->email->cc('another@another-example.com');
    //$obj->email->bcc('them@their-example.com');
    $obj->email->set_mailtype('html');
    $obj->email->subject($sub);
    $obj->email->message($msg);
    if ($obj->email->send()) {
        return true;
    }
}

/* * ***************************************
 * ** Update OTP If Needed ****
 * **************************************** */

function _UpdateOTP($case, $userdata) {
    $obj = & get_instance();
    switch ($case) {
        case'mobile': {
                $date = date("Y-m-d H:i:s");
                $otpmobile = mt_rand(1000, 9999);
                $data = array(
                    'mobileotp' => $otpmobile,
                    'updated_date' => $date
                );
                $obj->db->where('vefinder_user.mobile', $userdata);
                $obj->db->update('vefinder_user', $data);
                $count = $obj->db->affected_rows();
                if ($count == 1) {
                    $DataArray['response'] = "OTP Update";
                    $DataArray['apidata'] = $otpmobile;
                } else {
                    $DataArray['response'] = "Something Went Worng";
                    $DataArray['apidata'] = "";
                }
                break;
            }
        case'email': {
                $date = date("Y-m-d H:i:s");
                $otpemail = mt_rand(1000, 9999);
                $data = array(
                    'emailotp' => $otpemail,
                    'updated_date' => $date
                );
                $obj->db->where('vefinder_user.email', strtolower($userdata));
                $obj->db->update('vefinder_user', $data);
                $count = $obj->db->affected_rows();
                if ($count == 1) {
                    $DataArray['response'] = "OTP Update";
                    $DataArray['apidata'] = $otpemail;
                } else {
                    $DataArray['response'] = "Something Went Worng";
                    $DataArray['apidata'] = "";
                }
                break;
            }
    }
    return $DataArray;
}

/* * ****************************************************
 * ******************************************************
  Function For 	:	Get User Info Email or phone
  Paramters		:	User ID (id('user_id')
  Return			:	success/failure
 * ******************************************************
 * ***************************************************** */

function _GetUserData($user_id) {
    $obj = & get_instance();
    $obj->db->select('`vefinder_user`.`intrest_id`,vefinder_user.username,
		vefinder_user.profile_image,vefinder_user.image_thumb,
		vefinder_user.first_name,vefinder_user.last_name');
    $obj->db->from('vefinder_user');
    $obj->db->where('vefinder_user.user_id', $user_id);
    $query = $obj->db->get();
    $count = $query->num_rows();
    if ($count > 0) {
        return $query->row();
    } else {
        return 0;
    }
}

function _GetUserId($user_name) {
    $obj = & get_instance();
    $obj->db->select('`vefinder_user`.`user_id`');
    $obj->db->from('vefinder_user');
    $obj->db->where('vefinder_user.username', $user_name);
    $obj->db->where('vefinder_user.status', 1);
    $query = $obj->db->get();
    $count = $query->num_rows();
    if ($count > 0) {
        return $query->row()->user_id;
    } else {
        return 0;
    }
}

function _GetUserNameById($user_id) {
    $obj = & get_instance();
    $obj->db->select('`vefinder_user`.`username`');
    $obj->db->from('vefinder_user');
    $obj->db->where('vefinder_user.user_id', $user_id);
    $obj->db->where('vefinder_user.status', 1);
    $query = $obj->db->get();
    $count = $query->num_rows();
    if ($count > 0) {
        return $query->row()->username;
    } else {
        return '';
    }
}

/* * ****************************************************
 * ******************************************************
  Function For 	:	Get Cat Data
  Paramters		:	Cat ID (id('cat_id')
  Return			:	success/failure
 * ******************************************************
 * ***************************************************** */

function _GetCategoryData($cat_id) {
    $obj = & get_instance();
    $obj->db->select('`vefinder_categories`.`cat_name`');
    $obj->db->from('vefinder_categories');
    $obj->db->where('vefinder_categories.cat_id', $cat_id);
    $query = $obj->db->get();
    $count = $query->num_rows();
    if ($count > 0) {
        return $query->row();
    } else {
        return 0;
    }
}

function _GetCategory() {
    $obj = & get_instance();
    $obj->db->select('`vefinder_categories`.`cat_name`,vefinder_categories.cat_id');
    $obj->db->from('vefinder_categories');
    $obj->db->where('vefinder_categories.status', 1);
    $query = $obj->db->get();
    $count = $query->num_rows();
    if ($count > 0) {
        return $query->result();
    } else {
        return 0;
    }
}

function _GetSubCategory($cat_id) {
    $obj = & get_instance();
    $data = '';
    $obj->db->select('`vefinder_sub_categories`.`sub_cat_name`,vefinder_sub_categories.subcat_id');
    $obj->db->from('vefinder_sub_categories');
    $obj->db->where('vefinder_sub_categories.status', 1);
    $obj->db->where('vefinder_sub_categories.cat_id', $cat_id);
    $query = $obj->db->get();
    $count = $query->num_rows();
    if ($count > 0) {
        $data = $query->result();
    }
    return $data;
}

function _GetSliderImage() {
    $obj = & get_instance();
    $obj->db->select('`vefinder_sliders`.*');
    $obj->db->from('vefinder_sliders');
    $obj->db->where('vefinder_sliders.status', 1);
    $query = $obj->db->get();
    $count = $query->num_rows();
    if ($count > 0) {
        return $query->result();
    } else {
        return 0;
    }
}

function _GetUserTag($user_id) {
    $tag = _GetUserData($user_id);
    if ($tag->intrest_id <> '') {
        $tag_data = explode(',', $tag->intrest_id);

        for ($i = 0; $i < count($tag_data); $i++) {
            $data[$i] = _getTagName($tag_data[$i]);
        }
    } else {
        $data = '';
    }

    return $data;
}

function _getTagName($tag_id) {
    $obj = & get_instance();
    $obj->db->select('`vefinder_interests`.`interests_name`,vefinder_interests.interests_id');
    $obj->db->from('vefinder_interests');
    $obj->db->where('vefinder_interests.interests_id', $tag_id);
    $obj->db->where('vefinder_interests.isActive', 1);
    $query = $obj->db->get();
    $count = $query->num_rows();
    if ($count > 0) {
        return $query->row();
    }
}

/* * ****************************************************
 * ******************************************************
  Function For 	:	Get Count For Profile
  Paramters		:	$for, Id
  Return			:	success/failure
 * ******************************************************
 * ***************************************************** */

function _GetCountForProfile($for, $id) {
    $obj = & get_instance();
    switch ($for) {
        case'Followers': {
                $obj->db->select('count(vefinder_follow_list.follow_id) as count');
                $obj->db->from('vefinder_follow_list');
                $obj->db->where('vefinder_follow_list.user_id', $id);
                $obj->db->where('vefinder_follow_list.isApproved', 1);
                $obj->db->where('vefinder_follow_list.status', 1);
                $query = $obj->db->get();
                break;
            }
        case'Follows': {
                $obj->db->select('count(vefinder_follow_list.follow_id) as count');
                $obj->db->from('vefinder_follow_list');
                $obj->db->where('vefinder_follow_list.following_id', $id);
                $obj->db->where('vefinder_follow_list.isApproved', 1);
                $obj->db->where('vefinder_follow_list.status', 1);
                $query = $obj->db->get();
                break;
            }
        case'Comments': {
                $obj->db->select('count(vefinder_profile_comments.profilecomment_id) as count');
                $obj->db->from('vefinder_profile_comments');
                $obj->db->where('vefinder_profile_comments.user_id', $id);
                $obj->db->where('vefinder_profile_comments.status', 1);
                $query = $obj->db->get();
                break;
            }
        case'Likes': {
                $obj->db->select('count(vefinder_profile_likes.profile_like_id) as count');
                $obj->db->from('vefinder_profile_likes');
                $obj->db->where('vefinder_profile_likes.user_id', $id);
                $obj->db->where('vefinder_profile_likes.status', 1);
                $query = $obj->db->get();
                break;
            }
        case'Selling': {
                $obj->db->select('count(vefinder_product.product_id) as count');
                $obj->db->from('vefinder_product');
                $obj->db->where('vefinder_product.user_id', $id);
                $condition = '((vefinder_product.product_type_id=1)or(vefinder_product.product_type_id=2)or(vefinder_product.product_type_id=3))';
                $obj->db->where($condition);
                $obj->db->where('vefinder_product.status', 1);
                $query = $obj->db->get();
                break;
            }
        case'Auction': {
                $obj->db->select('count(vefinder_product.product_id) as count');
                $obj->db->from('vefinder_product');
                $obj->db->where('vefinder_product.user_id', $id);
                $obj->db->where('vefinder_product.user_id', $id);
                $obj->db->where('vefinder_product.product_type_id', 4);
                $obj->db->where('vefinder_product.status', 1);
                $query = $obj->db->get();
                break;
            }
        case'All': {
                $obj->db->select('count(vefinder_product.product_id) as count');
                $obj->db->from('vefinder_product');
                $obj->db->where('vefinder_product.user_id', $id);
                $obj->db->where('vefinder_product.status', 1);
                $query = $obj->db->get();
                break;
            }
        case'Request': {
                $obj->db->select('count(vefinder_product_request.request_id) as count');
                $obj->db->from('vefinder_product_request');
                $obj->db->where('vefinder_product_request.user_id_for', $id);
                $obj->db->where('vefinder_product_request.status', 1);
                $query = $obj->db->get();
                break;
            }
        case'Ads': {
                $obj->db->select('count(vefinder_ads.ad_id) as count');
                $obj->db->from('vefinder_ads');
                $obj->db->where('vefinder_ads.user_id', $id);
                $obj->db->where('vefinder_ads.status', 1);
                $query = $obj->db->get();
                break;
            }
    }

    //echo $obj->db->last_query(); 
    $count = $query->num_rows();
    if ($count > 0) {
        return $query->row()->count;
    } else {
        return 0;
    }
}

/* * ****************************************************
 * ******************************************************
  Function For 	:	Get Count For Product
  Paramters		:	$for, product_id
  Return			:	success/failure
 * ******************************************************
 * ***************************************************** */

function _GetCountForProduct($for, $product_id) {
    $obj = & get_instance();
    switch ($for) {
        case'Comments': {
                $obj->db->select('count(vefinder_product_comments.comment_id) as count');
                $obj->db->from('vefinder_product_comments');
                $obj->db->where('vefinder_product_comments.product_id', $product_id);
                $obj->db->where('vefinder_product_comments.status', 1);
                $query = $obj->db->get();
                break;
            }
        case'CommentsAgComments': {
                $obj->db->select('count(vefinder_product_comment_against_comment.comment_id) as count');
                $obj->db->from('vefinder_product_comment_against_comment');
                $obj->db->where('vefinder_product_comment_against_comment.comment_id', $product_id);
                $obj->db->where('vefinder_product_comment_against_comment.status', 1);
                $query = $obj->db->get();
                break;
            }
        case'Likes': {
                $obj->db->select('count(vefinder_product_likes.like_id) as count');
                $obj->db->from('vefinder_product_likes');
                $obj->db->where('vefinder_product_likes.product_id', $product_id);
                $obj->db->where('vefinder_product_likes.status', 1);
                $query = $obj->db->get();
                break;
            }
        case'Shares': {
                $obj->db->select('count(vefinder_product_share.share_id) as count');
                $obj->db->from('vefinder_product_share');
                $obj->db->where('vefinder_product_share.product_id', $product_id);
                $obj->db->where('vefinder_product_share.status', 1);
                $query = $obj->db->get();
                break;
            }
        case'Images': {
                $obj->db->select('count(vefinder_product_images.product_image_id) as count');
                $obj->db->from('vefinder_product_images');
                $obj->db->where('vefinder_product_images.product_id', $product_id);
                $obj->db->where('vefinder_product_images.status', 1);
                $query = $obj->db->get();
                //echo $obj->db->last_query(); // die;
                break;
            }
    }

    $count = $query->num_rows();
    if ($count > 0) {
        return $query->row()->count;
    } else {
        return 0;
    }
}

function _GetProductCount($for) {
    //echo $_GET['sortby'];die;
    $sortBy = @$_GET['sortby'];
    $obj = & get_instance();
    switch ($for) {
        case'Product': {
                $obj->db->select('vefinder_product.product_id');
                $obj->db->from('vefinder_product');
                $obj->db->where('vefinder_product.status', 1);
                if ($sortBy == '1')
                    $obj->db->order_by('');
                else if ($sortBy == '2')
                    $obj->db->order_by('created_date', 'desc');
                else if ($sortBy == '3')
                    $obj->db->order_by('product_price', 'asc');
                else if ($sortBy == '4')
                    $obj->db->order_by('product_price', 'desc');
                $query = $obj->db->get();
                //echo $obj->db->last_query(); // die;
                break;
            }
        case'Order': {
                $obj->db->select('vefinder_order.order_id');
                $obj->db->from('vefinder_order');
                $obj->db->where('vefinder_order.status', 3);
                $query = $obj->db->get();
                //echo $obj->db->last_query(); // die;
                break;
            }
    }

    return $query->num_rows();
}

/* * *****************************************************
 * *******************************************************
  Functions For 	:	Get City Name
  Return			:	success/failure or Message
 * *******************************************************
 * ****************************************************** */

function _GetCityName($lat, $long) {
    $apiurl = 'http://maps.googleapis.com/maps/api/geocode/json';
    $args = array('latlng' => $lat . ',' . $long);
    //echo $apiurl . '?' . http_build_query($args); die();
    $curlHandle = curl_init();
    curl_setopt($curlHandle, CURLOPT_URL, $apiurl . '?' . http_build_query($args));
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curlHandle);
    if ($result === false) {
        throw new \RuntimeException(
        'API call failed with cURL error: ' . curl_error($curlHandle)
        );
    }
    curl_close($curlHandle);
    $apiResponse = json_decode($result, true);
    $jsonErrorCode = json_last_error();
    if ($jsonErrorCode !== JSON_ERROR_NONE) {
        throw new \RuntimeException(
        'API response not well-formed (json error code: ' . $jsonErrorCode . ')'
        );
    }
    //print_r($apiResponse);
    return $apiResponse['results'][0]['address_components'][5]["long_name"];
}

/* * *************************
 * **** SEND MAIL COUNT ******
 * ************************** */

function GetMailCount($case, $email) {
    $date = date("Y-m-d");
    $obj = & get_instance();
    switch ($case) {
        case'verification': {
                $user_id = $obj->session->userdata('user_id');
                $result = $obj->db->query("SELECT COUNT(`vefinder_email_log`.`email_log_id`) AS count FROM `vefinder_email_log`
										   WHERE `vefinder_email_log`.`user_id`='" . $user_id . "'
										   AND `vefinder_email_log`.`type_of_email`='3' 
										   AND DATE(`vefinder_email_log`.`created_date`)='" . $date . "'")->row()->count;
                break;
            }
        case'forget': {
                $result = $obj->db->query("SELECT COUNT(`vefinder_email_log`.`email_log_id`) AS count FROM `vefinder_email_log`
										   WHERE `vefinder_email_log`.`email`='" . $email . "'
										   AND `vefinder_email_log`.`type_of_email`='2' 
										   AND DATE(`vefinder_email_log`.`created_date`)='" . $date . "'")->row()->count;
                break;
            }
    }
    return $result;
}

/* * ***************************************
 * **CHECK AUTHENTICATION USER ****
 * ************************************** */

function checkredirection() {
    $obj = & get_instance();
    if ($obj->session->userdata('account_verify') == 0 && $obj->session->userdata('user_id') <> '') {
        redirect('Verify-Email');
    }
}

function redirection() {
    $obj = & get_instance();
    if ($obj->session->userdata('account_verify') == 1 && $obj->session->userdata('user_id') <> '') {
        redirect('Home');
    }
    if ($obj->session->userdata('account_verify') == 0 && $obj->session->userdata('user_id') <> '') {
        redirect('Verify-Email');
    }
}

/* * *****************************************************
 * *******************************************************
  Functions For 	:	Get Insert Tag
  Return			:	success/failure or Message
 * *******************************************************
 * ****************************************************** */

function _GetIntrestTag() {
    $obj = & get_instance();
    $obj->db->select('`vefinder_interests`.`interests_name`,vefinder_interests.interests_id');
    $obj->db->from('vefinder_interests');
    $obj->db->where('vefinder_interests.isActive', 1);
    $query = $obj->db->get();
    $count = $query->num_rows();
    if ($count > 0) {
        return $query->result();
    } else {
        return 0;
    }
}

/* * ***********************************
 * ****   Create Folder Function  ******
 * ************************************ */

function _Create_folder($ID) {
    $filename = UPLOAD_IMAGE_PATH . '/UserImage/' . $ID;
    if (!file_exists($filename)) {
        mkdir($filename, 0777, true);
    }
    $filename = UPLOAD_IMAGE_PATH . '/UserImage/' . $ID . '/CoverImage';
    if (!file_exists($filename)) {
        mkdir($filename, 0777, true);
    }
}

/* * ***********************************
 * ****   Time Ago   ******
 * ************************************ */

function HumanTiming($time) {
    $etime = time() - strtotime($time);
    if ($etime < 1) {
        return '0 second ago';
    }
    $a = array(12 * 30 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60 => 'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . " ago";
        }
    }
}

/* * *****************************************************
 * *******************************************************
  Functions For 	:	Get Tag By Id
  Return			:	success/failure or Message
 * *******************************************************
 * ****************************************************** */

function _GetTagById($tag_id) {
    $obj = & get_instance();
    $obj->db->select('`vefinder_tags_track`.`tag_text`');
    $obj->db->from('vefinder_tags_track');
    $obj->db->where('vefinder_tags_track.status', 1);
    $obj->db->where('vefinder_tags_track.tag_id', $tag_id);
    $query = $obj->db->get();
    //echo $obj->db->last_query(); 
    $count = $query->num_rows();
    if ($count > 0) {
        return $query->row()->tag_text;
    } else {
        return 0;
    }
}

/* * *****************************************************
 * *******************************************************
  Functions For 	:	Get Dropdown
  Return			:	success/failure or Message
 * *******************************************************
 * ****************************************************** */

function _Get_dropdown($check) {
    $obj = & get_instance();
    switch ($check) {
        case 'category': {
                $query = $obj->db->query("SELECT cat_id,cat_name  FROM vefinder_categories where status=1");
                break;
            }
		case 'Subcategory': {
                $query = $obj->db->query("SELECT subcat_id,cat_id,sub_cat_name  FROM vefinder_sub_categories where status=1");
                break;
            }
    }
    if ($query->num_rows() > 0) {
        $data = $query->result();
        return $data;
    } else
        return false;
}

/* * *************************************************
 * ** Product Exist in order table or not ****
 * ************************************************** */

function _Check_order_history($history) {
    $obj = & get_instance();
    $result = $obj->db->query("select count(order_id) as count from vefinder_order_temp where `user_id`='" . $history['user_id'] . "' AND `product_id`='" . $history['product_id'] . "' AND status=1")->row()->count;
    return $result;
}

function _Cart_count($uid) {
    $obj = & get_instance();
    $result = $obj->db->query("select count(order_id) as count from vefinder_order_temp where `user_id`='" . $uid . "' AND status='1'")->row()->count;
    return $result;
}

## Bid 

function _GetCountForBid($id, $case) {
    $obj = & get_instance();
    switch ($case) {
        case'Watching': {
                $obj->db->select('(vefinder_bid_product_watcher. watcher_id)as count');
                $obj->db->from('vefinder_bid_product_watcher');
                $obj->db->where('vefinder_bid_product_watcher.product_id', $id);
                $query = $obj->db->get();
                break;
            }
        case'Bids': {
                $obj->db->select('count(vefinder_bidresponse.bid_id) as count');
                $obj->db->from('vefinder_bidresponse');
                $obj->db->where('vefinder_bidresponse.product_id', $id);
                // $obj->db->where('vefinder_bidresponse.bid_status', 1);
                $query = $obj->db->get();
                break;
            }
    }
    //echo $obj->db->last_query(); 
    $count = $query->num_rows();
    if ($count > 0) {
        return $query->row()->count;
    } else {
        return 0;
    }
}

function dateDifference($date1, $date2) {
    $date1 = strtotime($date1);
    $date2 = strtotime($date2);
    $diff = abs($date1 - $date2);

    $day = $diff / (60 * 60 * 24); // in day
    $dayFix = floor($day);
    $dayPen = $day - $dayFix;
    if ($dayPen > 0) {
        $hour = $dayPen * (24); // in hour (1 day = 24 hour)
        $hourFix = floor($hour);
        $hourPen = $hour - $hourFix;
        if ($hourPen > 0) {
            $min = $hourPen * (60); // in hour (1 hour = 60 min)
            $minFix = floor($min);
            $minPen = $min - $minFix;
            if ($minPen > 0) {
                $sec = $minPen * (60); // in sec (1 min = 60 sec)
                $secFix = floor($sec);
            }
        }
    }
    $str = "";
    if ($dayFix > 0)
        $str.= $dayFix . " day ";
    if ($hourFix > 0)
        $str.= $hourFix . " hour ";
    if ($minFix > 0)
        $str.= $minFix . " min ";
    if ($secFix > 0)
        $str.= $secFix . " sec ";
    return $str;
}

/* * ****************************************************
 * ******************************************************
  Function For 	:	Create Captcha
  Paramters		:	None
  Return			:	success/failure
 * ******************************************************
 * ***************************************************** */

function _CreatCaptcha() {
    $obj = & get_instance();

    @$filepath = $obj->session->userdata('captchaimage');
    if (file_exists($filepath)) {
        $obj->session->unset_userdata('captchaalphabet');
        unlink($filepath);
        $obj->session->unset_userdata('captchaimage');
    }

    $config = array(
        'img_path' => './assets/captcha/',
        'img_url' => base_url() . 'assets/captcha/',
        'img_width' => '150',
        'img_height' => 45,
        'border' => 0,
        'expiration' => 7200000,
        'word_length' => 6,
        'font_size' => 16,
        'font_path' => './assets/fonts/AlegreyaSansSC-Bold.otf',
        'img_id' => 'Imageid',
        'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        // White background and border, black text and red grid
        'colors' => array(
            'background' => array(255, 255, 255),
            'border' => array(255, 255, 255),
            'text' => array(153, 0, 19),
            'grid' => array(255, 255, 255)
        )
    );

    $cap = create_captcha($config);
    $image = $cap['image'];

    $obj->session->set_userdata('captchaalphabet', $cap['word']);
    $obj->session->set_userdata('captchaimage', $cap['image']);

    return $image;
}

function _IAmFollowingThisUser($following_id) {
    $obj = & get_instance();
    $user_id = $obj->session->userdata('user_id');
    $obj->db->select('vefinder_follow_list.*');
    $obj->db->from('vefinder_follow_list');
    $obj->db->where('vefinder_follow_list.user_id', $user_id);
    $obj->db->where('vefinder_follow_list.following_id', $following_id);
    $obj->db->where('vefinder_follow_list.status', 1);
    $query = $obj->db->get();
    $count = $query->num_rows();
    //echo $obj->db->last_query(); die;
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function _IAmLikeThisUser($user_id) {
    $obj = & get_instance();
    $my_user_id = $obj->session->userdata('user_id');
    $obj->db->select('vefinder_profile_likes.*');
    $obj->db->from('vefinder_profile_likes');
    $obj->db->where('vefinder_profile_likes.user_id', $user_id);
    $obj->db->where('vefinder_profile_likes.who_like', $my_user_id);
    $obj->db->where('vefinder_profile_likes.status', 1);
    $query = $obj->db->get();
    $count = $query->num_rows();
    //echo  $obj->db->last_query(); die;
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function _Product_SellerUserId($product_id) {
    $obj = & get_instance();
    $obj->db->select('vefinder_product.user_id');
    $obj->db->from('vefinder_product');
    $obj->db->where('vefinder_product.status', 1);
    $obj->db->where('vefinder_product.product_id', $product_id);
    $result = $obj->db->get();
    $count = $result->num_rows();
    if ($count > 0) {
        return $result->row()->user_id;
    }
    return 0;
}

function _UpdateTempOrderWithUserAddressId($user_address_id, $cart_id) {
    $obj = & get_instance();
    $user_id = $obj->session->userdata('user_id');
    $data = array('user_address_id' => $user_address_id);
    $obj->db->where('vefinder_order_temp.user_id', $user_id);
    $obj->db->where('vefinder_order_temp.cart_id', $cart_id);
    $obj->db->where('vefinder_order_temp.status', 1);
    $obj->db->update('vefinder_order_temp', $data);
}

function _CheckProductOutOfStockOrNot() {
    $obj = & get_instance();
    $user_id = $obj->session->userdata('user_id');
    $obj->db->select('vefinder_order_temp.product_id');
    $obj->db->from('vefinder_order_temp');
    $obj->db->where('vefinder_order_temp.user_id', $user_id);
    $obj->db->where("vefinder_order_temp.status", 1);
    $obj->db->order_by('vefinder_order_temp.created_date', "desc");
    $query = $obj->db->get();
    $data = $query->result();
    if ($data) {
        foreach ($data as $key => $pro) {
            $product = $obj->Product_model->GetSingleProduct($pro->product_id, 1);
            if ($product->product_in_stock == 2) {
                return false;
            }
        }
    }
    return true;
}

function createPaymentId($orderId) {
    $curl = "";
    $curl = curl_init();
    $username = "";
    $password = "d2a1f324b4b577bbb32ec6490867fcfed0643204783e8e1ee8ea4996f2c28332";
    $authFirst = base64_encode($username . ":" . $password);
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.quickpay.net/payments",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "currency=dkk&order_id=$orderId",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "accept: application/json",
            "authorization: Basic $authFirst",
            "cache-control: no-cache",
            "Accept-Version:v10"
        ),
    ));
    $response = curl_exec($curl);
    return $response;
}

function makePayment($paymentId,$amount=0,$card,$cardExp,$cvv) {
    $curl = "";
    $curl = curl_init();
    $username = "";
    $password = "d2a1f324b4b577bbb32ec6490867fcfed0643204783e8e1ee8ea4996f2c28332";
    $authFirst = base64_encode($username . ":" . $password);
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.quickpay.net/payments/$paymentId/authorize",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "amount=$amount&card[number]=$card&card[expiration]=$cardExp&card[cvd]=$cvv&acquirer=clearhaus&auto_capture=true",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "accept: application/json",
            "authorization: Basic $authFirst",
            "cache-control: no-cache",
            "Accept-Version:v10"
        ),
    ));
    //echo "<pre>";
    //print_r(($curl));
    $response = curl_exec($curl);
    //print_r(json_decode($response));die;
    return $response;
}

function _CheckThisProductIsMine($product_id)
{
	$obj 		= & get_instance();
	$user_id 	= $obj->session->userdata('user_id');
	
    $obj->db->select('vefinder_product.user_id');
    $obj->db->from('vefinder_product');
    $obj->db->where('vefinder_product.status', 1);
    $obj->db->where('vefinder_product.user_id', $user_id);
    $obj->db->where('vefinder_product.product_id', $product_id);
    $result = $obj->db->get();
    $count = $result->num_rows();
    if ($count == 0) {
		redirect('home');
    }
}
?>