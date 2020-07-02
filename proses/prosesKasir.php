<?php
require '../models/kasir.php';

class prosesKasir

{
	private $action;

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{

		//obj model registrasi
		$objmodel = new kasir();
		if ($this->action == "tambah") 
		{
			$id_kasir = $_POST['inputidkasir'];
			$nmkasir = $_POST['inputnmkasir'];
			
			$objmodel->insert($id_kasir,$nmkasir);
			header("location:../views/ViewKasir.php");
			
			

		}
		elseif($this->action =="hapus")
		{
			$id_kasir = $_GET['id_kasir'];
			$objmodel->delete($id_kasir);
			header("location:../views/ViewKasir.php");
		}
		elseif($this->action =="edit")
		{
			
			$id_kasir = $_POST['id_kasir'];
			$nmkasir = $_POST['nmkasir'];
			$objmodel->update($id_kasir,$nmkasir);
			header("location:../views/ViewKasir.php");
			
		}
	}
}
$objproseskasir = new prosesKasir($_GET['aksi']);
$objproseskasir->proses();
?>