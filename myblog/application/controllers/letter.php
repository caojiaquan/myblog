<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Letter extends CI_Controller
{
    function index(){
        $this -> load -> model('article_model');
        $article_desc = $this ->article_model -> get_article_desc();
        $article_click =  $this ->article_model -> get_article_click_order();
        $article_more_comm = $this ->article_model -> get_article_comm_order();
        $leave_msg = $this ->article_model -> get_msg_by_date();
        $flag ="留言板";
        $this->load->view('letter',array(
            'articleDesc' => $article_desc,
            'articleClick' => $article_click,
            'articleMmoreComm' => $article_more_comm,
            'leaveMsg' => $leave_msg,
            'flag' => $flag
        ));
    }
    function get_letter(){
        $Nopage = $this -> input -> get('Nopage');
        $limit = 5;
        $isEnd = false;
        $this -> load -> model('letter_model');
        $countLetter = $this -> letter_model -> count_letter();
        $pageNum = ceil($countLetter/$limit);
        $results = $this -> letter_model -> get_letter($limit*($Nopage -1),$limit);
        $data = Array();
        if($Nopage == $pageNum){
            $data['isEnd'] = $isEnd;
        }else{
            $isEnd = true;
        }
        $data['isEnd'] = $isEnd;
        $data['result'] = $results;
        $data['pageNum'] =  $pageNum;
        $data['allCountLetter'] =  $countLetter;
        echo json_encode($data);




    }
    function add_letter(){
        $msg = $this -> input -> get('msg');
        $user_id = $this -> session -> userdata('userLogin')->user_id;
        $this -> load -> model('letter_model');

        $row  = $this -> letter_model -> add_letter($msg,$user_id);
        if($row>0){
            echo 'sucess';
        }else{
            echo 'fail';
        }
    }
}