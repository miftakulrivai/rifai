<?php
class koneksiDB
{
	private $uname = 'rifai_06986';
	private $pass = 'rifai';
	private $host = 'localhost/XE';
	protected $koneksi;

	function __construct()
	{
		$konek=oci_connect($this->uname, $this->pass , $this->host);
		if($konek)
		{
			echo " \n";
			$this->koneksi=$konek;
		}
		else
		{
			echo "gagal";
		}
	}
}

$objekKoneksi= new koneksiDB();

?>