<?php
require '../models/pelanggan.php';

class prosesPelanggan

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
			$id_pelanggan = $_POST['inputidpelanggan'];
			$nmpelanggan = $_POST['inputnmpelanggan'];
			
			$objmodel->insert($id_pelanggan,$nmpelanggan);
			header("location:../views/ViewPelanggan.php");
			
			

		}
		elseif($this->action =="hapus")
		{
			$id_pelanggan = $_GET['id_pelanggan'];
			$objmodel->delete($id_pelanggan);
			header("location:../views/ViewPelanggan.php");
		}
		elseif($this->action =="edit")
		{
			
			$id_pelanggan = $_POST['id_pelanggan'];
			$nmpelanggan = $_POST['nmpelanggan'];
			$objmodel->update($id_pelanggan,$nmpelanggan);
			header("location:../views/ViewPelanggan.php");
			
		}
	}
}
$objprosespelanggan = new prosesPelanggan($_GET['aksi']);
$objprosespelanggan->proses();
?>