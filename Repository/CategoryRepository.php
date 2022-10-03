<?php

require_once("../Services/DatabaseConnection.php");


class CategoryRepository extends DatabaseConnection {

    public function allCategories(){
        $conn=$this->getConnection();
        $stmt=$conn->query("SELECT * FROM category");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function findCategoryById($id){
        $conn=$this->getConnection();
        $stmt=$conn->query("SELECT * FROM category where id={$id}");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
    public function insertCategory($categoryName){
        $conn=$this->getConnection();
        $conn->query("INSERT INTO NBA.category (name) VALUE ('{$categoryName}')");
    }
    public function first7categories(){
        $conn=$this->getConnection();
        $stmt=$conn->query("SELECT * FROM category ORDER BY id LIMIT 7");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function otherCategories(){
        $conn=$this->getConnection();
        $stmt=$conn->query("SELECT * FROM category LIMIT 50 offset 7");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}