<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #fce4ec);
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 60px;
        }

        .card {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #6200ea;
            color: white;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            border-top-left-radius: 1.5rem;
            border-top-right-radius: 1.5rem;
        }

        .btn-success {
            background-color: #03dac6;
            border: none;
            transition: background 0.3s;
        }

        .btn-success:hover {
            background-color: #03a9f4;
        }

        .alert {
            background-color: #ff3d00;
            color: white;
        }

        .form-control {
            border-radius: 1rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #6200ea;
            box-shadow: 0 0 5px rgba(98, 0, 234, 0.5);
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>REGISTER DOSEN</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty(session()->getFlashdata('message'))) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    <?php foreach (session()->getFlashdata('message') as $error) : ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>

                        <a href="<?= route_to('Dosen::index') ?>" class="btn btn-warning mb-3">Kembali</a>

                        <form method="post" action="/dosen/simpan">
                            <div class="mb-4">
                                <label for="nama_dosen" class="form-label">Nama Dosen</label>
                                <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" placeholder="Masukkan Nama Dosen" required>
                            </div>
                            <div class="mb-4">
                                <label for="Matkul" class="form-label">Matkul</label>
                                <input type="text" name="Matkul" id="Matkul" class="form-control" placeholder="Masukkan Mata Kuliah" required>
                            </div>
                            <div class="mb-4">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" required>
                            </div>

                            <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        </form>
                    </div>
                </div>
                <div class="footer">
                    <p>&copy; 2024 Sistem Pakar</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
