<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Database;
use App\UrlShortener;

header('Content-Type: application/json');

$database = new Database();
$urlShortener = new UrlShortener($database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $originalUrl = filter_var($data['url'], FILTER_SANITIZE_URL);

    if (!filter_var($originalUrl, FILTER_VALIDATE_URL)) {
        echo json_encode(['error' => 'Некорректный URL']);
        exit;
    }

    $shortCode = $urlShortener->createShortUrl($originalUrl);
    echo json_encode(['short_url' => $shortCode]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['code'])) {
    $shortCode = $_GET['code'];
    $originalUrl = $urlShortener->getOriginalUrl($shortCode);

    if ($originalUrl) {
        header("Location: $originalUrl", true, 302);
        exit;
    } else {
        echo json_encode(['error' => 'URL не найден']);
    }
}
?>
