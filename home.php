<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-10px);
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-5">Selamat Datang di Halaman Home</h1>
        
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="baru.png" class="card-img-top" alt="Technology Image">
                    <div class="card-body">
                        <h5 class="card-title">Perkuliahan</h5>
                        <p class="card-text">Jelajahi Dunia kampus dan data anda yang tercatat di sistem</p>
                        <a href="#" class="btn btn-primary">Lebih Lengkap</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="hobi.png" class="card-img-top" alt="Education Image">
                    <div class="card-body">
                        <h5 class="card-title">Hobi</h5>
                        <p class="card-text">Berbagai kegiatan menarik dan pengalaman saya</p>
                        <a href="#" class="btn btn-primary">Lebih Lengkap</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="bisnis.png" class="card-img-top" alt="Business Image">
                    <div class="card-body">
                        <h5 class="card-title">Bisnis dan Inovasi</h5>
                        <p class="card-text">Cari tahu bagaimana bisnis dapat berkembang melalui inovasi dan strategi baru yang efektif.</p>
                        <a href="#" class="btn btn-primary">Lebih Lengkap</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
