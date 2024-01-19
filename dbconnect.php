<?php 
// isi nama host, username mysql, dan password mysql anda
$conn = mysqli_connect("localhost","root","","nyandang");

if(!$conn){
	echo "gagal konek database menn";
} else {
	
};
function edit($data){
	global $conn;

	$gambarlama = htmlspecialchars($data['gambarlama']);
	$nama = htmlspecialchars($data['namaproduk']);
	$kategori = htmlspecialchars($data['kategori']);
	$hargadiskon = htmlspecialchars($data['hargadiskon']);
	$deskripsi = htmlspecialchars($data['deskripsi']);
	$hargaawal = htmlspecialchars($data['hargaawal']);
	$id = $data['id'];

	//cek jika ubah gambar

	if($gambarlama){
		$query_insert = "update produk set gambar='$gambarlama', namaproduk='$nama', idkategori='$kategori', hargaafter='$hargadiskon', deskripsi='$deskripsi' , hargabefore='$hargaawal' where idproduk=$id";
		mysqli_query($conn, $query_insert);
	}

	return mysqli_affected_rows($conn);
}
function hapus($id){
	global $conn;

	$query_delete = "delete from produk where idproduk=$id";
	mysqli_query($conn, $query_delete);
	
	return mysqli_affected_rows($conn);      
}
?>