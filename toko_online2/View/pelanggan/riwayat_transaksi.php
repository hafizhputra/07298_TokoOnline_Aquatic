<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div class="container">
        <div class="page-heading">
            <h3>Riwayat Transaksi</h3>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daftar Transaksi </h4>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th class="col-2">ID transaksi</th>
                                                <th class="col-3">Tanggal Transaksi</th>
                                                <th class="col-3">Status Transaksi </th>
                                              
                                                <th class="col-4">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data)) : ?>

                                                <?php foreach ($data as $row) : ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?= $row['id_transaksi'] ?></td>
                                                        <td class="text-bold-500"><?= $row['tgl_transaksi'] ?></td>
                                                        <td><?php
                                                            if ($row['status_transaksi'] == 1) { ?>
                                                                <span class="badge bg-danger">Belum Bayar</span>
                                                            <?php } else if ($row['status_transaksi'] == 2) { ?>
                                                                <span class="badge bg-warning">menunggu konfirmasi pembayaran</span>
                                                            <?php } else if ($row['status_transaksi'] == 3) { ?>
                                                                <span class="badge bg-success">Lunas</span>
                                                            <?php } else if ($row['status_transaksi'] == 4) { ?>
                                                                <span class="badge bg-success">kosong</span>
                                                            <?php } ?>
                                                        </td>


                                                        <td>
                                                            <?php if ($row['status_transaksi'] == 1) : ?>
                                                                <a href="index.php?page=pelanggan&aksi=pembayaran&id=<?= $row['id_transaksi'] ?>" class="btn btn-success">Bayar</a>
                                                            
                                                            <?php endif; ?>
                                                        </td>
                                                  
                                                  
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <div class="alert alert-danger alert-dismissible show fade">
                                                    Data Kosong
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


</body>

</html>