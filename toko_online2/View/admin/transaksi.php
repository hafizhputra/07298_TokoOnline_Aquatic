<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Transaksi</title>

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/bootstrap.css" />

  <link rel="stylesheet" href="assets/vendors/iconly/bold.css" />

  <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
  <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css" />
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
        <div class="page-title">
          <h3>Transaksi</h3>
        </div>
      </div>
      <div class="page-content">
        <section class="section">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Transaksi</h4>
            </div>
            <div class="card-body">
              <table class="table table-striped" id="table1">
                <thead>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Transaksi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data as $row) : ?>
                    <tr>
                      <td><?= $row['id_transaksi'] ?></td>
                      <td><?= $row['nama_member'] ?></td>
                      <td><?= $row['tgl_transaksi'] ?></td>
                      
                    
                      <td><?php
                          if ($row['status_transaksi'] == 1) { ?>
                          <span class="badge bg-danger">Menunggu pembayaran</span>
                       
                        <?php } ?>
                      </td>

                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <?php if ($row['status_transaksi'] == 1) : ?>
                            <a href="index.php?page=admin&aksi=kirimTransaksi&id=<?= $row['id_transaksi'] ?>" class="btn btn-primary">konfirmasi</a>
                          <?php endif; ?>
                        </div>
                        
                      </td>
                   
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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
  <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
  <script>
    // Simple Datatable
    let table1 = document.querySelector("#table1");
    let dataTable = new simpleDatatables.DataTable(table1);
  </script>
</body>

</html>