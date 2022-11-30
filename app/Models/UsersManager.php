<?php

namespace App\Models;

use PDO;
/**
 * Encapsulates the UsersManager
 */
class UsersManager extends Model
{
    /**
     * add a user in de database
     * @param array $newUser new User datas
     * @param int $newUser new User account validation key
     */
    public function addUser(array $newUser, int $validationKey)
    {
        $sql = 'INSERT INTO users (name, firstname, email, password, validation_key ) 
        VALUES (:name, :firstname, :email, :password, :validation_key)';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute([
            "name" => $newUser["name"],
            "firstname" => $newUser["firstname"],
            "email" => $newUser["email"],
            "password" => $newUser["password"],
            "validation_key" => $validationKey
        ]);
        $stmt->closeCursor();
    }
    /**
     * deletes a user in database
     * @param int $id the user id
     */
    public function deleteUser(int $id): void
    {
        $sql = 'DELETE FROM users WHERE id = ?';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute([$id]);
        $stmt->closeCursor();
    }
    /**
     * activates New user account in data base
     * @param string $email new user email
     */
    public function activateUserAccount(string $email)
    {
        $sql = "UPDATE users SET is_actived=? WHERE email=?" ;
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute([1, $email]);
        $stmt->closeCursor();
    }
    /**
     * edits the user statuts in the data base
     * @param string $email user email
     * @param int $statut user statut 0 or 1
     */
    public function editUserStatut(string $email,int $statut)
    {
        $sql = "UPDATE users SET is_admin=". $statut ." WHERE email=" . $email ;
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute();
        $stmt->closeCursor();
    }
    /**
     * gets all User informations from data base
     * @param string $email user email
     */
    public function getUserInformation(string $email)
    {
        $sql = "SELECT * FROM users WHERE (email=:email)";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $datas = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }
    /**
     * Gets all Users informations
     */
    public function getUsersList(): array
    {
        $sql = 'SELECT * FROM users ORDER BY created_at DESC';
        $stmt = $this->getPdo()->query($sql);
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }
    /**
     * gets the user password from his email
     * @param string $email user email
     */
    public function getPasswordUser(string $email)
    {
        $sql = "SELECT password FROM users WHERE (email=:email)";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $datas = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas ? $datas["password"] : false;
    }
    /**
     * checks if the password is the same as the one in the database
     * @param string $email user email
     * @param string $email user password
     */
    public function isCombinaisonValide(string $email, string $password)
    {
        $passwordBD = $this->getPasswordUser($email);
        return password_verify($password, $passwordBD);
    }
    /**
     * checks if the user has an active account
     * @return bool true or false
     * @param string $email user email
     */
    public function hasAnActivedAccount(string $email): bool
    {
        $sql = "SELECT is_actived FROM users WHERE (email=:email)";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $datas = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return ((int)$datas["is_actived"] === 1);
    }
    /**
     * checks if the ueser has an actived account
     * @param string $email user email
     */
    public function isAnAdminAccount(string $email): bool
    {
        $sql = "SELECT is_admin FROM users WHERE (email=:email)";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $datas = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return ((int)$datas["is_admin"]);
    }
}
