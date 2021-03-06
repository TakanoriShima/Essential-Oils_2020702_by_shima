<?php
    
    require_once 'DAOs/OilDAO.php';
    require_once 'filters/LoginFilter.php';
    session_start();
    
    $id = $_POST['id'];
    //var_dump($id);
    $page = $_POST['page'];
    
    if($id === ""){
        $_SESSION['error'] = '不正アクセスです';
        header ('Location: mypage_top.php');
        exit;
    }
    
    $oil = OilDAO::get_oil_by_id($id);
    
    if($effect !== false){
        $flash_message = OilDAO::delete($id);
        $_SESSION['flash_message'] = $flash_message;
        
        if($page === 'top'){
            header('Location: mypage_top.php');
            exit;
        }else{
            header('Location: register_list.php');
            exit;
        }
    }else{
        $_SESSION['error'] = '存在しないページです';
        header('Location: mypage_top.php');
        exit;
    }