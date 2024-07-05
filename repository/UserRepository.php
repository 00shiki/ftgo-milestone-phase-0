<?php

require_once "Repository.php";

class UserRepository extends Repository {

    public function getUserById($userID) {
        $query = $this->db->prepare("SELECT first_name, last_name, email FROM users WHERE user_id = ?");
        $query->bind_param("i", $userID);
        if ($query->execute() === false) {
            $query->close();
            return false;
        }
        $user = $query->get_result()->fetch_row();
        if ($user === false) {
            $query->close();
            return false;
        }
        return $user;
    }

    private function getUserByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $query->bind_param("s", $email);
        if ($query->execute() === false) {
            $query->close();
            return false;
        }
        $user = $query->get_result()->fetch_row();
        if ($user === false) {
            $query->close();
            return false;
        }
        $query->close();
        return $user;
    }

    public function register($firstName, $lastName, $email, $password) {
        $query = $this->db->prepare("
            INSERT INTO users (first_name, last_name, email, password) 
            VALUES (?, ?, ?, ?)");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query->bind_param("ssss", $firstName, $lastName, $email, $password);
        if ($query->execute() === false) {
            $query->close();
            return false;
        }
        $query->close();
        return true;
    }

    public function login($email, $password) {
        $user = $this->getUserByEmail($email);
        if ($user === false) {
            return false;
        }
        if (password_verify($password, $user[4]) === false) {
            return false;
        }
        return $user[0];
    }
}
