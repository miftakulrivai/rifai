<?php
require '../models/pangsit.php';

class prosesPangsit

{
	private $action;

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{

		//obj model registrasi
		$objmodel = new pangsit();
		if ($this->action == "tambah") 
		{
			$id_pangsit = $_POST['inputidpangsit'];
			$harga = $_POST['inputharga'];
			$stok = $_POST['inputnama_pangsit'];
			
			$objmodel->insert($id_pangsit,$harga,$nama_pangsit);
			header("location:../views/ViewPangsit.php");
			
			

		}
		elseif($this->action =="hapus")
		{
			$id_pangsit = $_GET['id_pangsit'];
			$objmodel->delete($id_pangsit);
			header("location:../views/ViewPangsit.php");
		}
		elseif($this->action =="edit")
		{
			$id_pangsit = $_POST['id_pangsit'];
			$harga = $_POST['harga'];
			$stok = $_POST['nama_pangsit'];
			$objmodel->update($id_pangsit,$harga,$nama_pangsit);
			header("location:../views/ViewPangsit.php");
			
		}
	}
}
$objprosespangsit = new prosesPangsit($_GET['aksi']);
$objprosespangsit->proses();
?>