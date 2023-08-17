<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD</title>
</head>
<body>
<h2>Simple CRUD</h2>
<p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>
<h3>Edit Data Siswa</h3>
<?php
//proses mengambil data ke database untuk ditampilkan di form edit berdasarkan siswa_id yg didapatkan di GET id -> edit.php?id=siswa_id
//include atau memasukkan file koneksi ke database include('koneksi.php');
//membuat variabel $id yang nilainya adalah dari URL GET id ->edit.php?id=siswa_id $id=$_GET['id'];
//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id '$id' $show = mysql_query("SELECT*FROM siswa WHERE siswa_id='$id'");
//cek apakah data dari hasil query ada atau tidak 
if(($show)==0) {
	//jika tidak ada data yang sesuai maka akan langsung di arahkan ke halaman depan atau beranda =>index.php
	echo '<script>window.history.back()</script>';
  }else{
	//jika data ditemukan, maka membuat variabel $data
	$data = mysql_fetch_assoc($show); //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
}
?>
<form action="edit-proses.php" method="post">
	<input type="hidden" name="id" value="<?php echo $id; ?>"> <!--membuat inputan hidden dan nilainya adalah siswa_id-->
	<table cellpadding="3" cellspacing="0">
		<tr>
			<td>NIS</td>
			<td>:</td>
			<td><input type="text" name="nis" value=""
				required></td> <!-- value diambil dari hasil query -->
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><input type="text" name="nama" size="30" required></td> <!--value diambil dari hasil query -->
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td>
				
				<select name="kelas" required>
			    <option value="">Pilih Kelas</option>
			    <option value="X">X</option><!--jika data di database sama dengan value maka akan terselect/terpilih-->
				<option value="XI">XI</option><!--jika data di database sama dengan value maka akan terselect/terpilih-->
			    <option value="XII">XII</option><!--jika data di database sama dengan value maka akan terselect/terpilih-->
				</select>
			</td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td>:</td>
			<td>
				<select name="Jurusan" required>
				<option value="">Pilih Jurusan</option>
				<option value="Teknik Komputer dan Jaringan" >Teknik Komputer dan Jaringan</option> <!--jika ada data di database sama dengan value maka akan terselected/terpilih-->
                <option value="Multimedia" >Multimedia</option> <!--jika ada data di database sama dengan value maka akan terselected/terpilih-->
                <option value="Akuntansi" >Akuntansi</option> <!--jika ada data di database sama dengan value maka akan terselected/terpilih-->
				<option value="Perbankan" >Perbankan</option> <!--jika ada data di database sama dengan value maka akan terselected/terpilih-->
				<option value="Pemasaran" >Pemasaran</option> <!--jika ada data di database sama dengan value maka akan terselected/terpilih-->
				</select>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td></td>
			<td><input type="submit" name="simpan" value="Simpan"></td>
		</tr>
	</table> 
</form>
</body>
</html>