<?php 
class database{

	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "bookoop";
	var $koneksi = "";
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

	function tampil_buku()
	{
		$data = mysqli_query($this->koneksi,"SELECT*FROM tb_buku
		INNER JOIN tb_kategori
		ON tb_kategori.id_kategori = tb_buku.id_kategori");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

	function tambah_buku($id_kategori,$judul,$pengarang,$penerbit)
	{
		mysqli_query($this->koneksi,"insert into tb_buku values ('','$id_kategori','$judul','$pengarang','$penerbit')");
	}

	function get_buku($id_buku)
	{
		$query = mysqli_query($this->koneksi,"select * from tb_buku where id_buku='$id_buku'");
		return $query->fetch_array();
	}

	function update_buku($id_buku,$id_kategori,$judul,$pengarang,$penerbit)
	{
		$query = mysqli_query($this->koneksi,"update tb_buku set id_kategori='$id_kategori', judul='$judul',pengarang='$pengarang',penerbit='$penerbit' where id_buku='$id_buku'");
	}

	function delete_buku($id_buku)
	{
		$query = mysqli_query($this->koneksi,"delete from tb_buku where id_buku='$id_buku'");
	}

	//kategori
	function tampil_kategori()
	{
		$data = mysqli_query($this->koneksi,"SELECT*FROM tb_kategori");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

	function tambah_kategori($nama_kategori)
	{
		mysqli_query($this->koneksi,"insert into tb_kategori values ('','$nama_kategori')");
	}
	function get_kategori($id_kategori)
	{
		$query = mysqli_query($this->koneksi,"select * from tb_kategori where id_kategori='$id_kategori'");
		return $query->fetch_array();
	}

	function update_kategori($id_kategori,$nama_kategori)
	{
		$query = mysqli_query($this->koneksi,"update tb_kategori set nama_kategori='$nama_kategori'  where id_kategori='$id_kategori'");
	}

	function delete_kategori($id_kategori)
	{
		$query = mysqli_query($this->koneksi,"delete from tb_kategori where id_kategori='$id_kategori'");
		return $query;
	}


}
?>