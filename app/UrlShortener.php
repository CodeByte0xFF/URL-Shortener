<?php

namespace App;

use PDO;

class UrlShortener {
    private object $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    private function generateShortCode(): string {
        return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 5);
    }

    public function createShortUrl($originalUrl): string{
        $stmt = $this->db->prepare("SELECT short_code FROM urls WHERE original_url = :url");
        $stmt->execute([':url' => $originalUrl]);
        $existingUrl = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUrl) {
            return $existingUrl['short_code'];
        }

        do {
            $shortCode = $this->generateShortCode();
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM urls WHERE short_code = :code");
            $stmt->execute([':code' => $shortCode]);
        } while ($stmt->fetchColumn() > 0);

        $stmt = $this->db->prepare("INSERT INTO urls (original_url, short_code) VALUES (:url, :code)");
        $stmt->execute([':url' => $originalUrl, ':code' => $shortCode]);

        return $shortCode;

    }

    public function getOriginalUrl($shortCode): string|null {
        $stmt = $this->db->prepare("SELECT original_url FROM urls WHERE short_code = :code");
        $stmt->execute([':code' => $shortCode]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['original_url'] ?? null;
    }
}
