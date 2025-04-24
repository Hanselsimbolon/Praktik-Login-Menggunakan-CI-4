<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .dashboard-card {
            transition: 0.3s;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        footer {
            margin-top: auto;
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">My Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="/home">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="/portofolio">Portofolio</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="/logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <div class="container mt-5">
    <h2 class="text-center mb-4">Selamat Datang di Dashboard, <strong><?= session('username') ?></strong>!</h2>
    <div class="row">
        <!-- Profil -->
        <div class="col-md-4 mb-3">
            <div class="card dashboard-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Profil</h5>
                    <p class="card-text">Lihat dan edit data pribadi Anda.</p>
                    <a href="/profile" class="btn btn-outline-primary">Lihat Profil</a>
                </div>
            </div>
        </div>
        <!-- Portofolio -->
        <div class="col-md-4 mb-3">
            <div class="card dashboard-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Portofolio</h5>
                    <p class="card-text">Kumpulan project atau karya kamu.</p>
                    <a href="/portofolio" class="btn btn-outline-primary">Lihat Portofolio</a>
                </div>
            </div>
        </div>
        <!-- Logout -->
        <div class="col-md-4 mb-3">
            <div class="card dashboard-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Logout</h5>
                    <p class="card-text">Keluar dari aplikasi SiJaKu.</p>
                    <a href="/logout" class="btn btn-outline-dark">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Footer -->
    <footer>
        &copy; 2023 My Dashboard. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
