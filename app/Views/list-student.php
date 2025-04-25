<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Students</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh; /* Pastikan halaman memiliki tinggi minimal 100% dari viewport */
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #0d6efd;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .footer {
            background-color: rgb(56, 51, 51);
            color: white;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }
        .container {
            flex: 1; /* Biarkan konten utama mengisi ruang tersisa */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/list-student">List Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2 style="text-align: center;">Student Report</h2>
        <h3 style="text-align: center;">Online Web Tutor - Export Excel in CodeIgniter 4 Tutorial</h3>

        <div class="panel panel-primary">
            <div class="panel-heading">
                Student Report
                <a href="<?= base_url('student/download-report') ?>" class="btn btn-info pull-right" style="margin-top: -7px;">Download Excel Report</a>
                <a href="<?= base_url('student/generate-pdf') ?>" class="btn btn-danger pull-right" style="margin-top: -7px; margin-right: 10px;">Generate PDF</a>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Branch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($students) && count($students) > 0): ?>
                            <?php $count = 1; ?>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= esc($student['name']) ?></td>
                                    <td><?= esc($student['email']) ?></td>
                                    <td><?= esc($student['mobile']) ?></td>
                                    <td><?= esc($student['branch']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">No students found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2023 My Dashboard. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>