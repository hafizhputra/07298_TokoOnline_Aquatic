<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Layout Vertical 1 Column - Mazer</title> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <!-- <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="index.html"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="index.html">
                <img src="assets/images/logo/logo.png">
            </a>
        </div>
    </nav> -->


    <div class="container">
        <div class="page-heading">
            <h3>Pembayaran</h3>
        </div>
        <div class="page-content">
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Transaksi Pembayaran </h4>
                            </div>
                            <center>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="index.php?page=pelanggan&aksi=storePembayaran" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="</?= $data['id_transaksi'] ?>">
                                            <div class="form-body">
                                                <div class="row">
                                                   
                                                <div class="col-md-2">
                                                        <label>ID transaksi</label>
                                                    </div>
                                                <div class="col-md-10">
                                              
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="id trasaksi" id="first-name-icon" readonly="readonly" name="id" value="<?= $data['id_transaksi'] ?>">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Nominal bayar</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="nominal" name="nominal" readonly="readonly" value="<?= $nominal['total'] ?>">
                                                                <div class=" form-control-icon">
                                                                    <i class="bi bi-cash"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                 
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </center>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


</body>

</html>