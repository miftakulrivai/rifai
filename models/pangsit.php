<?php
require 'koneksiDB.php';

class pangsit extends koneksiDB
{
private $datapangsit;

	function select()
	{
		$sqltext = "SELECT * FROM PANGSIT_06986";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		//mengisi variable datakasir dari database
		$temp;
		while ($row=oci_fetch_array($statement,OCI_BOTH)) {
			$temp[]=$row;
		}
		$this->datapangsit=$temp;

		oci_free_statement($statement);
	}

	function insert($id_pangsit,$harga,$nama_pangsit){
		$sqltext = "INSERT INTO PANGSIT_06986 VALUES ('$id_pangsit','$harga','$nama_pangsit')";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->datapangsit;
	}


	 function viewData(){
	 	foreach ($this->datapangsit as $key) 
	 	{
	 		echo $key['ID_PANGSIT'];
	 		echo " -> ";
	 	    echo $key['HARGA'];
	 	    echo " -> ";
	 	    echo $key['STOK'];
	 		echo " <br> ";

	 	}
	 }

	function delete($id_pangsit){
		$sqltext = "DELETE FROM PANGSIT_06986 WHERE ID_PANGSIT = '$id_pangsit'";
		$statement = oci_parse($this->koneksi, $sqltext);
		
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($id_pangsit,$harga,$stok){
		$sqltext = "UPDATE PANGSIT_06986 SET  HARGA = '$harga', NAMA_PANGSIT = '$nama_pangsit' WHERE ID_PANGSIT = '$id_pangsit'";
		$statement = oci_parse($this->koneksi, $sqltext);

		oci_execute($statement);
		oci_free_statement($statement);
	}


}
	 
$objmodelpangsit = new pangsit();
$objmodelpangsit->select();
//$objmodelpangsit->viewData();
//$objmodelpangsit->insert(16,'300','20000');
//$objmodelpangsit->update(16,'20000','300');
//$objmodelpangsit->update(2,'20000','350');
//$objmodelpangsit->delete(16);
?>


