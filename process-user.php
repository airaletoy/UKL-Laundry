<?php
include("connection.php");
if (isset($_POST["simpan_user"])) {
    # proses insert new data
    // tampung data input member dari user
    $id_user = $_POST["id_user"];
    $nama = $_POST["nama"];
    $username =$_POST["username"];
    $password =md5($_POST["password"]);
    $role = $_POST["role"];
 

    // membuat perintah SQL utk insert data ke tbl member
    $sql = "insert into user values ('$id_user',
    '$nama','$username','$password','$role')";

    // eksekusi perintah / menjalankan perintah SQL
    mysqli_query($connect, $sql);

    // direct / dikembalikan ke halaman list member
    header("location:list-user.php");
}

if (isset($_POST["edit_user"])) {
    # tampung data yg akan diupdate
    $id_user = $_POST["id_user"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $role = $_POST["role"];
    
    if (empty($_POST["password"])) {
        # password tidak ikut teredit
        $sql = "update user set nama='$nama',
        username='$username', role='$role' where 
        id_user='$id_user'";
    } else {
        # password ikut teredit
        $password = md5($_POST["password"]);
        $sql = "update user set nama='$nama',
        'username='$username',password='$password, role='$role' where 
        id_user='$id_user'";
    }

    if ( mysqli_query($connect, $sql)) {
        header("location:list-user.php");
    } else {
        echo mysqli_error($connect);
    }
}
elseif (isset($_GET["id_user"])) {
    $id_user = $_GET["id_user"];
    
    # hapus data yg ada di tabel buku
    $sql = "delete from user where id_user='$id_user'";
    if (mysqli_query($connect, $sql)) {
        header("location:list-user.php");
    } else {
        echo mysqli_error($connect);
    }
}
?>