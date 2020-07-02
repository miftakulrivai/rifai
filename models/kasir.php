<?php
require 'koneksiDB.php';

class kasir extends koneksiDB
{
private $datakasir;

	function select()
	{
		$sqltext = "SELECT * FROM KASIR_06986";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		//mengisi variable datakasir dari database
		$temp;
		while ($row=oci_fetch_array($statement,OCI_BOTH)) {
			$temp[]=$row;
		}
		$this->datakasir=$temp;

		oci_free_statement($statement);
	}

	function insert($id_kasir,$nama_kasir){
		$sqltext = "INSERT INTO KASIR_06986 VALUES ('$id_kasir','$nama_kasir')";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->datakasir;
	}


	 function viewData(){
	 	foreach ($this->datakasir as $key) 
	 	{
	 		echo $key['ID_KASIR'];
	 		echo " -> ";
	 	    echo $key['NAMA_KASIR'];
	 		echo " <br> ";

	 	}
	 }

	function delete($id_kasir){
		$sqltext = "DELETE FROM KASIR_06986 WHERE ID_KASIR = '$id_kasir'";
		$statement = oci_parse($this->koneksi, $sqltext);
		
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($id_kasir,$nama_kasir){
		$sqltext = "UPDATE KASIR_06986 SET NAMA_KASIR = '$nama_kasir' WHERE ID_KASIR = '$id_kasir'";
		$statement = oci_parse($this->koneksi, $sqltext);

		oci_execute($statement);
		oci_free_statement($statement);
	}


}
	 
$objmodelkasir = new kasir();
$objmodelkasir->select();
//$objmodelkasir->viewData();
//$objmodelkasir->insert(11,'rifai');
//$objmodelkasir->update(11,'tomi');
//$objmodelkasir->delete(11);
?>


