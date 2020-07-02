<?php
require '../models/detail.php';

class prosesDetail

{
	private $action;

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{

		//obj model registrasi
		$objmodel = new detail();
		if ($this->action == "tambah") 
		{
			$id_transaksi = $_POST['inputidtransaksi'];
			$id_pangsit = $_POST['inputidpangsit'];
			$quantity = $_POST['inputquantity'];
			$sub_total = $_POST['inputsubtotal'];
			$tanggal = $_POST['inputtanggal'];
			
			$objmodel->insert($id_transaksi,$id_pangsit,$quantity,$sub_total,$tanggal);
			header("location:../views/ViewDetail.php");
			
			

		}
		elseif($this->action =="hapus")
		{
			$id_transaksi = $_GET['id_transaksi'];
			$objmodel->delete($id_transaksi);
			header("location:../views/ViewDetail.php");
		}
		elseif($this->action =="edit")
		{
			
			$id_transaksi = $_POST['id_transaksi'];
			$id_pangsit = $_POST['id_pangsit'];
			$quantity = $_POST['quantity'];
			$sub_total = $_POST['sub_total'];
			$tanggal = $_POST['tanggal'];
			$objmodel->update($id_transaksi,$id_pangsit,$quantity,$sub_total,$tanggal);
			header("location:../views/ViewDetail.php");
			
		}
	}
}
$objprosesdetail = new prosesDetail($_GET['aksi']);
$objprosesdetail->proses();
?>