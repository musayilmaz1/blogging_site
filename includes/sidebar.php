<?php
require 'config.php';

$categoriesStmt = $pdo->query("SELECT * FROM categories");
$categories = $categoriesStmt->fetchAll();

$recentBlogsStmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 5");
$recentBlogs = $recentBlogsStmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/sidebar.css"> <!-- Harici CSS dosyası -->
    <title>Blog Sidebar</title>
</head>
<body>
    <div class="col-md-3">
        <div class="col-md-10">
            <h2 class="mb-3">Kategoriler</h2>
            <ul class="list-group category-list">
                <li class="list-group-item">
                    <a href="index.php">Tüm Bloglar</a>
                </li>
                <?php foreach ($categories as $category): ?>
                    <li class="list-group-item">
                        <a href="index.php?category=<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <h5 class="mt-4 mb-3">Son Paylaşılan Bloglar</h5>
            <ul class="list-group recent-blog-list">
                <?php foreach ($recentBlogs as $blogItem): ?>
                    <li class="list-group-item">
                        <a href="blog_detail.php?id=<?php echo $blogItem['id']; ?>"><?php echo htmlspecialchars($blogItem['title']); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
