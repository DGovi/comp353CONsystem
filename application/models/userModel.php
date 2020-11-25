<?php
/*Khadija SUBTAIN-40040952*/
class userModel extends databaseService
{
    /**
     * @param $userId
     * @param $firstName
     * @param $lastName
     * @param $age
     * @param $email
     * @param $phone
     * @param $entityType
     * @param $userGroup
     * @param $password
     * @return bool
     */
    function insertUser($userId, $firstName, $lastName, $age, $email, $phone, $entityType, $userGroup, $password)
    {
        if ($this->Query("INSERT INTO entity (userId, firstName, lastName, age,email,phone,entityType,user_group, pwrd)
        VALUES(?,?,?,?,?,?,?,?,?)", [$userId, $firstName, $lastName, $age, $email, $phone, $entityType, $userGroup, $password])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $userId
     * @param $firstName
     * @param $lastName
     * @param $age
     * @param $email
     * @param $phone
     * @param $entityType
     * @param $userGroup
     * @param $password
     * @return bool
     */
    function updateUser($userId, $firstName, $lastName, $age, $email, $phone, $entityType, $userGroup, $password)
    {
        if ($this->Query("UPDATE entity SET
        firstName = ?
        ,lastName = ?
        ,age = ?
        ,email = ?
        ,phone = ?
        ,entityType = ?
        ,user_group = ?
        ,pwrd = ?
        WHERE userId = ?", [$firstName, $lastName, $age, $email, $phone, $entityType, $userGroup, $password, $userId])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $userId : User id for the user to be deleted
     */
    function deleteUser($userId){
        return $this->Query("DELETE FROM entity WHERE userId = ?", [$userId]);
    }

    /**
     * @return fetch : ALl users from entity
     */
    function getUsers()
    {
        if ($this->Query("SELECT * FROM entity WHERE user_group = ? AND userId != ?", [false, 0])) {
            return $this->fetchAll();
        }
    }

    /**
     * @param $userId
     * @return fetch : User with provided id
     */
    function getUser($userId)
    {
        if ($this->Query("SELECT * FROM entity WHERE userId = ?", [$userId])) {
            return $this->fetch();
        }
    }

    /**
     * @param $userId
     * @param $pwd
     * @return fetch
     */
    function getEID($userId, $pwd){
        if ($this->Query("SELECT eid, userId, firstName, lastName FROM entity WHERE user_group != ? AND userId = ? AND pwrd = ?", [true, $userId, $pwd])) {
            return $this->fetch();
        }
    }

    /**
     * @param $userId
     * @return fetch : User with provded id
     */
    function checkUser($userId, $pwd)
    {
        $userId = trim(strip_tags($userId));
        $pwrd = trim(strip_tags($pwd));
        return $this->Query("SELECT * FROM entity WHERE userId = ? AND pwrd = ?", [$userId, $pwd]);
            
    }
}
