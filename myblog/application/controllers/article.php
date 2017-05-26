<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller
{
    function add_article(){


        $msg = $this -> input -> post('msg');
        $title = $this -> input -> post('title');
        $type = $this -> input -> post('type');
        $img = $this -> input -> post('img');
        $this -> load -> model('article_model');
        $row = $this -> article_model -> add_article($msg,$title,$type,$img);

        if($row){
            echo 'success';
        }else{
            echo 'fail';
        }

    }
}