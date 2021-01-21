<?php


class Subcategory_ctrl
{
function __construct()
{
require $GLOBALS['model_file_path']."Subcategory_mdl.php";
}
function read(){
    $subcategory_mdl = new Subcategory_mdl();
    $getallresults = $subcategory_mdl->getall();
    return $getallresults;
}
    function edit($id){
        $subcategory_mdl = new Subcategory_mdl();
        $getresult = $subcategory_mdl->edit_data($id);
        return $getresult;
    }
function insert(){
    $name = $_POST['name'];
    $categoryid = $_POST['categoryid'];

    $data = array(
        'name'=>$name,
        'categoryid'=>$categoryid
    );
    $subcategory_mdl = new Subcategory_mdl();

    $addresult = $subcategory_mdl->insert_data($data);

    $url = $GLOBALS['view_path'].'subcategory_list';
    header('location:'. $url);
}

    function update(){
        $id = $_POST['id'];
        $name =  $_POST['name'];
        $categoryid = $_POST['categoryid'];


        $data = array(
            'name' =>$name,
            'categoryid'=>$categoryid
        );
        $subcategory_mdl = new Subcategory_mdl();
        $updateresult = $subcategory_mdl->update_data($id, $data);
        $url = $GLOBALS['view_path'].'subcategory_list';
        header("location:".$url);
    }
    function getallBycategoryid($id){
    $submdl = new Subcategory_mdl();
    $getall = $submdl->geallbyid($id);
    return $getall;

    }


}