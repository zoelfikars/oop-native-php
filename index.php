<?php
require_once "class/toko.php";
require_once "model/gitar.php";
session_start();

if (!isset($_SESSION['toko-gitar'])) {
    $_SESSION['toko-gitar'] = new Toko();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            if (isset($_SESSION['toko-gitar'])) {
                $_SESSION['toko-gitar']->delete($id);
            }
        }
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
            <a class="navbar-brand" href="index.php">
                NoteSociety
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="pages/tambah.php">Tambah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Hapus Gitar?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus Gitar ini?</p>
                        <input type="hidden" name="id" id="id" value="" />
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
        <table id="tabel" class="table table-bordered" style="width:100%">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Nama Gitar</th>
                    <th>Senar</th>
                    <th>Jenis Kayu</th>
                    <th>Merek</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION['toko-gitar']->getAll() as $products) {
                    echo "<tr>";
                    echo "<td>" . $products->getID() . "</td>";
                    echo "<td>" . $products->getName() . "</td>";
                    echo "<td>" . $products->getString() . "</td>";
                    echo "<td>" . $products->getWood() . "</td>";
                    echo "<td>" . $products->getBrand() . "</td>";
                    echo "<td>" . $products->getPrice() . "</td>";
                    echo "<td>
                    <a type='button' class='btn btn-danger btn-hapus' data-bs-toggle='modal' data-bs-target='#modal' data-id='" . $products->getID() . "'>Hapus</a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>