<?php
require_once "../model/gitar.php";
require_once "../class/toko.php";
session_start();

if (!isset($_SESSION['toko-gitar'])) {
    $_SESSION['toko-gitar'] = new Toko();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['create'])) {
        $nama = $_POST['nama'];
        $kayu = $_POST['kayu'];
        $senar = $_POST['senar'];
        $harga = $_POST['harga'];
        $merek = $_POST['merek'];
        $id = $_POST['id'];

        $item = new GitarListrik($nama, $kayu, $senar, $harga, $merek, $id);
        $_SESSION['toko-gitar']->create($item);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Music Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                NoteSociety
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="tambah.php">Tambah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalLabelHapus" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabelHapus">Hapus Gitar?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="php/delete.php" method="POST">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus Gitar ini?</p>
                        <input type="hidden" name="id" id="idGitar" value="" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" name="delete" class="btn btn-success">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="card my-3">
            <div class="card-header bg-success">
                Tambahkan
            </div>
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Gitar</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="senar" class="form-label">Senar</label>
                        <input type="text" class="form-control" id="senar" name="senar" required>
                    </div>
                    <div class="mb-3">
                        <label for="kayu" class="form-label">Jenis Kayu</label>
                        <input type="text" class="form-control" id="kayu" name="kayu" required>
                    </div>
                    <div class="mb-3">
                        <label for="merek" class="form-label">Merek</label>
                        <input type="text" step="1" class="form-control" id="merek" name="merek" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" step="1" class="form-control" id="harga" name="harga" required>
                    </div>
                    <button type="submit" name="create" class="btn btn-success"><i class="bi bi-plus"></i></button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>