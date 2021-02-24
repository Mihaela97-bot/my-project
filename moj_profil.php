<?php
require('includes/baza.php');
session_start();
if (isset($_SESSION['username']) && ($_SESSION['username']) == "Admin") {
    header("location: index.php");
}
?>

<?php
    include_once ('sidebar.php');
?>

<?php
    include_once ('header.php');
?>


<div class="box" style="margin-left: 100px;
    margin-top:-50px;width: 1200px; position: relative;" >
   
   <form action="moj_profil.php"  method="POST"  >
   <h2 >Moji podaci</h2>
    </br>
        </br>
<div class="row">
        <div class="row1">
<div>
        <label for="Uname" style="color:#4b4b9b;margin-top:-36px;">Korisničko ime</label>
        <input id="Uname" name="Uname" value="<?php echo $_SESSION['username'];?>" type="text" required="" disabled >
        
    </div>
<div>
   <label for="name" style="color:#4b4b9b;margin-top:-36px;">Ime</label>
        <input id="name" name="name" value="<?php echo $_SESSION['name'];?>" type="text" required="" disabled >
    </div>

<div>
        <label for="lastname" style="color:#4b4b9b;margin-top:-36px;">Prezime</label>
        <input id="lastname" name="lastname" value="<?php echo $_SESSION['lastname'];?>"type="text" required="" disabled >
        
    </div>
     
     <div>
        <label for="gender" style="color:#4b4b9b;margin-top:-36px;">Spol</label>
        <input id="gender" name="gender" value="<?php echo $_SESSION['gender'];?>" type="text" required="" disabled >
        
      </div>
    
     
        
        
        </div> 
        <div class="row2">
     
        
       </br>
       </br>
    <div>
        <label for="address" style="color:#4b4b9b;margin-top:-36px;">Adresa stanovanja</label>
        <input id="address" name="address" value="<?php echo $_SESSION['address'];?>" type="text" required="" disabled >
        
    </div>
    
    <div>
        <label for="city" style="color:#4b4b9b;margin-top:-36px;">Grad</label>
        <input id="city" name="city" value="<?php echo $_SESSION['city'];?>" type="text" required="" disabled >
        
    </div>
    
    <div>
        <label for="Mobile_phone" style="color:#4b4b9b;margin-top:-36px;">Mobitel</label>
        <input id="Mobile_phone" name="Mobile_phone" value="<?php echo $_SESSION['Mobile_phone'];?>" type="tel" required="" disabled >
        
    </div>
    
    
</div>
   </form>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

       
</body>
</html>