<?php 
  $conn   = oci_connect("SPO", "SPO", "//localhost/XE");
  if(isset($_POST["submit"])){
    $Email      = $_POST["email"];
    $password   = $_POST["password"];
    $query      =   "SELECT email, password FROM pengguna 
                    WHERE email='$Email' AND password='$password'";
    $array      = oci_parse($conn, $query);
    oci_execute($array);
    if(oci_fetch_all($array, $res)>0){
      // Diubah buat lempar ke Dashboard.
      header("Location: cong.html");
    } else {
      echo "
        <script>
          alert('Email atau Password yang anda masukkan salah!');
        </script>
      ";
    }
  }
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
<title>Log In</title>
<link rel="icon" href="..\images/demo/the_edu.png">
<link href="login.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
</head>

<body>
		<div class="signin">
		<form action="" method="post">
			<h2 style="color: white">Log In</h2>
			<input type="text" name="email" id="email"
			placeholder="Alamat Email" required><br /><br />
			<input type="password" name="password" id="password"
			placeholder="Password" required><br /><br />
			<input type= "submit" value="Log In" name="submit"><br />
			<br />
			<div id="container">
				<a href="resetpw.html" style="margin-right:0px; font-size:13px;
				font-family:Tahoma, Geneva, sans-serif;">Reset Password</a>
				<a href="forgetpw.html" style="margin-left:30px; font-size:13px;
				font-family:Tahoma, Geneva, sans-serif;">Lupa Password</a>
			</div><br /><br /><br /><br />
			Belum mempunyai Akun?<a href ="SignUp.html" style="font-family:'Play', sans-serif";>&nbsp;Sign Up</a>
			<br /><br />
			<a href ="..\index.html" style="font-family:'Play', sans-serif";>&nbsp;Home</a>
			
			</form>
		</div>
</body>

</html>