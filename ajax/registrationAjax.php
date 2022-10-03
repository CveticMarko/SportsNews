<?php

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

if(!$conn){
    $message['error']="not connection";
    echo JSON_encode($message, 256);
    exit();
}
    if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['pass'])){
        $username=$_POST['username'];
        $password=$_POST['pass'];
        $repPassword=$_POST['repp'];
        $email=$_POST['email'];
        if ($username!="" && $email!="" && $password!="" && $repPassword!=""){
            if ($myFunctions->stringIsValid($email) && $myFunctions->stringIsValid($username)){
                if (!$repository->existUser($username,$email)){
                    if (!$myFunctions->strongPassword($password)){
                        if($password == $repPassword){
                            $hashPassword=password_hash($password, PASSWORD_DEFAULT);
                                $repository->insetUser($username,$email,$hashPassword);
                                $message['success']="You have successfully registered";
                            }else{
                                $message['error']='Passwords must be equal';
                            }
                        }else{
                            $message['error']='The password is not strong enough!!!';
                        }
                }else{
                    $message['error']='There is a user with this email or username!!!';
                }
            }else{
                $message['error']='Username or email contain an illegal character!!!';
            }
        }else{
            $message['error']='All field must be filled!!!';
        }
    }

echo JSON_encode($message, 256);

