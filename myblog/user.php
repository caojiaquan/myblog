<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{

    function check_login(){

        $userLogin = $this -> session -> userdata('userLogin');
        if($userLogin){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    function login(){
        $username = $this -> input -> post('name');
        $password = $this -> input -> post('pass');
        $this -> load -> model('user_model');
        $row = $this -> user_model -> get_by_name_and_pwd($username,$password);
        if($row){
            $this -> session -> set_userdata('userLogin',$row);
            echo 'success';
        }else{
            echo 'fail';
        }

    }
    function regist(){
        $username = $this -> input -> post('name');
        $password = $this -> input -> post('pass');
        $password1= $this -> input -> post('pass1');
        $sex = $this -> input -> post('sex');
        if($password == $password1){
            $this -> load -> model('user_model');
            $row = $this -> user_model -> insert_by_name_and_pwd($username,$password,$sex);
            if($row > 0 ){
                echo 'success';
            }else{
                echo 'fail';
            }
        }else{
            echo 'fail';
        }



    }
}