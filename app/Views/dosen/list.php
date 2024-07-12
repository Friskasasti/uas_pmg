<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTTXkK8Xz3R4vHNSKw7+c5ty2eX6CIXG+yDh1cBX6H5Rk5knC+oe1kkG0aX9hDOf5EThlrMjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #343a40;
            color: #ffffff;
        }

        .card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #495057;
        }

        .table thead {
            background-color: #007bff;
            color: #fff;
        }

        .table tbody tr:hover {
            background-color: #6c757d;
        }

        .btn-link {
            text-decoration: none;
            color: #007bff;
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        .search-bar {
            width: 100%;
            max-width: 400px;
            background-color: #495057;
            color: #ffffff;
        }

        .search-bar::placeholder {
            color: #ced4da;
        }

        .modal-header {
            background-color: #dc3545;
            color: white;
        }

        .modal-footer .btn-secondary {
            background-color: #6c757d;
        }

        .modal-footer .btn-danger {
            background-color: #dc3545;
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .card-footer {
            background-color: #6c757d;
            color: white;
        }

        .alert {
            background-color: #198754;
            color: white;
        }

        .btn-success {
            background-color: #198754;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="text-center mb-4">Daftar Dosen</h1>

                <?php if (!empty(session()->getFlashdata('message'))) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('message'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <div class="d-flex justify-content-between mb-3">
                    <a href="<?= route_to('Dosen::tambah') ?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
                    <input type="text" class="form-control search-bar" placeholder="Cari Dosen...">
                </div>

                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Data Dosen</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Matkul</th>
                                        <th>Email</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($data as $dosen) : ?>
                                        <tr>
                                            <td><?= $dosen['nama_dosen'] ?></td>
                                            <td><?= $dosen['alamat'] ?></td>
                                            <td><?= $dosen['Matkul'] ?></td>
                                            <td><?= $dosen['email'] ?></td>
                                            <td class="text-center">
                                                <a href="<?= route_to('Dosen::edit', $dosen['id_dosen']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="<?= $dosen['id_dosen']; ?>"><i class="fas fa-trash-alt"></i> Delete</button>
                                                <a href="<?= route_to('Dosen::hadir', $dosen['id_dosen']); ?>" class="btn btn-primary">Hadir</a>
                                        <a href="<?= route_to('Dosen::tidak', $dosen['id_dosen']); ?>" class="btn btn-primary">tidak</a>
                                </td>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-center">
                            <!-- Pagination -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="#" class="btn btn-danger" id="deleteConfirmBtn">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        var deleteConfirmModal = document.getElementById('confirmDeleteModal');
        deleteConfirmModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var deleteBtn = document.getElementById('deleteConfirmBtn');
            deleteBtn.setAttribute('href', '<?= route_to('Dosen::destroy') ?>/' + id);
        });
    </script>
</body>

</html>
