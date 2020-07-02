<?php
require '../models/transaksi.php';

class prosesTransaksi

{
	private $action;

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{

		
		$objmodel = new transaksi();
		if ($this->action == "tambah") 
		{
			
			$id_transaksi = $_POST['inputidtransaksi'];
			$id_kasir = $_POST['inputidkasir'];
			$id_pelanggan = $_POST['inputidpelanggan'];
			$total = $_POST['inputtotal'];
			$kembali = $_POST['inputkembali'];
			$bayar = $_POST['inputbayar'];

			$objmodel->insert($id_transaksi,$id_kasir,$id_pelanggan,$total,$kembali,$bayar);
			header("location:../views/viewTransaksi.php");
			
			

		}
		elseif($this->action =="hapus")
		{
			$id_transaksi = $_GET['id_transaksi'];
			$objmodel->delete($id_transaksi);
			header("location:../views/viewTransaksi.php");
		}
		elseif($this->action =="edit")
		{
			//echo "masuk edit";
			$id_transaksi = $_POST['id_transaksi'];
			$id_kasir = $_POST['id_kasir'];
			$id_pelanggan = $_POST['id_pelanggan'];
			$total = $_POST['total'];
			$kembali = $_POST['kembali'];
			$bayar = $_POST['bayar'];
			$objmodel->update($id_transaksi,$id_kasir,$id_pelanggan,$total,$kembali,$bayar);
			header("location:../views/viewTransaksi.php");
			
		}
	}
}
$objprosestransaksi = new prosesTransaksi($_GET['aksi']);
$objprosestransaksi->proses();
?>