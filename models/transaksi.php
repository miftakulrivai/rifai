<?php
require 'koneksiDB.php';

class transaksi extends koneksiDB
{
private $datatransaksi;
private $kode=0;
private $idbaru;

	function select(){
        $sqltext = "SELECT * FROM TRANSAKSI_06986";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        while ($row=oci_fetch_array($statement,OCI_BOTH)){
            $data[]=$row;

            if($this->kode<$row["ID_TRANSAKSI"]){
                $this->kode=$row["ID_TRANSAKSI"];
            }
        }
        return $this->datatransaksi=$data;
        oci_free_statement($statement);

    }

	function insert($id_transaksi,$id_kasir,$id_pelanggan,$total,$kembali,$bayar){
		$sqltext = "INSERT INTO TRANSAKSI_06986 VALUES ('$id_transaksi','$id_kasir','$id_pelanggan','$total','$kembali','$bayar')";
		$statement = oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->datatransaksi;
	}


	 function viewData(){
	 	foreach ($this->datatransaksi as $key) 
	 	{
	 		echo $key['ID_TRANSAKSI'];
	 		echo " -> ";
	 		echo $key['ID_KASIR'];
	 		echo " -> ";
	 		echo $key['ID_PELANGGAN'];
	 		echo " -> ";
	 	    echo $key['TOTAL'];
	 		echo " -> ";
	 		echo $key['KEMBALI'];
	 		echo " -> ";
	 		echo $key['BAYAR'];
	 		echo " <br> ";

	 	}
	 }

	function delete($id_transaksi){
		$sqltext = "DELETE FROM TRANSAKSI_06986 WHERE ID_TRANSAKSI = '$id_transaksi'";
		$statement = oci_parse($this->koneksi, $sqltext);
		
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function update($id_transaksi,$id_kasir,$id_pelanggan,$total,$kembali,$bayar){
		$sqltext = "UPDATE TRANSAKSI_06986 SET ID_KASIR = '$id_kasir', ID_PELANGGAN = '$id_pelanggan', TOTAL = '$total', KEMBALI = '$kembali', BAYAR = '$bayar' WHERE ID_TRANSAKSI = '$id_transaksi'";
		$statement = oci_parse($this->koneksi, $sqltext);

		oci_execute($statement);
		oci_free_statement($statement);
	}
	function setidbaru(){
        return $this->idbaru=$this->kode+1;
    }
    function getidbaru(){
        return $this->idbaru;
    }


}
	 
$objmodeltransaksi = new transaksi();
$objmodeltransaksi->select();
//$objmodeltransaksi->viewData();
//$objmodeltransaksi->insert(16,5,5,'14000','1000','15000');
//$objmodeltransaksi->update(16,5,5,'14000','6000','20000');
//$objmodeltransaksi->delete(16);
?>


