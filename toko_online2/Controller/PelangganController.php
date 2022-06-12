<?php
class PelangganController
{
    private $model;

    public function __construct()
    {
        $this->model = new PelangganModel();
    }

    // -----> data produk 
    public function index()
    {
        $produk = $this->model->getProduk();
        extract($produk);
        $kategori = $this->model->getKategori();
        extract($kategori);
        require_once("View/pelanggan/index.php");
    }




    // -----> data produk dan parameter
    public function getDataProdukById()
    {
        $id = $_GET['id'];
        $produkbyid = $this->model->getProdukById($id);
        extract($produkbyid);
        require_once("View/pelanggan/index.php");
    }


        // -----> data kategori dan parameter
        public function getDataKategoriById()
        {
            $id = $_GET['id'];
            $kategoribyid = $this->model->getKategoriById($id);
            extract($kategoribyid);
            require_once("View/pelanggan/kategori.php");
        }

    // -----> edit produk 
    public function edit()
    {
        $id = $_SESSION['username_member']['id_member'];
        $data = $this->model->get($id);
        extract($data);
        require_once("View/pelanggan/profil.php");
    }

    // -----> update produk 
    public function update()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $no_telp = $_POST['notelp'];
        $alamat = $_POST['alamat'];
        if ($this->model->ProsesUpdateProfil($id, $nama,$password , $username, $no_telp,$alamat)) {
            header("location: index.php?page=pelanggan&aksi=view&pesan=Berhasil Ubah Data");
        } else {
            header("location: index.php?page=pelanggan&aksi=edit&pesan=Gagal Ubah Data");
        }
    }

 
    // -----> keranjang 
    public function keranjang()
    {
        $id = $_SESSION['username_member']['id_member'];
        $data = $this->model->getCart($id);
        if (!empty($data)) {
            extract($data);
        }
        require_once("View/pelanggan/keranjang.php");
    }

    // -----> input keranjang 
    public function inputKeranjang()
    {
        $id = $_GET['id'];
      
        $idpembeli = $_SESSION['username_member']['id_member'];
        // echo $idpembeli;
        // die();
        if (empty($this->model->cekTrx($idpembeli))) {
            // echo "tes";
            // die();
            $this->model->prosesTransaksiawal($idpembeli, $id);
        } else {
            // echo "tesa";
            // die();
            if (empty($this->model->cekDetailDataExist($idpembeli, $id))) {
                $this->model->prosesAddToCart($id, $idpembeli);
            }
        }
        header("location: index.php?page=pelanggan&aksi=view");
    }

    // -----> delete keranjang 
    public function deleteKeranjang()
    {
        $id = $_GET['id'];
        $idtrx = $_GET['idtrx'];
        $this->model->prosesDeleteFromCart($id, $idtrx);
        header("location: index.php?page=pelanggan&aksi=keranjang");
    }

    // -----> simpan transaksi di keranjng
    public function simpanTransaksi()
    {
        $id = $_GET['idtrx'];
        if ($this->model->prosesSimpanTransaksi($id)) {
            header("location: index.php?page=pelanggan&aksi=riwayatTransaksi&pesan=berhasil simpan transaksi");
        } else {
            header("location: index.php?page=pelanggan&aksi=keranjang&pesan=gagal");
        }
    }

    // -----> riwayat transaksi 
    public function riwayatTransaksi()
    {
        $id = $_SESSION['username_member']['id_member'];
        $data = $this->model->daftarTransaksi($id);
        extract($data);
        require_once("View/pelanggan/riwayat_transaksi.php");
    }

    

    
}
