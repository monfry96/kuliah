<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row shadow-lg" style="max-width: 800px; width: 90%;">
            <!-- Bagian Kiri: Gambar -->
            <div class="col-md-6 d-none d-md-block p-0">
                <img src="logo.png" alt="Globe Image" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <!-- Bagian Kanan: Form Pendaftaran -->
            <div class="col-md-6 p-5">
                <h2 class="text-center mb-4">Register</h2>
                <form method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>
                <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login di sini</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

                <?php
                    include 'db.php';

                    function register($username, $password) {
                        global $conn;

                        // Cek apakah username sudah ada
                        $sql = "SELECT id FROM baru WHERE username = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $stmt->store_result();

                        if ($stmt->num_rows > 0) {
                            return "<div class='alert alert-danger'>Username sudah digunakan</div>";
                        } else {
                            // Hash password sebelum disimpan
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                            
                            // Insert user baru
                            $sql = "INSERT INTO baru (username, password) VALUES (?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ss", $username, $hashed_password);
                            
                            if ($stmt->execute()) {
                                // Jika registrasi berhasil, redirect ke halaman login
                                header('Location: login.php');
                                exit(); // pastikan script berhenti setelah redirect
                            } else {
                                return "<div class='alert alert-danger'>Registrasi gagal</div>";
                            }
                        }
                    }

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $confirm_password = $_POST['confirm_password'];

                        if ($password === $confirm_password) {
                            $message = register($username, $password);
                        } else {
                            $message = "<div class='alert alert-danger'>Password tidak cocok</div>";
                        }
                        echo isset($message) ? $message : '';
                    }
                ?>
                <form method="post" novalidate>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                        <div class="invalid-feedback">Harap masukkan username.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        <div class="invalid-feedback">Harap masukkan password.</div>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password" required>
                        <div class="invalid-feedback">Harap konfirmasi password.</div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>
                <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login di sini</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    
    <script>
  
        (() => {
            'use strict'
            const forms = document.querySelectorAll('form')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    const password = document.getElementById('password').value;
                    const confirmPassword = document.getElementById('confirm_password').value;

                    if (!form.checkValidity() || password !== confirmPassword) {
                        event.preventDefault();
                        event.stopPropagation();
                        if (password !== confirmPassword) {
                            document.getElementById('confirm_password').setCustomValidity("Password tidak cocok");
                        } else {
                            document.getElementById('confirm_password').setCustomValidity("");
                        }
                    }
                    form.classList.add('was-validated');
                }, false)
            })
        })();
    </script>
</body>
</html>
