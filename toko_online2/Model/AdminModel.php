<?php
class AdminModel
{

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
                return $query->fetch_assoc();
        }

        public function prosesStoreProduk($id_kategori,$gambar ,$nama, $harga, $stok)
        {
                $id = kodeProduk();
                $sql = "INSERT INTO produk(id_produk,id_kategori,gambar_produk,nama_produk,harga_produk,stok_produk)
                Values ('$id',$id_kategori,'$gambar','$nama','$harga','$stok')";
              
                return koneksi()->query($sql);
        }

        public function getGambarProduk($id)
        {
                $sql = "SELECT gambar_produk from produk where id_produk like '$id'";
                $query = koneksi()->query($sql);
                return $query->fetch_assoc();
        }

        public function ProsesUpdateProduk($id, $nama, $id_kategori, $harga, $namaFile, $stok)
        {
                $sql = "UPDATE produk SET nama_produk = '$nama',id_kategori = $id_kategori, harga_produk = $harga, gambar_produk = '$namaFile', stok_produk = '$stok' where id_produk LIKE '$id' ";
                return koneksi()->query($sql);
        }

        public function prosesDeleteProduk($id)
        {
                $sql = "DELETE from produk where id_produk = '$id'";
                return koneksi()->query($sql);
        }

        public function getKategoriProduk()
        {
                $sql = "SELECT id_kategori, nama_kategori From kategori ";
                $query = koneksi()->query($sql);
                $hasil = [];
                while ($data = $query->fetch_assoc()) {
                        $hasil[] = $data;
                }
                return $hasil;
        }


     
        public function prosesStoreKategori($nama)
        {
                $sql = "INSERT into kategori(nama_kategori) value ('$nama')";
                return koneksi()->query($sql);
        }

        public function prosesDeleteKategori($id)
        {
                $sql = "DELETE from kategori where id_kategori = $id";
                return koneksi()->query($sql);
        }

        public function getKategoriById($id)
        {
                $sql = "SELECT 
                         kategori.id_kategori,
                         kategori.nama_kategori

                        from kategori
                        
                        Where kategori.id_kategori = '$id'";
                $query = koneksi()->query($sql);
                return $query->fetch_assoc();
        }

        public function ProsesUpdateKategori($id, $nama)
        {
            $sql = "UPDATE kategori SET nama_kategori = '$nama' Where id_kategori like '$id'";
            return koneksi()->query($sql);
        }

        public function getTransaksi()
        {
                $sql = "SELECT transaksi.id_transaksi,
                        register.id_member ,
                        register.nama_member,
                        transaksi.tgl_transaksi,
                        transaksi.status_transaksi  
                        from transaksi
                        join register on transaksi.id_member=register.id_member
                        where transaksi.status_transaksi = 1 ORDER BY status_transaksi";
                $query = koneksi()->query($sql);
                $hasil = [];
                while ($data = $query->fetch_assoc()) {
                        $hasil[] = $data;
                }
                return $hasil;
        }

        public function prosesKirimTransaksi($id)
        {
                $sql = "UPDATE transaksi SET status_transaksi = 2 where id_transaksi = '$id'";
                return koneksi()->query($sql);
        }

    
    
        public function getPelanggan()
        {
                $sql = "SELECT id_member,
                        nama_member,
                        username_member,
                        password_member,
                        notelp_member,
                        alamat_member
                        FROM register";
                $query = koneksi()->query($sql);
                $hasil = [];
                while ($data = $query->fetch_assoc()) {
                        $hasil[] = $data;
                }
                return $hasil;
        }

        public function prosesdeletePelanggan($id)
        {
                $sql = "DELETE from register where id_member =$id";
                return koneksi()->query($sql);
        }

     

      
    

     

      

      

        public function jumlahMenu()
        {
                $sql = "SELECT COUNT(id_produk) as jumlah From produk";
                $query = koneksi()->query($sql);
                $hasil = $query->fetch_assoc();
                return $hasil;
        }

        public function jumlahKategori()
        {
                $sql = "SELECT COUNT(id_kategori) as jumlah From kategori";
                $query = koneksi()->query($sql);
                $hasil = $query->fetch_assoc();
                return $hasil;
        }

        // public function jumlahTransaksiSelesai()
        // {
        //         $sql = "SELECT COUNT(transaksi_id) as jumlah from transaksi where status_id = 4";
        //         $query = koneksi()->query($sql);
        //         $hasil = $query->fetch_assoc();
        //         return $hasil;
        // }

        public function jumlahTransaksiproses()
        {
                $sql = "SELECT COUNT(id_transaksi) as jumlah from transaksi ";
                $query = koneksi()->query($sql);
                $hasil = $query->fetch_assoc();
                return $hasil;
        }

        public function jumlahPelanggan()
        {
                $sql = "SELECT COUNT(id_member) as jumlah from transaksi";
                $query = koneksi()->query($sql);
                $hasil = $query->fetch_assoc();
                return $hasil;
        }
}
