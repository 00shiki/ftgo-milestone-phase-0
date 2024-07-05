<?php

require_once "Repository.php";

class CartRepository extends Repository {

    public function getUserCarts($userID) {
        $query = "
            SELECT 
                c.name, c.price, carts.class_id 
            FROM 
                carts 
            JOIN
                classes c
            ON
                c.class_id = carts.class_id
            WHERE
                carts.user_id = $userID";
        $result = $this->db->query($query);
        return $result;
    }

    public function addClassToCart($userID, $classID) {
        $query = $this->db->prepare("INSERT INTO carts (user_id, class_id) VALUES (?, ?)");
        $query->bind_param("ii", $userID, $classID);
        if ($query->execute() === false) {
            $query->close();
            return false;
        }
        $query->close();
        return true;
    }

    public function removeClassFromCart($userID, $classID) {
        $query = $this->db->prepare("DELETE FROM carts WHERE user_id = ? AND class_id = ?");
        $query->bind_param("ii", $userID, $classID);
        if ($query->execute() === false) {
            $query->close();
            return false;
        }
        $query->close();
        return true;
    }
}