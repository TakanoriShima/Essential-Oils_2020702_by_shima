<?php
    //C
    require_once 'DAOs/OilDAO.php';
    require_once 'DAOs/EffectDAO.php';
    session_start();

    $id = $_GET['id'];
    
    $effect = EffectDAO::find($id);
    

    $oils = OilDAO::get_all_oils_by_effect_id($id);
    //var_dump($effects);
    
    include_once 'views/effect_detail_for_user_view.php';