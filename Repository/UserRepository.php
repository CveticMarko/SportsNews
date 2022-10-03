<?php

require_once("../Services/DatabaseConnection.php");

class UserRepository extends DatabaseConnection
{
    public function allUsers(){
        $conn=$this->getConnection();
        $stmt=$conn->query("SELECT * FROM user");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function existUser($username,$email){
        $conn=$this->getConnection();
        $stmt=$conn->query("SELECT * FROM user where username='{$username}' or email='{$email}'");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($data)){
            return true;
        }else{
            return false;
        }
    }
    public function findUserById($id){
        $conn=$this->getConnection();
        $stmt=$conn->query("SELECT * FROM user where id='$id'");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data[0];
    }
        public function activUser($id){
        $conn=$this->getConnection();
        $stmt=$conn->query("SELECT * FROM user where id='$id' and activity='1'");
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($data)){
                return true;
            }else{
                return false;
            }
    }

    public function changeActivity($id,$activity){
        $conn=$this->getConnection();
        $stmt=$conn->query("UPDATE user SET activity='$activity' where id='$id'");
    }

    public function insetUser($username,$email,$password){
        $conn=$this->getConnection();
        $conn->query("INSERT INTO user (email,username,role,password,activity) VALUES ('{$email}','{$username}','user','{$password}',1)");
    }

    public function updateUser($id,$username,$role){
        $conn=$this->getConnection();
        $conn->query("UPDATE user SET username='$username', role='$role' where id='$id'");
    }

    public function updateUserPassword($id,$newPassword ){
        $coon=$this->getConnection();
        $coon->query("UPDATE user SET password='$newPassword' where id='$id'");
    }

    public function DeleteUser($userId){
        $conn=$this->getConnection();
        $conn->query("UPDATE user SET deleted=1, activity=0 where id='$userId'");
    }
}
