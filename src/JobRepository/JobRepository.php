<?php

namespace App\JobRepository;


use App\DataBase\Database;
use PDO;

class JobRepository {
    private Database $db;
    private PDO $pdo;

    public function __construct() {
        $this->db = new Database();
        $this->pdo = $this->db->pdo;
    }

    public function createJob($title, $company_id, $is_active, $salary) {
        $sql = "INSERT INTO jobs (title, company_id, is_active, salary) VALUES (:title, :company_id, :is_active, :salary)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':company_id', $company_id);
        $stmt->bindParam(':is_active', $is_active);
        $stmt->bindParam(':salary', $salary);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function listAllJobs() {
        $sql = "SELECT * FROM jobs";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteJob($id) {
        $sql = "DELETE FROM jobs WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}