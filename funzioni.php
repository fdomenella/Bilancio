<?php
date_default_timezone_set("Europe/Rome");

include_once("db.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * 
 * @param data in formato d-m-Y $data
 * @return type
 */
function data_to_timestamp($data){
    $timestamp =strtotime($data);
    return $timestamp;
}

function timestamp_to_data($timestamp){
    $data = date('d-m-Y', $timestamp);
    return $data;
}

function importo_pulisci($importo){
    
     return str_replace(",",".", $importo);
}


/**
 * verifica se il bdg per l'anno e categoria corrente sono settati
 */
function bdg_check_bdg_set($anno, $id_cat){
    $db = new db(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
    $query="SELECT * FROM budget WHERE anno=$anno AND id_cat = $id_cat";
    $r= $db->query($query);
    if($r  ){
        
        if(mysqli_num_rows($r)==0){
            echo "non inserito";
            return false;
        }else{
            echo "già inserito";
            return true;
        }
        
        
    }
     echo "non inserito";
    return false;

    
}
?>
