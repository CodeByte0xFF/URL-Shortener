<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'URL Shortener'; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="img/favicon.webp" type="image/x-icon">
</head>
<body>
<div class="container mt-5">
    <h1 class="display-4 text-center mb-4 fw-bold custom-title">URL Shortener</h1>
    <div class="card p-4 custom-card shadow">
        <form id="urlForm">
            <div class="mb-3">
                <label for="urlInput" class="form-label h3 fw-bold custom-font">Введите URL-адрес</label>
                <input type="text" id="urlInput" class="form-control custom-font" placeholder="http://example.com/your/path" >
            </div>
            <button type="submit" class="btn btn-dark btn-lg d-flex align-items-center mx-auto d-block rounded custom-font">
                Сгенерировать ссылку
                <i class="bi bi-link-45deg ms-2"></i>
            </button>
        </form>
        <div id="result" class="mt-4 text-center custom-font"></div>
        <p class="text-center mt-3 custom-font">&copy;. <?php echo date('Y'); ?> URL Shortener.</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
