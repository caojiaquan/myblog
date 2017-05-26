<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model
{
public function get_this_web(){
    $sql = 'select * from t_article where article_id=25';
    return $this -> db -> query($sql) -> result();
}
    public  function get_all_article(){
        $sql = 'SELECT a.title,a.article_id 
from t_article a';
        return $this -> db -> query($sql) -> result();
    }
    public function get_all_msg(){
        $sql = 'SELECT * 
FROM t_article_type ';
        return $this -> db -> query($sql)->result();
    }
    public function get_article_desc(){
        $sql = 'select * 
from t_article ORDER BY article_id DESC LIMIT 4';
        return $this -> db -> query($sql) -> result();
    }
    public function get_article_comm_order(){
        $sql ='SELECT * 
FROM t_article  WHERE article_id in (SELECT c.article_id
FROM t_comment c ORDER BY post_date) LIMIT 0, 4';
        return $this -> db -> query($sql) -> result();
    }

    public function get_msg_by_date(){
        $sql = 'SELECT m.*, u.username
FROM t_message m ,t_user u where u.user_id=m.user_id ORDER BY post_date desc limit 0,4';
        return $this -> db -> query($sql) -> result();
    }

    public  function get_article_click_order(){
        $sql = 'select * 
from t_article ORDER BY click DESC LIMIT 4';
        return $this -> db -> query($sql) -> result();

    }
    public function getTotal_article($typeId){
//        var_dump($typeId != 'NaN');
//        die();
        if($typeId != 'NaN'){
            $sql = 'SELECT a.*,t.type_name 
from t_article a,t_article_type t WHERE a.type_id='.$typeId.' AND a.type_id=t.type_id';
        }else{
            $sql = 'SELECT a.*,t.type_name
FROM t_article a ,t_article_type t WHERE a.type_id=t.type_id';
        }

        return $this -> db -> query($sql) -> num_rows();
    }
    public function get_article($start,$limited,$typeId){
        if($typeId != 'NaN'){

            $sql = 'SELECT a.*,t.type_name 
from t_article a,t_article_type t WHERE a.type_id='.$typeId.' AND a.type_id=t.type_id LIMIT '.$start.','.$limited;
        }else{
            $sql = 'SELECT a.*,t.type_name
FROM t_article a ,t_article_type t WHERE a.type_id=t.type_id limit '.$start.','.$limited;
        }

        return $this -> db -> query($sql) -> result();
    }




    public function get_article_by_id($id){
        $sql1 = 'SELECT a.* ,t.type_name
FROM t_article a, t_article_type t
WHERE a.type_id=t.type_id and article_id = '.$id;
        $sql2 = 'SELECT c.*,u.* 
FROM t_comment c,t_user u
WHERE article_id='.$id.' AND c.user_id=u.user_id';
       $data1 =  $this -> db -> query($sql1) -> row();
       $data2 = $this -> db -> query($sql2) -> result();
       return $data = array(
           'article' => $data1,
           'comments' => $data2
       );

    }


    public function insert_message_by_user($content,$article_id,$user_id){
        $data = array(
            'content' => $content ,
            'article_id' => $article_id ,
            'user_id' => $user_id
        );
        $this->db->insert('t_comment', $data);
        return  $this -> db -> affected_rows();
    }


    public function add_article($msg,$title,$type_id,$img){
        $data = array(
            'content' => $msg ,
            'title' => $title ,
            'type_id' => $type_id,
            'img' => $img
        );

        return $this->db->insert('t_article', $data)->affected_rows();
    }

    public function update_click($id){
        $sql = 'UPDATE t_article  SET click=click+1  WHERE article_id = '.$id;
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
}

