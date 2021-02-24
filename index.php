<?php
session_start();

require('includes/baza.php');

$msg="";

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password= sha1($_POST['password']);
  
  //ukoliko su prazna polja za korisničko ime, lozinku i tip korisnika, vraća na index stranicu
   if (empty ($username) || empty($password) ){
    header("location:index.php?error=emptyfields");
    exit();
  }
  
  
  else {
  $sql = "SELECT * FROM users WHERE username=? AND password=?";
  $stmt=$conn->prepare($sql);
  $stmt->bind_param("ss",$username,$password);
  $stmt->execute();
  $result = $stmt->get_result();
  $row =$result->fetch_assoc();
  
  session_regenerate_id();
 $_SESSION['uid'] = $row['id'];
  $_SESSION['username'] = $row['username'];
  $_SESSION['name'] = $row['name'];
  $_SESSION['lastname'] = $row['lastname'];
  $_SESSION['gender'] = $row['gender'];
  $_SESSION['birth_date'] = $row['birth_date'];
  $_SESSION['address'] = $row['address'];
  $_SESSION['city'] = $row['city'];
  $_SESSION['Mobile_phone'] = $row['Mobile_phone'];

  session_write_close();
  
  }
  //ako je admin prijavljen, otvori se stranica dnevna_evidencija
    if ($result->num_rows ==1 && $_SESSION['username'] == "Admin"){
    header("location:a_dnevna_evidencija_sati.php");
  //ako je zaposlenik prijavljen, otvori se stranica njegovog profila
  }
  else if ($result->num_rows ==1  ){
    header("location:moj_profil.php");
  }
  
  
  else{
    $msg="Krivo korisničko ime / lozinka!";
  }
}

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <link rel ="stylesheet" type ="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      
      input[type="text"]{
    width: 240px;
    height: 44px;
    margin-top: 20px;
    margin-bottom: 25px;
    margin-left: 585px;
    font-size: 15px;
    border: 1px solid #000;
    padding-left: 50px;
     background-color:#191934;
     color:#fff;
}

input[type="password"]{
    width: 240px;
    height: 44px;
    margin-top: 5px;
    margin-bottom: 25px;
    margin-left: 585px;
    font-size: 15px;
    border: 1px solid #000;
    padding-left: 50px;
    background-color:#191934;
    color:#fff;
}


 input[type="submit"]{
    width: 291px;
    height: 44px;
    background: #0d0d26;
    color:#ffffff;
    font-size: 20px;
    margin-left: 585px;
    margin-bottom: 20px;
    cursor: pointer;
    text-align: left;
}

.a{
    color:#ffffff;
     margin-left: 660px;
    margin-top: 120px;  
}


.user{
    position: absolute;
    background: #191934;
    margin-left:590px;
    margin-top:23px;
    width: 44px;
    height: 30px;
    padding-top:8px;
}

.key{
    position: absolute;
    background: #191934;
    margin-left:590px;
    margin-top:8px;
    width: 44px;
    height: 30px;
    padding-top:8px;  
}

.sign{
    position: absolute;
    background:#0d0d26;
    margin-left:-47px;
    margin-top: 3px;
    width: 44px;
    height: 28px;
    padding-top:8px;
    
}
    </style> 
</head>

<body>
<div class="logo">
    <a href="index.php"> <img src="img/logo.png" width="310px" height=200px></a>
</div>

<div class="login">
<!--vraćanje forme na istu tu stranicu-->
      <form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST"  >
      
        <div  style="margin-bottom:17px;">
           <i class="fa fa-user-o fa-2x user" aria-hidden="true"></i>
           <input type="text" id="username" name="username" placeholder="Korisničko ime" autocomplete="off" required>
           </div>
         
         <div style="margin-top:-20px;">
          <i class="fa fa-key fa-2x key" aria-hidden="true"></i> <input type="password"id="password" name="password" placeholder="Lozinka" autocomplete="off" required
            style="width: 240px;height: 44px;margin-bottom: 35px; margin-left: 585px;font-size: 15px;border: 1px solid #000;padding-left: 50px;background-color:#191934;">
         </div>
         
          </br>
          <div style="margin-top:-20px;">
            <input type="submit" id="submit" name="login"  value=" &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Ulaz ">
            <i class="fa fa-sign-out fa-2x sign" aria-hidden="true"></i> <br>
            <a href="zaboravljena_lozinka.php" style="margin-left:645px; color:#4141be;" > <u>Zaboravili ste lozinku? </u></a>
        </div>
          </br>
        <p style="margin-left:600px;margin-top:20px; color:#fff; font-size: 130%;"> <?= $msg; ?></p>
      </form>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</body>
</html>
