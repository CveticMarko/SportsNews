<?php

include_once ("../Services/DatabaseConnection.php");
include_once ("../Entity/Post.php");

class PostRepository extends DatabaseConnection
{
    public function findPostById($id)
    {
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT * FROM post where id={$id}");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
    public function findPostsByCategoryId($id){
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT * FROM post where category_id={$id} and deleted=0 ORDER BY id DESC LIMIT 10 offset 0");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function insertPost($title,$description,$categoryId,$content,$imageName,$userId)
    {
        $conn = $this->getConnection();
        $conn->query("INSERT INTO post (title,description,category_id,content,image, user_id,deleted) VALUES ('{$title}','{$description}',{$categoryId},'{$content}','{$imageName}',{$userId},0)");

    }
    public function lastPostByCategoryId($categoryId){
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT * FROM post where category_id={$categoryId} and deleted=0 ORDER BY id DESC LIMIT 1 offset 0");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
    public function last1to5PostsByCategoryId($categoryId){
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT * FROM post where category_id={$categoryId} and deleted=0 ORDER BY id DESC LIMIT 4 offset 1");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function otherPostsByCategoryId($categoryId){
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT * FROM post where category_id={$categoryId} and deleted=0 ORDER BY id DESC LIMIT 3000000 offset 5");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function updatePost($postId,$title,$description,$categoryId,$content){
        $conn=$this->getConnection();
        $conn->query("UPDATE post SET title='$title',description='$description',category_id={$categoryId},content='$content' where id='$postId'");
    }
    public function deletePost($postId){
        $conn=$this->getConnection();
        $conn->query("UPDATE post SET deleted=1 where id='$postId'");
    }
}