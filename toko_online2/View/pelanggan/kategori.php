<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produk</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/bootstrap.css" />
  <!-- <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" /> -->
  <link rel="stylesheet" href="assets/css/app.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
  <link rel="shortcut icon" href="assets/images/logo/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/whatsapp.css" />
</head>

<body>

<!---: icon whatsupp -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://wa.me/qr/MSHC5OAWNKHQE1" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>


<br>
  <div class="container">
    <div class="row">
      <?php foreach ($kategoribyid as $item) : ?>
        <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
          <div class="card">
            <img src="upload/<?= $item['gambar_produk'] ?>" class="card-img-top img-fluid" alt="singleminded" />
            <div class="card-body ">
              <h5 class="card-title"><?= $item['nama_produk'] ?></h5>
              <p class="card-text"><?= formatRupiah($item['harga_produk']) ?></p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <a href="index.php?page=pelanggan&aksi=tambahKeranjang&id=<?= $item['id_produk'] ?>" id="addtocart" class="btn btn-success">Add to Cart</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

</body>

</html>