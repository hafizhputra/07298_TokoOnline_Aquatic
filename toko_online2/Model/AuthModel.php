<?php 

    class AuthModel{
        
        // /** Function prosesAuthadmin untuk cek data admin dari database admin
        //  *  @param $npm untuk data npm
        //  *  @param $password untuk data password 
        //  */
        // public function prosesAuthAdmin($email,$password)
        // {
        //     $sql = "SELECT * from user where user_email = '$email' AND user_password='$password' AND role_id ='A'";
        //     $query = koneksi()->query($sql);
        //     return $query->fetch_assoc();
        // }

        /** Function prosesAuthPraktikan untuk cek data praktikan dari database praktikan
         *  @param $npm untuk data npm
         *  @param $password untuk data password 
         */
        public function prosesAuthPelanggan($username,$password)
        {
            $sql = "SELECT * from register where username_member = '$username' AND password_member ='$password' ";
            $query = koneksi()->query($sql);
            return $query->fetch_assoc();
        }

        /**
         * function prosesStorePraktikan berfungsi menambah data ke database
         * @param String $nama berisi data nama
         * @param String $npm berisi data npm
         * @param String $no_hp berisi data no_hp
         * @param String $password berisi data password
         */
        public function prosesStorePelanggan($nama,$password, $username, $no_telp,$alamat)
        {
            $sql = "INSERT into register(nama_member,password_member,username_member,notelp_member,alamat_member) 
            VALUES('$nama','$password', '$username','$no_telp','$alamat')";
            return koneksi()->query($sql);
        }
    }