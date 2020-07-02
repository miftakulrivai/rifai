<?php
require 'koneksiDB.php';

class pelanggan extends koneksiDB
{
private $datapelanggan;

	function select()
	{
		$sqltext = "SELECT * FROM PELANGGAN_06986";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		//mengisi variable datakasir dari database
		$temp;
		while ($row=oci_fetch_array($statement,OCI_BOTH)) {
			$temp[]=$row;
		}
		$this->datapelanggan=$temp;

		oci_free_statement($statement);
	}

	function insert($id_pelanggan,$nama_pelanggan){
		$sqltext = "INSERT INTO PELANGGAN_06986 VALUES ('$id_pelanggan','$nama_pelanggan')";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->datapelanggan;
	}


	 function viewData(){
	 	foreach ($this->datapelanggan as $key) 
	 	{
	 		echo $key['ID_PELANGGAN'];
	 		echo " -> ";
	 	    echo $key['NAMA_PELANGGAN'];
	 		echo " <br> ";

	 	}
	 }

	function delete($id_pelanggan){
		$sqltext = "DELETE FROM PELANGGAN_06986 WHERE ID_PELANGGAN = '$id_pelanggan'";
		$statement = oci_parse($this->koneksi, $sqltext);
		
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($id_pelanggan,$nama_pelanggan){
		$sqltext = "UPDATE PELANGGAN_06986 SET NAMA_PELANGGAN = '$nama_pelanggan' WHERE ID_PELANGGAN = '$id_pelanggan'";
		$statement = oci_parse($this->koneksi, $sqltext);

		oci_execute($statement);
		oci_free_statement($statement);
	}


}
	 
$objmodelpelanggan = new pelanggan();
$objmodelpelanggan->select();
//$objmodelpelanggan->viewData();
//$objmodelpelanggan->insert(11,'rifai');
//$objmodelpelanggan->update(11,'tomi');
//$objmodelpelanggan->delete(11);
?>


