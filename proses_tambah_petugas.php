<?php

if($_POST) {
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if(empty($nama_petugas)){
        echo "<script>alert('nama tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } 
    else if(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } 
    elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } 
    elseif(empty($level)){
        echo "<script>alert('level tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    }
    else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into petugas (nama_petugas, username, password, level) value ('".$nama_petugas."','".$username."','".$password."','".$level."')") or
        die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan data petugas');location.href='tambah_petugas.php';</script>";
        } 
        else {
            echo "<script>alert('Gagal menambahkan data petugas');location.href='tambah_petugas.php';</script>";
        }
    }
}

?>