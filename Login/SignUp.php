<?php 
  $conn   = oci_connect("SPO", "SPO", "//localhost/XE");
  if(isset($_POST["submit"])){
    // Ambil data pengguna.
    $Nama       = $_POST["nama"];
    $Email      = $_POST["email"];
    $password   = $_POST["password"];
    $password2  = $_POST["password2"];

    $querylama  = "SELECT email from pengguna where email='$Email'";
    $hasil = oci_parse($conn, $querylama);
    oci_execute($hasil);
    if(oci_fetch_all($hasil, $res)>0){
      // Jika email sebelumnya telah terdaftar.
      echo "
      <script>
        alert('Email sudah terdaftar!');
      </script>
      ";
    } else {
        if($password!=$password2){
          // Jika Password dan Konfirmasi Password tidak sama.
          echo "
          <script>
            alert('Konfirmasi Password tidak sesuai dengan Password');
          </script>
          ";
        } else {
          // Jika Password dan Konfirmasi Password sama.
          $query      = "INSERT INTO pengguna VALUES(pengguna_seq.nextval,
                        '$Nama', '$Email', '$password', 0, current_date, null)";
          $hasil = oci_parse($conn, $query);
          oci_execute($hasil);
          echo "
          <script>
            alert('Registrasi Berhasil!');
            document.location.href= 'login.php';
          </script>
          ";
        }
    }
  }
?>


<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
    <title>SignUp Form</title>
    <link rel="icon" href="..\images/demo/the_edu.png">
    <link href="sgnup.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
</head>

<body>
<div class="signup">
    <form action="" method="post">
        <h2 style="color: #fff;">Sign Up</h2>
        <input type="text" name="nama" placeholder="Your name" required><br><br>
        <input type="text" name="email" placeholder="Alamat Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="password" name="password2" placeholder="Confirm Password" required><br><br>
        <input type="submit" value="Sign up" name="submit"><br><br>
            Sudah mempunyai akun?<a href="Login.php" style="text-decoration: none; font-family:Play, sans-serif; color: yellow;">&nbsp;Log In</a>
    </form>
</body>
</html>