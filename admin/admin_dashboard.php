<?php
session_start();

require '../includes/config.php';
require '../includes/function.php';

checkAdminAccess();

include '../includes/header.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet"> <!-- CSS dosyasını burada ekliyoruz -->
    <title>Admin Paneli</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Paneli</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $BASE_URL; ?>index.php">Anasayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ayarlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../user/logout.php">Çıkış Yap</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="admin_dashboard.php?page=add_blog" class="list-group-item list-group-item-action">
                        <i class="fas fa-plus"></i> Yeni Blog Ekle
                    </a>
                    <a href="admin_dashboard.php?page=lists_blog" class="list-group-item list-group-item-action">
                        <i class="fas fa-list"></i> Blogları Listele
                    </a>
                    <a href="admin_dashboard.php?page=lists_comments" class="list-group-item list-group-item-action">
                        <i class="fas fa-comments"></i> Yorumları Listele
                    </a>
                    <a href="admin_dashboard.php?page=lists_users" class="list-group-item list-group-item-action">
                        <i class="fas fa-users"></i> Kullanıcıları Listele
                    </a>
                </div>
            </div>
            
            <!-- Content Area -->
            <div class="col-md-9">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <?php
                            switch($page){
                                case 'add_blog':
                                    include 'add_blog.php';
                                    break;
                                case 'lists_blog':
                                    include 'lists_blogs.php';
                                    break;
                                case 'lists_comments':
                                    include 'list_comments.php';
                                    break;
                                case 'lists_users':
                                    include 'list_users.php';
                                    break;
                                default:
                                echo '<h1>Admin Paneline Hoşgeldiniz</h1><p>Burada admin paneli içeriklerini yönetebilirsiniz.</p>';
                                break;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
