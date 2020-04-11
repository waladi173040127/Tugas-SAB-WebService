<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "web_service";
$con = mysqli_connect($server, $username, $password) or die("<h1>Koneksi Mysqli Error : </h1>" .   mysqli_connect_error());
mysqli_select_db($con, $database) or die("<h1>Koneksi Kedatabase Error : </h1>" . mysqli_error($con));

@$operasi = $_GET['operasi'];

switch    ($operasi) {
case "view":
$query_tampil_biodata = mysqli_query($con,"SELECT * FROM mahasiswa") or die (mysqli_error($con));
$data_array = array();
while ($data = mysqli_fetch_assoc($query_tampil_biodata)) {
$data_array[]=$data;
}
echo json_encode($data_array);

break;

case "insert":
@$nama = $_GET['nama'];
@$alamat = $_GET['alamat'];
$query_insert_data = mysqli_query($con, "INSERT INTO mahasiswa (nama,alamat)   VALUES('$nama','$alamat')");
if ($query_insert_data) {
echo "Data Berhasil Disimpan";
}
else {
echo "INSERT to Database Error" . mysqli_error($con);
}

break;

case "get_biodata_by_id":
@$id = $_GET['id'];
$query_tampil_biodata = mysqli_query ($con, "SELECT * FROM mahasiswa WHERE id= '$id' ") or die (mysqli_error($con));
$data_array = array();
$data_array = mysqli_fetch_assoc($query_tampil_biodata);
echo "[" . json_encode ($data_array) . "]";

break;

case "update":
@$nama = $_GET['nama'];
@$alamat = $_GET['alamat'];
@$id = $_GET['id'];
$query_update_biodata = mysqli_query($con, "UPDATE mahasiswa SET nama='$nama', alamat='$alamat' WHERE id='$id'");
if ($query_update_biodata) {
echo "Update Data Berhasil";
}
else {
echo mysqli_error($con);
}

break;

case "delete":
@$id = $_GET['id'];
$query_delete_biodata = mysqli_query($con, "DELETE FROM mahasiswa WHERE id='$id'");
if ($query_delete_biodata) {
echo "Data Berhasil Dihapus";
}
else {
echo mysqli_error($con);
}

break;

default:
break;
}
?>