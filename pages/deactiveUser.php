<?php
include_once("../Repository/UserRepository.php");
$repository=new UserRepository();


if (isset($_GET['id'])) {
    $id=$_GET['id'];
    if ($repository->activUser($id)) {
        $repository->changeActivity($id, '0');
    } else {
        $repository->changeActivity($id, '1');
    }
    header("Location: adminPage.php");
    exit();
}