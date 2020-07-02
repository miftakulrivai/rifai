<?php
require 'koneksiDB.php';
class join extends koneksiDB
{
	private $datajoin;
	function select()
	{
		$sqltext = "SELECT A.ID_TRANSAKSI, B.NAMA_PELANGGAN, C.NAMA_KASIR
					FROM TRANSAKSI_06986 A JOIN PELANGGAN_06986 B
					ON A.ID_PELANGGAN = B.ID_PELANGGAN
					JOIN KASIR_06986 C
					ON A.ID_KASIR = C.ID_KASIR";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		//mengisi variable datakasir dari database
		$temp;
		while ($row=oci_fetch_array($statement,OCI_BOTH)) {
			$temp[]=$row;
		}
		$this->datajoin=$temp;

		oci_free_statement($statement);
	}
	 function getData()
	{
		return $this->datajoin;
	}
}
$objjoin = new join();
$objjoin -> select();
//$objlist -> viewData();

?>