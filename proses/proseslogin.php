<?php
session_start();
class proseslogin{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        if($this->action=="login"){
            $useradmin=$_POST['email'];
            $passadmin=$_POST['password'];
            if($useradmin=="rifai"&&$passadmin=="0099"){
                echo "<script>alert('Login Berhasil');</script>";
                echo "<script>location='../Views/ViewTransaksi.php'</script>";
                $_SESSION["username"]=$useradmin;
            }
            else {
            	echo "<script>alert('Login Tidak Berhasil');</script>";
                echo "<script>location='../Views/index.php'</script>";
            	
            }
     }
   }
}
$objproseslogin = new proseslogin($_GET['aksi']);
$objproseslogin->proses();
?>