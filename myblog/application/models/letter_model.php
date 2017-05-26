<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Letter_model extends CI_Model {


    function count_letter(){
        $sql = 'SELECT m.*,u.username
from t_message m,t_user u WHERE m.user_id=u.user_id ORDER BY msg_id DESC';
        return $this -> db -> query($sql) ->num_rows();
    }
    function get_letter($start,$limit){
        $sql = 'SELECT m.*,u.username
from t_message m,t_user u WHERE m.user_id=u.user_id ORDER BY msg_id DESC limit '.$start.','.$limit;
        return $this -> db -> query($sql) -> result();
    }

    function add_letter($msg,$user_id){
        $data = array(
            'content' => $msg ,
            'user_id' => $user_id

        );
        $this->db->insert('t_message', $data);
        return $this -> db -> affected_rows();
    }
}