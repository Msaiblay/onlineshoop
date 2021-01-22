<?php


class Userregister_ctrl
{
    function __construct(){
        require $GLOBALS['model_file_path']."Userregister_mdl.php";
    }
    function insert(){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
//    var_dump($name);
        $data = array(
            'name' =>$name,
            'email' =>$email,
            'password' =>$password,
            'phone' =>$phone,
            'address' =>$address,
            'status' =>0

        );
//    var_dump($data);
//    die();

//
//    $usrregit_mdl = new Userregister_mdl();
//    $addresult = $usrregit_mdl->insert_data($data);

        $usrmdl = new Userregister_mdl();
        $addresult = $usrmdl->insert_data($data);

        session_start();
        $_SESSION['reg_session'] ='yes., You have registered';

        $url = $GLOBALS['view_path'].'login';
        header("location:".$url);


    }
    function login(){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $data = array(
            'email' =>$email,
            'password' =>$password,
        );

        $usrmdl = new Userregister_mdl();
        $loginresult = $usrmdl->login_data($data);

        if ($loginresult){
            var_dump($loginresult);
        }else{
            session_start();
            $_SESSION['login_failed'] ='Email and Password incorrect';

            $url = $GLOBALS['view_path'].'login';
            header("location:".$url);
        }


    }

}