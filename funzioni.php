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

function current_year(){
    $anno = date('Y');
    return $anno;
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

/**
 * calcola il totale entrate dell'anno, se anno è null allora calcola l'anno corrente
 * @param type $anno
 */
function report_totale_entrate($anno=""){
    if($anno==""){
        $anno= current_year();
    }
    
    $inizio_anno = data_to_timestamp("1-1-$anno");
    $fine_anno = data_to_timestamp("31-12-$anno");
    
    
    $db = new db(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
    $query ="SELECT sum(importo) as totale FROM entrate where data between $inizio_anno and $fine_anno ";
    $result = $db->query($query);
    
    $row = mysqli_fetch_array($result);
    return $row['totale'];
    
    
}

function report_uscite_uscite($anno=""){
    if($anno==""){
        $anno= current_year();
    }
    
    $inizio_anno = data_to_timestamp("1-1-$anno");
    $fine_anno = data_to_timestamp("31-12-$anno");
    
    
    $db = new db(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
    $query ="SELECT sum(importo) as totale FROM uscite where data between $inizio_anno and $fine_anno ";
    $result = $db->query($query);
    
    $row = mysqli_fetch_array($result);
    return $row['totale'];
    
}
function layouts_navigation(){
    
    $layouts ='<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="spesa.php"><i class="fa fa-edit fa-fw"></i> Aggiungi Spesa</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Report<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="report_budget.php">Budget</a>
                                </li>
                                <li>
                                    <a href="report_spesa.php">Report Spesa</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                          <li>
                            <a href="entrate.php"><i class="fa fa-edit fa-fw"></i> Aggiungi entrate</a>
                        </li>
                        <li>
                            <a href="budget_edit.php"><i class="fa fa-edit fa-fw"></i> Imposta Budget</a>
                        </li>
                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->';
    return $layouts;
}
?>
