// app/Views/dashboard.php
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white">
<div class="container mt-5">
    <h3>Halo, <?= session()->get('username') ?></h3>
    <a href="/logout" class="btn btn-danger mt-3">Logout</a>
</div>
</body>
</html>
