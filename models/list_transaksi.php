<?php
require 'koneksiDB.php';
class list_transaksi extends koneksiDB
{
	private $listtransaksi;
	function select()
	{
		$sqltext = "SELECT * FROM LIST_TRANSAKSI";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		//mengisi variable datakasir dari database
		$temp;
		while ($row=oci_fetch_array($statement,OCI_BOTH)) {
			$temp[]=$row;
		}
		$this->listtransaksi=$temp;

		oci_free_statement($statement);
	}
	function viewData(){
	 	foreach ($this->listtransaksi as $key) 
	 	{
	 		echo $key['ID_TRANSAKSI'];
	 		echo " -> ";
	 	    echo $key['TOTAL'];
	 		echo " -> ";
	 		echo $key['BAYAR'];
	 		echo " -> ";
	 		echo $key['KEMBALI'];
	 		echo " -> ";
	 		echo $key['NAMA_PELANGGAN'];
	 		echo " -> ";
	 		echo $key['NAMA_KASIR'];
	 		echo " -> ";
	 		echo "<br>";

	 	}
	 }
	 function getData()
	{
		return $this->listtransaksi;
	}
}
$objlist = new list_transaksi();
$objlist -> select();
//$objlist -> viewData();

?>