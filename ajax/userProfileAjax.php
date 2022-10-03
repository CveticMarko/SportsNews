<?php
session_start();
require_once("../Services/DatabaseConnection.php");
require_once('../Services/functions.php');
require_once('../Repository/UserRepository.php');

$myFunctions=new functions();
$db=new DatabaseConnection();
$conn=$db->getConnection();
$repository=new UserRepository();

$message['success']="";
$message['error']="";
$function=$_GET['function'];
if (!$conn) {
    $message['error'] = "not connection";
    echo JSON_encode($message, 256);
    exit();
}

if ($function =='changeData') {

    if (isset($_POST['username']) && isset($_POST['role']) && isset($_POST['id'])) {
        $username = $_POST['username'];
        $role = $_POST['role'];
        $id = $_POST['id'];
        if ($myFunctions->stringIsValid($username)) {
            $repository->updateUser($id, $username, $role);
            $message['success'] = "Successfully changed data";
        } else {
            $message['error'] = 'Username contain an illegal character!!!';
        }
    }
}

if ($function=='changePassword'){
   if (isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['id'])){
       $oldPass=$_POST['oldPass'];
       $newPass=$_POST['newPass'];
       $id=$_POST['id'];
       if ($oldPass!="" && $newPass!=""){
           $user=$repository->findUserById($id);
               if (password_verify($oldPass,$user['password'])){
                  if (!$myFunctions->strongPassword($newPass)){
                      $hashPassword=password_hash($newPassPass, PASSWORD_DEFAULT);
                      $repository->updateUserPassword($id,$hashPassword);

                        $message['success']='Successfully changed password';
                   }else{
                       $message['error']='Your new password is not strong enough';
                   }
               }else{
                   $message['error']='This is not your old password';
               }
           }else{
           $message['error']='All field must be filled!!!';
       }
   }
}
if ($function=='deactiveUser'){
    if (isset($_POST['userId'])){
        $userId=$_POST['userId'];
        $user=$repository->findUserById($userId);
        if ($user['activity']==1){
            $repository->changeActivity($userId,0);
            $message['success']="User is inactive";
        }else{
            $repository->changeActivity($userId,1);

            $message['success']="User is active";
        }
    }else{
        $message['error']="Something is wrong";
    }
}
if ($function=="deleteUser"){
    if (isset($_POST['userId'])){
        $userId=$_POST['userId'];
        $repository->DeleteUser($userId);
        $message['success']="Successfully deleted user";
    }else{
        $message['error']="Something is wrong";
    }
}


echo JSON_encode($message, 256);