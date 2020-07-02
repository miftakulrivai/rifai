<?php
session_start();
class proseslogin{
    private $action;

    function __construct($act){
        $this->action=$act;
    }
    function proses(){
        if($this->action=="loginadmin"){
            $useradmin=$_POST['usernameadmin'];
            $passadmin=$_POST['passwordadmin'];
            if($useradmin=="alan"&&$passadmin=="pass"){
                header("location:../view/viewadmin/dashboard.php");
            }
        }
        elseif($this->action=="loginsales"){
            $namasales=$_POST["usernamesales"];
            $passsales=$_POST["passwordsales"];
            //echo "$nama";
            //echo "$pass";
            $sqltext = "SELECT COUNT(*) FROM SALES_06992 WHERE NAMA_SALES='$namasales' AND PASSWORD='$passsales'";
            $statement = oci_parse(oci_connect("alan_06992","alan","localhost/XE"),$sqltext);
            oci_execute($statement);
            $key=oci_fetch_array($statement,OCI_BOTH);
            $hitung = $key["COUNT(*)"];
            //echo "$hitung";
            if($hitung==1){
                $query = "SELECT * FROM SALES_06992 WHERE NAMA_SALES='$namasales' AND PASSWORD='$passsales'";
                $statemen = oci_parse(oci_connect("alan_06992","alan","localhost/XE"),$query);
                oci_execute($statemen);
                $akunsales = oci_fetch_array($statemen,OCI_BOTH);
                $_SESSION["sales"]=$akunsales;
                //echo "<pre>";
                //print_r($_SESSION["sales"]);
                //echo "<pre>";
                echo "<script>alert('sukses');</script>";
                echo "<script>location='../view/viewsales/viewpemesanan.php'</script>";
            }else{
                echo "<script>alert('nama tidak ada lapor ke admin');</script>";
                echo "<script>location='../view/index.php'</script>";
            }
        }
        elseif($this->action=="loginkasir"){
            $namakasir=$_POST["usernamekasir"];
            $passkasir=$_POST["passwordkasir"];
            //echo $namakasir;
            //echo $passkasir;
            $sqltext = "SELECT COUNT(*) FROM KASIR_06992 WHERE NAMA_KASIR='$namakasir' AND PASSWORD='$passkasir'";
            $statement = oci_parse(oci_connect("alan_06992","alan","localhost/XE"),$sqltext);
            oci_execute($statement);
            $key=oci_fetch_array($statement,OCI_BOTH);
            $hitung = $key["COUNT(*)"];
            echo "$hitung";
            if($hitung==1){
                $query = "SELECT * FROM KASIR_06992 WHERE NAMA_KASIR='$namakasir' AND PASSWORD='$passkasir'";
                $statemen = oci_parse(oci_connect("alan_06992","alan","localhost/XE"),$query);
                oci_execute($statemen);
                $akunkasir = oci_fetch_array($statemen,OCI_BOTH);
                $_SESSION["kasir"]=$akunkasir;
                //echo "<pre>";
                //print_r($_SESSION["kasir"]);
                //echo "<pre>";
                echo "<script>alert('sukses');</script>";
                echo "<script>location='../view/viewkasir/viewtransaksi.php'</script>";
            }else{
                echo "<script>alert('nama tidak ada lapor ke admin');</script>";
                echo "<script>location='../view/index.php'</script>";
            }
        }
    }
}
$objproseslogin = new proseslogin($_GET['aksi']);
$objproseslogin->proses();
?>