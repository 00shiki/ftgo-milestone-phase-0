<?php

require_once "Repository.php";

class ClassRepository extends Repository {

    public function getClasses() {
        $query = "SELECT * FROM classes";
        $result = $this->db->query($query);
        return $result;
    }

    public function getClassById($classID) {
        $query = $this->db->prepare("SELECT * FROM classes WHERE class_id = ?");
        $query->bind_param("i", $classID);
        if ($query->execute() === false) {
            $query->close();
            return false;
        }
        $class = $query->get_result()->fetch_row();
        if ($class === false) {
            $query->close();
            return false;
        }
        $query->close();
        return $class;
    }

}