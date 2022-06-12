<?php

class AuthController
{
    private $model;

    public function __construct()
    {
        $this->model = new AuthModel();
    }

    public function index()
    {
        require_once("View/auth/login.php");
    }

    public function loginadmin()
    {
        require_once("View/auth/loginadmin.php");
    }

    public function registerPelanggan()
    {
        require_once("View/auth/register.php");
    }



    // -----> login admin tanpa database 
 public function authAdmin()
    {
    
        if (isset($_POST['masuk'])) {
            $username = $_POST['username'];
        $password= $_POST['password'];

            if($username == 'admin'){
 
                if($password == 'admin'){
 
                    $_SESSION['user'] = $username;
                  
                    header("location: index.php?page=admin&aksi=view&pesan=berhasil login");
                    
                }else{
                    echo "
                    <script>
                        alert(' PASSWORD SALAH ... !! ');
                    </script>
                ";
                }
 
            }else{
                echo "
                    <script>
                        alert(' USERNAME TIDAK TERDAFTAR..!! ');
                    </script>
                ";
            }

           
        }
 
     
      
    }


    // -----> login pelanggan pakai database 
    public function authPelanggan()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data = $this->model->prosesAuthPelanggan($email, $password);
        if ($data) {
            $_SESSION['username_member'] = $data;
            header("location: index.php?page=pelanggan&aksi=view&pesan=berhasil login");
        } else {
            header("location: index.php?page=auth&aksi=view&pesan=password atau npm salah");
        }
    }

    // -----> logout 
    public function logout()
    {
        session_destroy();
        header("location: index.php?page=auth&aksi=view&pesan=berhasil logout!!");
    }

    // -----> register pelanggan 
    public function storePelanggan()
    {
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        if ($this->model->prosesStorePelanggan($nama,$password,$username, $no_telp,$alamat)) {
            header("location: index.php?page=auth&aksi=view&pesan=berhasil daftar");
        } else {
            header("location: index.php?page=auth&aksi=registerPelanggan&pesan=gagal daftar");
        }
    }
}
