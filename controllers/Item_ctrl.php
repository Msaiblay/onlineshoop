<?php


class Item_ctrl
{
    function __construct(){
        require $GLOBALS['model_file_path']."Item_mdl.php";
    }
    function read(){
        $item_mdl = new Item_mdl();
        $getallresult = $item_mdl->getall();
        return $getallresult;
    }

    function edit($id){
        $item_mdl = new Item_mdl();
        $getresult = $item_mdl->edit_data($id);
        return $getresult;
    }
    function update(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $newphoto = $_FILES['photo'];
        $oldphoto = $_POST['oldphoto'];

        if ($newphoto['size'] > 0){
            $source_dir = $GLOBALS['file_path'].'storage/item/';
            $fullpath = $source_dir.$newphoto['name'];
            move_uploaded_file($newphoto['tmp_name'],$fullpath);
            $uploadpath = 'storage/item/'.$newphoto['name'];
        }else{
            $uploadpath = $oldphoto;
        }
        $uprice =$_POST['uprice'];
        $dprice =$_POST['dprice'];
        $discr = $_POST['description'];

        $brandid = $_POST['brandid'];
        $subcategoryid = $_POST['subcategoryid'];
        $data = array(
            'name' =>$name,
            'photo' => $uploadpath,
            'uprice' => $uprice,
            'dprice' => $dprice,
            'disre' =>$discr,
            'brandid' => $brandid,
            'subcategoryid'=>$subcategoryid
        );
        $item_mdl = new Item_mdl();
        $addresult = $item_mdl->update_data($id, $data);

        $url = $GLOBALS['view_path'].'item_list';
        header('location:'.$url);

    }
    function insert(){
        $name = $_POST['name'];
        $photo = $_FILES['photo'];
        $source_dir = $GLOBALS['file_path'].'storage/item/';
        $fullpath = $source_dir.$photo['name'];
        move_uploaded_file($photo['tmp_name'],$fullpath);

        $uploadpath = 'storage/item/'.$photo['name'];

        $uprice =$_POST['uprice'];
        $dprice =$_POST['dprice'];
        $discr = $_POST['description'];

        $brandid = $_POST['brandid'];
        $subcategoryid = $_POST['subcategoryid'];
        $data = array(
            'name' =>$name,
            'photo' => $uploadpath,
            'uprice' => $uprice,
            'dprice' => $dprice,
            'disre' =>$discr,
            'brandid' => $brandid,
            'subcategoryid'=>$subcategoryid
        );
        $item_mdl = new Item_mdl();
        $addresult = $item_mdl->insert_data($data);

        $url = $GLOBALS['view_path'].'item_list';
        header('location:'.$url);

    }
    function delete($id){
        $item_mdl = new Item_mdl();
        $item_mdl->deletedata($id);

        $url = $GLOBALS['view_path'].'item_list';
        header('location:'.$url);
    }
    function  discountitem(){
        $itemmdl = new Item_mdl();
        $getdiscountresult = $itemmdl-> discountitemdata();
        return $getdiscountresult;
    }
    function newitems(){
        $itemmdl = new Item_mdl();
        $getnewresult = $itemmdl->newitemdata();
        return $getnewresult;
    }
    function randomitem(){
        $itemmdl = new Item_mdl();
        $getrandomitem = $itemmdl->randomitemdata();
        return $getrandomitem;

    }
}

