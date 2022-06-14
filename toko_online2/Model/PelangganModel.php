<?php

class PelangganModel
{
    public function get($id)
    {
        $sql = "SELECT * FROM register where  id_member = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getProduk()
    {
        $sql = "SELECT produk.id_produk,
        kategori.id_kategori,
        kategori.nama_kategori,
        produk.gambar_produk,
        produk.nama_produk,
        produk.harga_produk,
        produk.stok_produk
        from produk
        JOIN kategori ON (produk.id_kategori = kategori.id_kategori)";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }


    public function getProdukById($id)
    {
        $sql = "SELECT produk.id_produk,
        kategori.id_kategori,
        kategori.nama_kategori,
       produk.gambar_produk,
       produk.nama_produk,
       produk.harga_produk,
       produk.stok_produk

       from produk
       JOIN kategori ON (produk.id_kategori = kategori.id_kategori)
       Where produk.id_produk = '$id'";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }


    public function getKategori()
    {
        $sql = "SELECT 
        kategori.id_kategori,
        kategori.nama_kategori
      
        from kategori";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }


    public function getKategoriById($id)
    {
        $sql = "SELECT produk.id_produk,
        kategori.id_kategori,
        kategori.nama_kategori,
       produk.gambar_produk,
       produk.nama_produk,
       produk.harga_produk,
       produk.stok_produk

       from produk
       JOIN kategori ON (produk.id_kategori = kategori.id_kategori)
       Where produk.id_kategori = '$id'";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }



    public function getKurir()
    {
        $sql = "SELECT * FROM Kurir";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function prosesTransaksiawal($id, $idproduk)
    {
      
        $kode = kodeTransaksi();
        // $sql = "INSERT into transaksi(id_transaksi,pembeli_id,kurir_id,pembayaran_id,admin_id,status_id,transaksi_tgl) 
        // Values ('$kode',$id,'','','',0,'null')";
        $sql = "INSERT into transaksi(id_transaksi,id_member,tgl_transaksi,status_transaksi) 
        Values ('$kode','$id','null',0)";
        koneksi()->query($sql);

        // $sql = "INSERT into detail_transaksi(kopi_id,transaksi_id,qty) Values('$idproduk','$kode',1)";
        // return koneksi()->query($sql);
        $sql = "INSERT into detail_transaksi (id_transaksi,id_produk,jumlah_produk) 
        Values('$kode','$idproduk',1)";
         return koneksi()->query($sql);
    }

    public function getidtrx($id)
    {
        $sql = "SELECT id_transaksi from transaksi Where status_transaksi=0 AND id_member = $id";
        $query = koneksi()->query($sql);
        $idtransaksi = $query->fetch_assoc();
        if (!empty($idtransaksi)) {
            $hasil = $idtransaksi['id_transaksi'];
            return $hasil;
        } else {
            return "DATA KOSONG";
        }
    }

    public function cekDetailDataExist($idpembeli, $idproduk)
    {
        $sql = "SELECT * from detail_transaksi 
        JOIN transaksi 
        on transaksi.id_transaksi = detail_transaksi.id_transaksi
        where
        AND detail_transaksi.id_produk = '$idproduk' 
        AND transaksi.id_member = $idpembeli
        AND transaksi.status_transaksi = 0";
        $query = koneksi()->query($sql);
        return $query;
    }

  

    public function ProsesUpdateProfil($id, $nama,$password , $username, $no_telp, $alamat)
    {
        $sql = "UPDATE register SET nama_member = '$nama',password_member = '$password' ,username_member = '$username',notelp_member = '$no_telp',alamat_member = '$alamat' Where id_member = $id";
        return koneksi()->query($sql);
    }

    public function daftarTransaksi($id)
    {
        $sql = "SELECT * from transaksi 
                where id_member = $id AND transaksi.status_transaksi > 0";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

   

    public function getCart($id)
    {
        $hasil = $this->getidtrx($id);
        if ($hasil != "DATA KOSONG") {
            $sql = "SELECT detail_transaksi.id_produk,
            produk.nama_produk,
            detail_transaksi.jumlah_produk,
            detail_transaksi.id_transaksi,
            produk.harga_produk 
            FROM detail_transaksi  
            JOIN produk on produk.id_produk = detail_transaksi.id_produk 
            JOIN transaksi on transaksi.id_transaksi = detail_transaksi.id_transaksi 
            where detail_transaksi.id_transaksi = '$hasil' 
            AND transaksi.id_member = $id
            AND transaksi.status_transaksi = 0";
            $query = koneksi()->query($sql);
            $cart = [];
            while ($data = $query->fetch_assoc()) {
                $cart[] = $data;
            }
            return $cart;
        }
    }

    public function prosesAddToCart($idproduk, $iduser)
    {

        $kode = $this->getidtrx($iduser);
        $produkExist = $this->getItemByid($kode, $idproduk);
        if (!empty($produkExist)) {
            $produk = $this->getItemQtyCartByid($idproduk, $kode);
            $sql = "UPDATE detail_transaksi SET jumlah_produk = $produk+1 where id_transaksi ='$kode' AND id_produk = '$idproduk'";
            return koneksi()->query($sql);
        } else {
            $sql = "INSERT into detail_transaksi(id_transaksi,id_produk,jumlah_produk) Values('$kode','$idproduk',1)";
            return koneksi()->query($sql);
        }
    }

    public function prosesDeleteFromCart($id, $idtransaksi)
    {
        $sql = "DELETE FROM detail_transaksi where id_produk = '$id' AND id_transaksi = '$idtransaksi'";
        koneksi()->query($sql);
    }

    public function prosesSimpanTransaksi($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date('Y-m-d H:i:s');
       
        // $kode = KodePembayaran();
        // $this->tambahpembayaran($kode, $id);
        $sql = "UPDATE transaksi SET tgl_transaksi = '$tgl',status_transaksi = 1 where id_transaksi = '$id'";
        return koneksi()->query($sql);
    }



    public function cekTrx($id)
    {
        $sql = "SELECT id_member from transaksi where id_member = $id AND status_transaksi=0 ";
        // AND status_id = 0";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getItemByid($idtransaksi, $idproduk)
    {
        $sql = "SELECT * From detail_transaksi where id_transaksi = '$idtransaksi' AND id_produk = '$idproduk'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getItemQtyCartByid($idproduk, $idtransaksi)
    {
        $sql = "SELECT jumlah_produk from detail_transaksi 
        where id_transaksi = '$idtransaksi' AND id_produk = '$idproduk'";
        $query = koneksi()->query($sql);
        $item = $query->fetch_assoc();
        if (!empty($item)) {
            $hasil = $item['jumlah_produk'];
            return $hasil;
        } else {
            return "DATA KOSONG";
        }
    }

 





}
