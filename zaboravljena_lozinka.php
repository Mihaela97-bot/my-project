<?php
session_start();

require('includes/baza.php');
//kreiranje nove lozinke
if(isset($_POST['change']))
    {
        
$newpassword=sha1($_POST['newpassword']);
$username=$_SESSION['username'];

$sql="UPDATE users set password='$newpassword' where id='$username'";
//ako  korisnik i ponovna lozinka odgovaraju, vračaj na index stranicu
if ($conn->query($sql) === TRUE) {
    header("location:index.php");
    //ako ne odgovara, vračaj ponovno na stranicu zaboravljena_lozinka
} else {
    header("location:zaboravljena_lozinka.php");
}
    }

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <link rel ="stylesheet" type ="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
     
    
</head>

<body>
<div class="logo">
   <a href="index.php"> <img src="img/logo.png" width="310px" height=200px></a>
</div>

<div class="login">
<div class="box" style=";
    width: 350px; background: rgba(255,255,255,0.04); left:50%;">
<!--forma za uzimanje korisnika koji želi promijeniti lozinku-->
      <form name="signin" method="POST" > 
        
         <div>
        <input id="username" name="username" type="text" autocomplete="off" style=" color:#fff;background: rgba(255,255,255,0.04); border:none;"  required>
        <label for="username">Korisničko ime</label>
    </div>   
          <div>
            <input type="submit" id="submit" name="submit"   value="Potvrdi korisnika " style="border:none; font-size:10px;margin-left:230px;margin-bottom:20px;">
           
        </div>
          
      </form>
      
      
      
      
      
<?php
//pozivanje korisnika koji želi promijeniti lozinku
if(isset($_POST['submit']))
{
$username=$_POST['username'];
$sql ="SELECT id FROM users WHERE username='$username'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // izlazni podaci svakog retka
    while($row = $result->fetch_assoc()) {
      $_SESSION['username']=$_SESSION['uid'] = $row['id'];
    }

    ?>
    
    
   <!-- forma za kreiranje nove lozinke-->
<form name="change_password" method="POST">
  
          <div>
        <input id="newpassword" name="newpassword" type="password" autocomplete="off" class="validate" style="color:#fff;background: rgba(255,255,255,0.04); border:none;" required>
        <label for="newpassword">Nova lozinka</label>
    </div>
          
          <div>
        <input id="confirmpassword" name="confirmpassword" type="password" autocomplete="off" class="validate" style="color:#fff;background: rgba(255,255,255,0.04); border:none;" required>
        <label for="confirmpassword">Potvrdi lozinku</label>
    </div>
          <div>
            <input type="submit" id="submit" name="change"  onclick="return valid();" value="Promijeni lozinku " style="border:none; font-size:10px;margin-top:-20px;">
           
        </div>
         
</form>
<?php } else{
  ?>
  
<!--ako je korišteno korisničko ime koje se ne nalazi u bazi, izbaci grešku-->
<div  style="margin-left: 20%; color:#fff; font-size: 130%;"> 
  <?php echo "Krivo korisničko ime!";
}?></div>
<?php } ?>
</div>
</div>

<script>
function valid()
{
if(document.change_password.newpassword.value!= document.change_password.confirmpassword.value)
{
alert("Nova lozinka i potvrđena lozinka ne odgovaraju!");
document.change_password.confirmpassword.focus();
return false;
}
return true;
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</body>
</html>
