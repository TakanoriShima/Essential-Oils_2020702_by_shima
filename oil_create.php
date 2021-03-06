<?php
    require_once 'DAOs/UserDAO.php';
    require_once 'DAOs/OilDAO.php';
    require_once 'models/Oil.php';
    session_start();
    

    //var_dump($_POST);
    $name = $_POST['name'];
    //var_dump($name);    
    $scientific_name = $_POST['scientific_name'];
    $plant_name = $_POST['plant_name'];
    $extraction = $_POST['extraction'];
    $aroma = $_POST['aroma'];
    $caution = $_POST['caution'];
    $english_name = $_POST['english_name'];
    
    $login_user = $_SESSION['login_user'];
    
    //画像が選択されていれば
    if($_FILES['image']['size'] !==0){
        //画像ファイルの物理アップロード処理
        $image = OilDAO::upload();
    }else{
        $image = "";
    }
    $page = $_POST['page'];

    $oil = new Oil($name, $scientific_name, $plant_name, $extraction, $aroma, $caution, $english_name, $login_user->id, $image);
    
    $errors = $oil->validate($oil);
    
    if(count($errors) === 0){
        $flash_message = OilDAO::insert($oil);
        
        $_SESSION['flash_message'] = $flash_message;
        
       
        if($page === 'top'){
            header('Location: mypage_top.php');
            exit;
        }else {
            header('Location: register_list.php');
            exit;
        }
        
    }else{
        $_SESSION['errors'] = $errors;
        
        header('Location: oil_register.php');
        exit;
    }
