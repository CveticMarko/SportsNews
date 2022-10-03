<?php
include_once('../Repository/CategoryRepository.php');
include_once('../Repository/PostRepository.php');
require_once("../Services/DatabaseConnection.php");
session_start();
$function=$_GET['function'];
$postRepository=new PostRepository();
$categoryRepository=new CategoryRepository();
$message['error']="";
$message['success']="";
if ($function=="newPost") {
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['category']) && isset($_POST['content']) && isset($_FILES['file'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $categoryId = $_POST['category'];
        $content = $_POST['content'];
        $image = $_FILES['file'];
        $userId = $_SESSION['user']['id'];
        if ($title != '' && $description != '' && $categoryId != 0 && $content != '') {
            $category = $categoryRepository->findCategoryById($categoryId);
            $imageFolderName = $category['name'];
            $imageName = $imeSlike = microtime(true) . $image['name'];

            if (move_uploaded_file($_FILES['file']['tmp_name'], "../assets/images/{$imageFolderName}/{$imageName}")) {
                $postRepository->insertPost($title, $description, $categoryId, $content, $imageName, $userId);
                $message['success'] = 'Successfully added post';
            } else {
                $message['error'] = 'Image transfer failed';

            }

        } else {
            $message['error'] = 'All field must be filed';
        }
    } else {
        $message['error'] = 'Something is wrong';
    }
}
if ($function=="updatePost"){
        if (isset($_POST['title']) && isset($_POST['categoryId']) && isset($_POST['description']) && isset($_POST['content']) && isset($_POST['postId'])){
            $title=$_POST['title'];
            $description=$_POST['description'];
            $categoryId=$_POST['categoryId'];
            $content=$_POST['content'];
            $postId=$_POST['postId'];
            if ($categoryId!="") {
                if ($title!="" && $description!="" && $content!="") {
                    $postRepository->updatePost($postId,$title,$description,$categoryId,$content);
                    $message['success'] = "successfully update post";
                }else{
                    $message['error']="All field must be filed";
                }
            }else{
                $message['error']="Select a category";
            }
        }else{
            $message['error']="Something is wrong";
        }

}
if ($function=="deletePost"){
    if (isset($_POST['id'])){
        $postId=$_POST['id'];
        $postRepository->deletePost($postId);
        $message['success']="Successfully deleted post";
    }else{
        $message['error']="Something is wrong";
    }
}


echo JSON_encode($message, 256);
