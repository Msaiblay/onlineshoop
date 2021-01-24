<?php


class Adminorder_ctrl
{

    function __construct(){
        require $GLOBALS['model_file_path']."Adminorder_mdl.php";
    }

    function read(){
        $admin_mdl = new Adminorder_mdl();
        $getallresult = $admin_mdl->getall();
        return $getallresult;
    }
}