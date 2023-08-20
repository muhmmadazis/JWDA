<?php 
//koneksi database 
$db = mysqli_connect('localhost','root','','beasiswa');

function query ($sql){
	global $db;
	$result = mysqli_query($db, $sql);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows [] = $row;
}
return $rows;
}

function daftar ($POST){
	global $db;
	$nama =$POST['nama'];
	$email =$POST['email'];
    $nomorhp =$POST['nomorhp'];
	$semester =$POST['semester'];
	$ipk =$POST['ipk'];
	$pilihan_beasiswa =$POST['pilihan_beasiswa'];
    $berkas =$POST['berkas'];

    $sql = "INSERT INTO data VALUES ('','$nama','$email','$nomorhp','$semester','$ipk','$pilihan_beasiswa','$berkas','Belum Diverivikasi')";
    mysqli_query($db,$sql);
    return mysqli_affected_rows($db);
}

?>