<?php
    // (C)
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    session_start();
    
    $keyword = $_GET['keyword'];
    
    // $flash_message = $_SESSION['flash_message'];
    
    if($keyword === ''){
        $oils = OilDAO::get_all_oils_sort();
        $flash_message  = '何かキーワードを入力してください';
    }else{
        $oils = OilDAO::search($keyword);
        $flash_message = 'キーワード 「' . $keyword . '」の検索に' . count($oils) . '件ヒットしました';
    }
    // var_dump($keyword);
    
    // $_SESSION['flash_message'] = $flash_message;
    
    $effects = EffectDAO::get_all_effects();
    
    
    
    // var_dump($oils);
    
    include_once 'views/index_view.php';