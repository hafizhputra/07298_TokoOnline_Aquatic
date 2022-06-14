<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Produk</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css" />

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
</head>

<body>
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Kategori</h3>
            </div>
            <div class="page-content">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Kategori</h4>
                                    <div class="col-12 d-flex justify-content-start mt-4 mb-2">
                                        <a href="index.php?page=admin&aksi=daftarProduk" class="btn btn-success">Kembali</a>
                                    </div>
                                    <form class="form" action="index.php?page=admin&aksi=updateKategori" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <input type="hidden" name="id" value="<?= $data['id_kategori'] ?>">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="readonlyInput">Id Kategori</label>
                                                    <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= $data['id_kategori'] ?>" name="id">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Nama kategori</label>
                                                    <input type="text" id="last-name-column" class="form-control" placeholder="Input Nama Kategori" value="<?= $data['nama_kategori'] ?>" name="nama">
                                                </div>
                                            </div>

                            

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Kirim Perubahan</button>
                                                <button type="reset" class="btn btn-light-secondary mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>