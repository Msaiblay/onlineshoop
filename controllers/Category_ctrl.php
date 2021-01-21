<?php


class Category_ctrl
{
    function __construct(){
        require $GLOBALS['model_file_path']."Category_mdl.php";
    }
    function read(){
        $category_mdl = new Category_mdl();
        $getallresult = $category_mdl->getall();
        return $getallresult;
    }
    function insert(){
        $name = $_POST['name'];
        $photo = $_FILES['photo'];
        $source_dir = $GLOBALS['file_path'].'storage/category/';
        $fullpath = $source_dir.$photo['name'];
        move_uploaded_file($photo['tmp_name'],$fullpath);

        $uploadpath = 'storage/category/'.$photo['name'];

        $data = array(
            'name' =>$name,
            'photo' => $uploadpath
        );

        $category_mdl = new Category_mdl();
        $addresult = $category_mdl->insert_data($data);

        $url = $GLOBALS['view_path'].'category_list';
        header("location:".$url);

    }
    function edit($id){
//        var_dump($id);
//        die();
        $category_mdl = new Category_mdl();
        $getresult = $category_mdl->edit_data($id);
//        var_dump($getresult);
        return $getresult;
    }
    function update(){
        $id = $_POST['id'];
        $name =  $_POST['name'];
        $oldphoto = $_POST['oldphoto'];
        $newphoto =$_FILES['photo'];

        if ($newphoto['size']>0){
            $source_dir = $GLOBALS['file_path'].'storage/category/';
            $fullpath = $source_dir.$newphoto['name'];
            move_uploaded_file($newphoto['tmp_name'],$fullpath);
            $uploadpath = 'storage/category/'.$newphoto['name'];
        }
        else{
            $uploadpath = $oldphoto;
        }
        $data = array(
            'name' =>$name,
            'photo' => $uploadpath
        );
        $category_mdl = new Category_mdl();
        $updateresult = $category_mdl->update_data($id, $data);
        $url = $GLOBALS['view_path'].'category_list';
        header("location:".$url);
    }
    function  randomcategories(){
        $categorymdl = new Category_mdl();
        $getrandomresults= $categorymdl->randomcategories_data();
        return $getrandomresults;
    }
}
?>



















