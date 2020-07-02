<?php
require 'koneksiDB.php';

class detail extends koneksiDB
{
private $datadetail;

	function select()
	{
		$sqltext = "SELECT * FROM DETAIL_TRANSAKSI_06986";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		//mengisi variable datakasir dari database
		$temp;
		while ($row=oci_fetch_array($statement,OCI_BOTH)) {
			$temp[]=$row;
		}
		$this->datadetail=$temp;

		oci_free_statement($statement);
	}

	function insert($id_transaksi,$id_pangsit,$quantity,$sub_total,$tanggal){
		$sqltext = "INSERT INTO DETAIL_TRANSAKSI_06986 VALUES ('$id_transaksi','$id_pangsit','$quantity','$sub_total','$tanggal')";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->datadetail;
	}


	 function viewData(){
	 	foreach ($this->datadetail as $key) 
	 	{
	 		echo $key['ID_TRANSAKSI'];
	 		echo " -> ";
	 		echo $key['ID_PANGSIT'];
	 		echo " -> ";
	 		echo $key['QUANTITY'];
	 		echo " -> ";
	 	    echo $key['SUB_TOTAL'];
	 		echo " -> ";
	 		echo $key['TANGGAL'];
	 		echo " <br> ";

	 	}
	 }

	function delete($id_transaksi){
		$sqltext = "DELETE FROM DETAIL_TRANSAKSI_06986 WHERE ID_TRANSAKSI = '$id_transaksi'";
		$statement = oci_parse($this->koneksi, $sqltext);
		
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($id_transaksi,$id_pangsit,$quantity,$sub_total,$tanggal){
		$sqltext = "UPDATE DETAIL_TRANSAKSI_06986 SET ID_PANGSIT = '$id_pangsit', QUANTITY = '$quantity', SUB_TOTAL = '$sub_total', TANGGAL = '$tanggal' WHERE ID_TRANSAKSI = '$id_transaksi'";
		$statement = oci_parse($this->koneksi, $sqltext);

		oci_execute($statement);
		oci_free_statement($statement);
	}


}
	 
$objmodeldetail = new detail();
$objmodeldetail->select();
//$objmodeldetail->viewData();
//$objmodeldetail->insert(2,2,'15000','20000','04/08/2020');
//$objmodeldetail->update(2,2,'15000','20000','05/08/2020');
//$objmodeldetail->delete(2,2,'15000','20000','04/08/2020');
?>


