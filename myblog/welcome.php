<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    function push_article(){
        $this -> load -> view('editor');
    }
    function sayLittle(){
        $this -> load -> model('article_model');
        $article_desc = $this ->article_model -> get_article_desc();
        $article_click =  $this ->article_model -> get_article_click_order();
        $article_more_comm = $this ->article_model -> get_article_comm_order();
        $leave_msg = $this ->article_model -> get_msg_by_date();
        $this->load->view('sayLittle',array(
            'articleDesc' => $article_desc,
            'articleClick' => $article_click,
            'articleMmoreComm' => $article_more_comm,
            'leaveMsg' => $leave_msg,
        ));
    }
    public function index(){
            $typeId = $this -> input -> get('type_id');
            $this -> load -> model('article_model');
                $article_desc = $this ->article_model -> get_article_desc();
               $article_click =  $this ->article_model -> get_article_click_order();
               $article_more_comm = $this ->article_model -> get_article_comm_order();
               $leave_msg = $this ->article_model -> get_msg_by_date();
                $articleList = $this -> article_model -> get_all_article();
//                var_dump($articleList);
//                die();
                $this -> session -> set_userdata('articleList',$articleList);

               $this->load->view('index',array(
                   'articleDesc' => $article_desc,
                   'articleClick' => $article_click,
                   'articleMmoreComm' => $article_more_comm,
                   'leaveMsg' => $leave_msg,
                   'typeId' => $typeId
               ));

    }
    public function get_article(){
        $typeId = $this -> input -> get('type');
        $page = $this -> input -> get('pageNo');
        $limit = 6;
        $this -> load -> model('article_model');
        $totalArticle = $this -> article_model -> getTotal_article($typeId);
        $pageNo = ceil($totalArticle/$limit);
        $results = $this -> article_model -> get_article($limit*($page-1),$limit,$typeId);
        if($pageNo == $page){
            $data = array(
                'results' => $results,
                'isEnd' => true
            );
        }else{
            $data = array(
                'results' => $results,
                'isEnd' => false
            );
        }
        echo json_encode($data);

    }
    public function get_article_detail(){
        $id = $this -> input -> get('id');
        $this -> load -> model('article_model');
        $result = $this -> article_model -> get_article_by_id($id);
        $articledesc = $this ->article_model -> get_article_desc();
        $article_click =  $this ->article_model -> get_article_click_order();
        $article_more_comm = $this ->article_model -> get_article_comm_order();
        $leave_msg = $this ->article_model -> get_msg_by_date();
        $row = $this -> article_model -> update_click($id);//跟新文章点击量
//        echo var_dump($result);
            $this -> load -> view('single',array(
                'articleDetail' => $result,
                'articleDesc' => $articledesc,
                'articleClick' => $article_click,
                'articleMmoreComm' => $article_more_comm,
                'leaveMsg' => $leave_msg
            ));


    }
    public function post_message(){
        $content = $this -> input -> post('content');
        $article_id = $this -> input -> post('article_id');
        $user_id = $this -> session -> userdata('userLogin') -> user_id;
        $this -> load -> model('article_model');
        $row = $this -> article_model -> insert_message_by_user($content,$article_id,$user_id);
        if($row>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

}


