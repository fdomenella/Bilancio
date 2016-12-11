<?php
date_default_timezone_set("Europe/Rome");
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


?>
