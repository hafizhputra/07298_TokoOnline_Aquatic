<?php 
    
    function kodeProduk(){
        
        $sql = "SELECT max(id_produk) as id from produk";
        $query = koneksi()->query($sql);
        $hasil = $query->fetch_array();
        $code = $hasil['id'];
        // $urutan = (int) substr($code,2,3);
        // $urutan++;
        // $huruf = "1";
        // $code = $huruf.sprintf("%03s",$urutan);
        $code++;
        return $code;
    }

    function kodeTransaksi(){
        
        $sql = "SELECT max(id_transaksi) as id from transaksi";
        $query = koneksi()->query($sql);
        $hasil = $query->fetch_array();
        $code = $hasil['id'];
        // $urutan = (int) substr($code,3,3);
        // $urutan++;
        // $huruf = "TRX";
        // $code = $huruf.sprintf("%03s",$urutan);
        $code++;
        return $code;
    }



    function KodePembayaran(){
        
        $sql = "SELECT max(id_transaksi) as id from transaksi";
        $query = koneksi()->query($sql);
        $hasil = $query->fetch_array();
        $code = $hasil['id'];
        // $urutan = (int) substr($code,3,3);
        // $urutan++;
        // $huruf = "PMB";
        // $code = $huruf.sprintf("%03s",$urutan);
        $code++;
        return $code;
    }

    function formatRupiah($harga)
    {
    $formating = "Rp " . number_format($harga, 2, ',', '.');
    return $formating;
    }
