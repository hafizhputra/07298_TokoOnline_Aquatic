<?php

//memanggil helper
require_once "Koneksi.php";
require_once "Model/kode.php";

//memanggil Model
require_once "Model/AdminModel.php";
require_once "Model/AuthModel.php";
require_once "Model/PelangganModel.php";

// //memanggil Controller
require_once "Controller/AdminController.php";
require_once "Controller/AuthController.php";
require_once "Controller/PelangganController.php";

//Routing dari URL ke Obyek Class PHP
if (isset($_GET['page']) && isset($_GET['aksi'])) {
    session_start();
    $page = $_GET['page']; // Berisi nama page
    $aksi = $_GET['aksi']; // Aksi Dari setiap page

    // require_once akan Dirubah Saat Modul 2
    if ($page == "auth") {
        $auth = new AuthController();
            // -----> login pelanggan 
        if ($aksi == 'view') {
            $auth->index(); 
            // -----> login admin 
        } else if ($aksi == 'loginadmin') {
            $auth->loginadmin();
            // -----> register 
        } elseif ($aksi == 'registerPelanggan') {
            $auth->registerPelanggan();
            // -----> User Authentication Admin 
        } else if ($aksi == 'authAdmin') {
            $auth->authAdmin();
            // -----> User Authentication pelanggan 
        } else if ($aksi == 'authPelanggan') {
            $auth->authPelanggan();
            // -----> user logout 
        } else if ($aksi == 'logout') {
            $auth->logout();
            // -----> insert pelanggan 
        } else if ($aksi == 'storePelanggan') {
            $auth->storePelanggan();
        } else {
            require_once "View/menu/error-404.php";
        }
    }
    
    


     else if ($page == "pelanggan") {
        $pelanggan = new PelangganController();
        require_once "View/menu/menu_pelanggan.php";
        if ($_SESSION['username_member']) {

                // -----> menu produk1 
            if ($aksi == 'view') {
                $pelanggan->index();

                // -----> menu produk2 
            } else if ($aksi == 'getProdukByid') {
                $pelanggan->getDataProdukById();

                // -----> menu kategori2 
            } else if ($aksi == 'getKategoriByid') {
                $pelanggan->getDataKategoriById();    

                // -----> profil 
            } else if ($aksi == 'editProfil') {
                $pelanggan->edit();
            } else if ($aksi == 'updateProfil') {
                $pelanggan->update();
 
                // -----> keranjang 
            } else if ($aksi == 'keranjang') {
                $pelanggan->keranjang();
            } else if ($aksi == 'tambahKeranjang') {
                $pelanggan->inputKeranjang();
            } else if ($aksi == 'hapusKeranjang') {
                $pelanggan->deleteKeranjang();

                // -----> simpan transaksi 
            } else if ($aksi == 'simpanTransaksi') {
                $pelanggan->simpanTransaksi();

                // -----> riwayat transaksi 
            } else if ($aksi == 'riwayatTransaksi') {
                $pelanggan->riwayatTransaksi();
          
            } else {
                require_once "View/menu/error-404.php";
            }
        } else {
            header("location: index.php?page=auth&aksi=view");
        }
       
        
    }else if ($page == "admin") {
            $admin = new AdminController();
            require_once "View/menu/menu_admin.php";
            if ($_SESSION['user'] ) {
                // -----> dashboard 
                if ($aksi == 'view') {
                    $admin->index();

                // -----> daftar pelanggan 
                } else if ($aksi == 'daftarPelanggan') {
                    $admin->pelanggan();
                } else if ($aksi == 'hapusPelanggan') {
                    $admin->deletePelanggan();

                // -----> produk 
                } else if ($aksi == 'daftarProduk') {
                    $admin->produk();
                } else if ($aksi == 'tambahProduk') {
                    $admin->storeProduk();
                } else if ($aksi == 'hapusProduk') {
                    $admin->deleteProduk();
                } else if ($aksi == 'editProduk') {
                    $admin->editProduk();
                } else if ($aksi == 'updateProduk') {
                    $admin->updateProduk();

                // -----> kategori 
                } else if ($aksi == 'tambahKategori') {
                    $admin->storeKategori();
                } else if ($aksi == 'hapusKategori') {
                    $admin->deleteKategori();

                // -----> transaksi 
                } else if ($aksi == 'transaksi') {
                    $admin->transaksi();
                    
                // -----> kirim transaksi 
                } else if ($aksi == 'kirimTransaksi') {
                    $admin->kirimtransaksi();
                 }else {
                    require_once "View/menu/error-404.php";
                }
            } 
            else {
                header("location: index.php?page=auth&aksi=loginadmin");
            }
        }
                
            
        }  else {
    header("location: index.php?page=auth&aksi=view"); //Jangan ada spasi habis location
}
