<?php
//memasukkan file kedalam dokumen kita, file tersebut bisa script PHP, file HTML dll
include "koneksi.php";
//variabel id user untuk menampung dan menampilkan id user pada database
$id_user = $_POST['id_user'];
//variabel password untuk menampung dan menampilkan password pada database tetapi menggunakan MD5
$pass=md5($_POST['password']);
//Variabel untuk menampilkan hasil dari id user dan pass
$sql="SELECT * FROM users WHERE id_user='$id_user' AND password='$pass'";
//variabel untuk mengkoneksi ke sql
$login=mysqli_query($con,$sql);
//variabel untuk mengecek dimana baris id dan pass kita berada dalam database 
$ketemu=mysqli_num_rows($login);
$r= mysqli_fetch_array($login);
if ($ketemu > 0){
 session_start();
 //untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser
 $_SESSION['iduser'] = $r['id_user'];
 //session untuk melakukan pengecekan id user kita sudah benar atau belum
 $_SESSION['passuser'] = $r['password'];
  //session untuk melakukan pengecekan password kita sudah benar atau belum
echo"USER BERHASIL LOGIN<br>";
echo "id user =",$_SESSION['iduser'],"<br>";
echo "password=",$_SESSION['passuser'],"<br>";
echo "<a href=logout.php><b>LOGOUT</b></a></center>";
}
else{
echo "<center>Login gagal! username & password tidak benar<br>";
echo "<a href=form_login.php><b>ULANGILAGI</b></a></center>";
}
mysqli_close($con);//fungsi untuk menutup koneksi database
?>