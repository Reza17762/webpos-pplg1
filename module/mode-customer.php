<?php
if (userLogin()['level'] == 3) {
  header("location:" . $main_url . "error-page.php");
  exit();
}

function insert($data)
{
  global $koneksi;

  $nama = mysqli_real_escape_string($koneksi, $data['nama']);
  $telp = mysqli_real_escape_string($koneksi, $data['telp']);
  $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);

  // variable 
  $sqlCustomer = "INSERT INTO tbl_customer VALUES (null, '$nama', '$telp', '$alamat')";
  mysqli_query($koneksi, $sqlCustomer);
  return mysqli_affected_rows($koneksi);
}

function delete($id)
{
  global $koneksi;

  $sqlDelete = "DELETE FROM tbl_customer WHERE id_customer = $id";
  mysqli_query($koneksi, $sqlDelete);

  return mysqli_affected_rows($koneksi);
}

function update($data)
{
  global $koneksi;

  $id = mysqli_real_escape_string($koneksi, $data['id']);
  $nama = mysqli_real_escape_string($koneksi, $data['nama']);
  $telpon = mysqli_real_escape_string($koneksi, $data['telp']);
  $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);

  // variable untuk update data
  $sqlcustomer = "UPDATE tbl_customer SET nama = '$nama', telp = '$telpon', alamat = '$alamat' WHERE id_customer = '$id' ";
  mysqli_query($koneksi, $sqlcustomer);
  return mysqli_affected_rows($koneksi);
}
