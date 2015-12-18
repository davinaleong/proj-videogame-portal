<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: User_log_model.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 12 Dec 2015

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

	All content © DAVINA Leong Shi Yun. All Rights Reserved.
***********************************************************************************/
class User_log_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $query = $this->db->get(TABLE_USER_LOG);
        return $query->result_array();
    }

    public function log_message($message)
    {
        $data = array(
            'uid'=>$this->session->userdata('uid'),
            'message'=>$message
        );

        $now = new DateTime("now");
        $this->db->set('timestamp', $now->format('c'));
        $this->db->insert(TABLE_USER_LOG, $data);
        return $this->db->insert_id();
    }

    public function validate_access($requiredAccess,$userAccess)
    {
        $valid=false;

        for($i=0;$i<strlen($userAccess);$i++)
        {
            if(strpos($requiredAccess,substr($userAccess,$i,1))!==false)
            {
                $valid=true;
                break;
            }
        }
        return $valid;
    }
}// end User_log_model class