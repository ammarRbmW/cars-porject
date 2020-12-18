<?php


function getTitle(){
global $pageTitle;
if(isset($pageTitle)){
    echo $pageTitle;
}
else {
    echo "Default";
}

}




function checkStatus($user){
    global $con;
    $stmt1=$con->prepare("SELECT Username ,RegStatus from users where Username=? and RegStatus=0 ");
    $stmt1->execute(array($user));
    $status=$stmt1->rowCount();
    return $status;
}



function getAllForm($nametabe,$order,$where=null){

    global $con;
    $sqi=$where==null?'':$where;
    $stmt1=$con->prepare("SELECT * from $nametabe $where order by $order DESC");
    $stmt1->execute();
    $getcat=$stmt1->fetchAll();
    return $getcat;
}

function getcar(){
    global $con;
    $stmt1=$con->prepare("SELECT DISTINCT name_c from cars");
							  $stmt1->execute();
                              $getitems=$stmt1->fetchAll();
                              return $getitems;
}

function getAllcar($nametabe,$order,$where){

    global $con;
   
    $stmt1=$con->prepare("SELECT * from $nametabe where name_c=?  order by $order DESC");
    $stmt1->execute(array($where));
    $getcat=$stmt1->fetchAll();
    return $getcat;
}
function getCat(){

    global $con;
    $stmt1=$con->prepare("SELECT * from categories order by id ASC");
    $stmt1->execute(array());
    $getcat=$stmt1->fetchAll();
    return $getcat;
}

function getItems($where,$value,$approve){

    global $con;
    if($approve==Null){
        $sql="AND approve=1";
    }
    else{
        $sql=null;
    }
    $stmt1=$con->prepare("SELECT * from cars where $where=?order by id DeSC");
    $stmt1->execute(array($value));
    $getitems=$stmt1->fetchAll();
    return $getitems
    ;
}

function checkItem($select , $form , $value){

    global $con;
    $stmt1=$con->prepare("SELECT $select from $form where $select =?");
    $stmt1->execute(array($value));
    $count=$stmt1->rowCount();
    return $count;

}