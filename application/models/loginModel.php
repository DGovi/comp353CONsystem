<?php
/*Khadija SUBTAIN-40040952*/
/*Matthew GIANCOLA-40019131*/

class loginModel extends databaseService
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
        if ($this->Query("SELECT * FROM entity", [])) {
            return $this->fetchAll();
        }
    }

    /**
     * @param $userId
     * @return fetch : User with provded id
     */
    function getUser($userId)
    {
        if ($this->Query("SELECT * FROM entity WHERE userId = ?", [$userId])) {
            return $this->fetch();
        }
    }
}
