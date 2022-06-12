<?php
class AdminController
{
    private $model;

    public function __construct()
    {
        $this->model = new AdminModel();
    }

    public function index()
    {
        $jumlahmenu = $this->model->jumlahMenu();
        extract($jumlahmenu);
        $jumlahkategori = $this->model->jumlahKategori();
        extract($jumlahkategori);
        // $success = $this->model->jumlahTransaksiSelesai();
        // extract($success);
        $proses = $this->model->jumlahTransaksiproses();
        extract($proses);
        $pelanggan = $this->model->jumlahPelanggan();
        extract($pelanggan);
        require_once("View/admin/index.php");
    }

    // -----> view produk 
    public function produk()
    {
        $produk = $this->model->getProduk();
        $kategori = $this->model->getKategoriProduk();
        extract($produk);
        extract($kategori);
        require_once("View/admin/daftarProduk.php");
    }

    // -----> insert produk 
    public function storeProduk()
    {
        $id_kategori = $_POST['id_kategori'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['image']['tmp_name'];
        $lokasi = __DIR__ . '/../upload/';
        $namaFile = $nama . ".jpg";
        $stok = $_POST['stok'];

        //move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../upload/' . $namaFile);
        if (move_uploaded_file($gambar, $lokasi . $namaFile)) {
            $query = $this->model->prosesStoreProduk($id_kategori, $namaFile, $nama, $harga, $stok);
            if ($query) {
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=berhasil daftar");
            } else {
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=gagal daftar");
            }
        } else {
            // echo ;
            header("location: index.php?page=admin&aksi=daftarProduk&pesan=gagal upload");
        }
    }

    public function deleteProduk()
    {
        $id = $_GET['id'];
        $getgambar = $this->model->getGambarProduk($id);
        $data = $getgambar['gambar_produk'];
        $lokasi = __DIR__ . '/../upload/';
        if (file_exists($lokasi . $data)) {
            unlink($lokasi . $data);
            if ($this->model->prosesDeleteProduk($id)) {
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=berhasil hapus");
            } else {
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=Gagal hapus");
            }
        }
    }

    public function editProduk()
    {
        $id = $_GET['id'];
        $data = $this->model->getProdukById($id);
        $kategori = $this->model->getKategoriProduk();
        extract($data);
        extract($kategori);
        require_once("View/admin/editProduk.php");
    }

    public function updateProduk()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $id_kategori = $_POST['id_kategori'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $namagambar = $_FILES['image']['name'];
        $getgambar = $_POST['namafoto'];
        $namaFile = $nama . ".jpg";
        $lokasi = __DIR__ . '/../upload/';
        if (isset($namagambar)) {

            $gambar = $_FILES['image']['tmp_name'];

            if (file_exists($lokasi . $getgambar)) {
                unlink($lokasi . $getgambar);
                if (move_uploaded_file($gambar, $lokasi . $namaFile)) {
                    if ($this->model->prosesUpdateProduk($id, $nama, $id_kategori, $harga, $namaFile, $stok)) {
                        header("location: index.php?page=admin&aksi=daftarProduk&pesan=Berhasil Ubah Data");
                    } else {
                        unlink($lokasi . $namaFile);
                        header("location: index.php?page=admin&aksi=daftarProduk&pesan=Gagal Ubah Data");
                    }
                } else {
                    header("location: index.php?page=admin&aksi=daftarProduk&pesan=Gagal Upload Gambar");
                }
            } else {
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=Gagal Menghapus Gambar lama");
            }
        } else {
            $namaFile = $getgambar;
            if ($this->model->prosesUpdateProduk($id, $nama, $id_kategori, $harga, $namaFile, $stok)) {
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=Berhasil Ubah Data&id");
            } else {
                unlink($lokasi . $namaFile);
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=Gagal Ubah Data");
            }
        }
    }



    public function storeKategori()
    {
        $nama = $_POST['nama'];
        if ($this->model->prosesStoreKategori($nama)) {
            header("location: index.php?page=admin&aksi=daftarProduk&pesan=berhasil daftar");
        } else {
            header("location: index.php?page=admin&aksi=daftarProduk&pesan=gagal daftar");
        }
    }

    public function deleteKategori()
    {
        $id = $_GET['id'];
        if ($this->model->prosesDeleteKategori($id)) {
            header("location: index.php?page=admin&aksi=daftarProduk&pesan=berhasil hapus jenis produk");
        } else {
            header("location: index.php?page=admin&aksi=daftarProduk&pesan=Gagal hapus jenis produk");
        }
    }

    public function pelanggan()
    {
        $pelanggan = $this->model->getPelanggan();
        extract($pelanggan);
        require_once("View/admin/daftarPelanggan.php");
    }

    public function deletePelanggan()
    {
        $id = $_GET['id'];
        if ($this->model->prosesdeletePelanggan($id)) {
            header("location: index.php?page=admin&aksi=daftarPelanggan&pesan=berhasilhapus");
        } else {
            header("location: index.php?page=admin&aksi=daftarPelanggan&pesan=Gagalhapus");
        }
    }

    public function transaksi()
    {
        $data = $this->model->getTransaksi();
        extract($data);
        require_once("View/admin/transaksi.php");
    }

    public function kirimtransaksi()
    {
        $id = $_GET['id'];
        if ($this->model->prosesKirimTransaksi($id)) {
            header("location: index.php?page=admin&aksi=transaksi&pesan=berhasilkirim");
        } else {
            header("location: index.php?page=admin&aksi=transaksi&pesan=Gagalkirim");
        }
    }

 

}
