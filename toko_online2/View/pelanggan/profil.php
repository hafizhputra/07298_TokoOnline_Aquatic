<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div class="container">
        <div class="page-heading">
            <h3>Profil</h3>
        </div>
        <div class="page-content">
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Profil</h4>
                            </div>
                            <center>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="index.php?page=pelanggan&aksi=updateProfil" method="POST">
                                            <input type="hidden" name="id" value="<?= $data['id_member'] ?>">
                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-md-2">
                                                        <label>Nama</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="nama" id="first-name-icon" name="nama" value="<?= $data['nama_member'] ?>">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Password</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="password" name="password" value="<?= $data['password_member'] ?>">
                                                                <div class=" form-control-icon">
                                                                    <i class="bi bi-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                 

                                                    <div class="col-md-2">
                                                        <label>Username</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="username" id="first-name-icon" name="username" value="<?= $data['username_member'] ?>">
                                                                <div class=" form-control-icon">
                                                                    <i class="bi bi-person-circle"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                 

                                                    <div class="col-md-2">
                                                        <label>Nomor handphone</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Nomor handphone" name="notelp" value="<?= $data['notelp_member'] ?>">
                                                                <div class=" form-control-icon">
                                                                    <i class="bi bi-phone"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="alamat" id="first-name-icon" name="alamat" value="<?= $data['alamat_member'] ?>">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-map"></i>
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