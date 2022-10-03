<?php
include_once("../Repository/CategoryRepository.php");
include_once ("../Services/functions.php");
$functions=new functions();

$categoryRepository=new CategoryRepository();

$message['success']="";
$message['error']="";

if (isset($_POST['categoryName'])){
    $categoryName=$_POST['categoryName'];
    if ($categoryName!=""){
        if ($functions->stringIsValid($categoryName)){
            $categoryRepository->insertCategory($categoryName);
            $message['success']="Successfully added category!!!";
        }else{
            $message['error']="Category name is not valid";
        }

    }else{
        $message['error']="Please write category name!";
    }
}else{
    $message['error']="Something is wrong";
}

echo JSON_encode($message, 256);
