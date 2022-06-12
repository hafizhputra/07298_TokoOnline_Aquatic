<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kepelangganan</title>

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
        <h3>Ke pelangganan</h3>
      </div>
      <div class="page-content">
        <section class="section">
          <div class="row" id="table-hover-row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Data Pelanggan</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover mb-0">
                        <thead>
                          <tr>
                            <th>NAMA</th>
                            <th>USERNAME</th>
                            <th>PASSWORD</th>
                            <th>NO TELP</th>
                            <th>ALAMAT</th>
                            <th>AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($pelanggan as $item) : ?>
                            <tr>
                              <td><?= $item['nama_member'] ?></td>
                              <td><?= $item['username_member'] ?></td>
                              <td><?= $item['password_member'] ?></td>
                              <td><?= $item['notelp_member'] ?></td>
                              <td><?= $item['alamat_member'] ?></td>
                              <td>
                                <a href="index.php?page=admin&aksi=hapusPelanggan&id=<?= $item['id_member'] ?>" class="btn btn-danger">Hapus</a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
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