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

if(!$conn){
    $message['error']="not connection";
    echo JSON_encode($message, 256);
    exit();
}
    if (isset($_POST['email']) && isset($_POST['pass'])) {
        $email = $_POST['email'];
        $password = $_POST['pass'];
        if ($email != '' && $password != '') {
            if ($myFunctions->stringIsValid($email) && $myFunctions->stringIsValid($password)) {
                $query = "SELECT * FROM user where email='{$email}'";
                $stmt = $conn->query($query);
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $newData = $data[0];
                if (!empty($newData)) {
                    if (password_verify($password, $newData['password'])) {
                        if ($newData['deleted'] == 0) {
                            $repository->changeActivity($newData['id'],1);
                            $_SESSION['user']['id'] = $newData['id'];
                            $_SESSION['user']['datas'] = $newData['firstName'] . " " . $newData['lastName'];
                            $_SESSION['user']['username'] = $newData['username'];
                            $_SESSION['user']['role'] = $newData['role'];
                            $_SESSION['user']['email'] = $red->email;
                            if ($newData['role'] == 'admin') {
                                $message['success'] = 'adminPage.php';
                            } else {
                                $message['success'] = '../index.php';
                            }
                        } else {
                            $message['error'] = 'Your profile is deleted';
                        }
                    } else {
                        $message['error'] = 'Wrong password';
                    }
                } else {
                    $message['error'] = 'Wrong email';
                }
            } else {
                $message['error'] = 'Datas is not valid';
            }
        } else {
            $message['error'] = 'All field must be filled';
        }
    } else {
        $message['error'] = 'Wrong approach';
    }

echo JSON_encode($message, 256);

?>