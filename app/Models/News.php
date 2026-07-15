<?php


namespace App\Models;

use PDO;

class News
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }


    public function getPaginatedList(int $limit, int $offset): array
    {
        $sql = "SELECT id, date, title, announce, image 
                FROM news 
                ORDER BY date DESC 
                LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function getTotalCount(): int
    {
        return (int) $this->db->query("SELECT COUNT(*) FROM news")->fetchColumn();
    }


    public function getById(int $id): ?array
    {

        $sql = "SELECT id, date, title, announce, content, image FROM news WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $news = $stmt->fetch();
        return $news ? $news : null;
    }


    public function getLatestNews(): ?array
    {
        $sql = "SELECT id, title, announce, image FROM news ORDER BY date DESC LIMIT 1";
        $news = $this->db->query($sql)->fetch();
        return $news ? $news : null;
    }
}
