<?php
//memulai proses hapus data

//cek dahulu, apakah benar URL sudah ada GET id-> hapus.php?id=siswa_id 
if(isset($_GET['id'])){
	//include atau memasukkan file koneksi ke database
	includ('koneksiphp.php');
	//membuat variabel yg bernilai dari URL GET id -> hapus.php?id=siswa_id
	$id=$_GET['id'];
	//cek ke database apakah ada data siswa dengan siswa_id='$id'
	$cek = mysql_query("SELECT siswa_id FROM siswa WHERE siswa_id='$id'") or die(mysql_error());
	//jika data siswa tidak ada
	if(mysql_num_rows($cek) ==0){
		//jika data tidak ada, maka redirect atau dikembalikan ke halaman beranda
		echo '<script>window,history.back()</script>';
	}else{
		//jika data di database, maka melakukan query DELETE table siswa dengan kondisi WHERE siswa_id='$id'
		$del = mysql_query("DELETE FROM siswa WHERE siswa_id='$id'");
		//jika query DELETE berhasil
		if($del){
			echo 'Data siswa berhasil dihapus!'; //Pesan jika proses hapus berhasil
			echo '<a href="index.php">Kembali</a>'; //membuat Link untuk kembali ke halaman beranda
		}else{
			echo 'Gagal menghapus data!'; //Pesan jika proses hapus gagal
			echo'<a href="index.php">Kembali</a>'; //membuat Link untuk kembali ke halaman beranda
		}
		}
	}else{
		//redirect atau dikembalikan ke halaman beranda 
		echo '<script>window,history.back()</script>';
	}
?>