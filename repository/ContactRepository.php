<?php

require_once "Repository.php";

class ContactRepository extends Repository {

    public function createContact($firstName, $lastName, $email, $phoneNumber, $message) {
        $query = $this->db->prepare("
            INSERT INTO contacts (first_name, last_name, email, phone_number, message)
            VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("sssss", $firstName, $lastName, $email, $phoneNumber, $message);
        if ($query->execute()) {
            $result = $query->get_result();
            $query->close();
            return $result;
        } else {
            $query->close();
            return false;
        }
    }
}