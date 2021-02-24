<?php
session_start();
if (isset($_SESSION['username']) && ($_SESSION['username']) != "Admin") {
    header("location: index.php");
}
?>
<!DOCTYPE html>

<html>



<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
    <link rel ="stylesheet" type ="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
    

</head>
<body>
 <style>
	
.form-popup {
  display: none;
  position: fixed;
  bottom: 110px;
  left: 73px;
  border: 1px solid black;
  z-index: 9;
}
</style>	
 
<aside>
			<div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="img/user.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                                <p>Admin</p>
                    </div>
			 </div>
		<nav id="sidebar">
   		<div class="sidebar-header">
   		</div>
   		<ul class="list-unstyled components">
   			
   			<li class="active">
   				<a href="#Zaposlenici" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Zaposlenici</a>
   				<ul class="collapse list-unstyled" id="Zaposlenici">
   					
   					<li>
   						<a href="a_dodaj_zaposlenika.php">Dodaj zaposlenika</a>
   					</li>
   				</ul> 
   			</li>
   			<li>
   				<a href="#RadnoVrijeme" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Radno vrijeme</a>
   				<ul class="collapse list-unstyled" id="RadnoVrijeme">
   					<li>
   						<a href="a_dnevna_evidencija_sati.php">Dnevna evidencija</a>
   					</li>
   					<li>
   						<a href="a_mjesecna_evidencija_sati.php">Mjesečna evidencija </a>
   					</li>
   				</ul> 
   			</li>
			<li>
   				<a href="a_odsutnosti.php">Odsutnosti</a>
   			</li>
   			<li>
   				<a href="a_kalendar.php">Kalendar</a>
   			</li>
   			<li>
   				<a href="odjava.php">Odjava</a>
   			</li>
   		</ul>
   		
   		
   	</nav>
                      <div class="footer">
                    <p class="copyright">© Web aplikacija za evidenciju radnog vremena</p>
	</aside>



            
      <header>
        <nav class="navbar navbar-expand-lg" style="background-color:#191934; height: 80px;">
  <img src="img/logo.png" width="119" height="70" class="d-inline-block align-top" alt="" style="margin-bottom: 10px;position: absolute" >

   </header>

<div class="box" style="margin-left: 100px;
    margin-top:20px;width: 1200px; position: fixed;" >
	
	<h2 >Detalji odsustva</h2>
<?php
require('includes/baza.php');
//
if(isset($_POST['update']))
{ 
$lid = $_GET['id'];
$description=$_POST['description'];
$approval=$_POST['approval'];   
date_default_timezone_set('Europe/Zagreb');
$noteDate=date('d.m.Y.   H:i:s', strtotime("now"));
$sql2 ="UPDATE leaves SET note='$description', approval='$approval',NoteDate='$noteDate' WHERE id = '$lid'";
$result2=mysqli_query($conn, $sql2);
$msg="";
}
?>	

<table class="table table-striped table-hover" id="table" >

    
<?php
    
    require('includes/baza.php');
//pročitana obavijest za odsustvo
    $id = $_GET['id'];
    $sql ="UPDATE leaves SET status='read' WHERE id = '$id'";
    $result=mysqli_query($conn, $sql);
				//otvaranje podatak odustva koje je zaposlenik poslao adminu
    $sql1 = "SELECT name, lastname,username,leave_type,  DATE_FORMAT( from_date , '%d.%m.%Y.' ) as from_date, DATE_FORMAT( to_date , '%d.%m.%Y.' ) as to_date, DATE_FORMAT( date , '%d.%m.%Y.' ) as date, description, approval, Note, NoteDate, type from leaves left join users on users.id=leaves.user_name where leaves.id = $id";
     $result1=mysqli_query($conn, $sql1);
                  if (mysqli_num_rows($result1) > 0)
                  {
                     while($i = mysqli_fetch_assoc($result1)){
            if($i['type']=='message'){
?>
				<tr> 
                                              <td style="font-size:16px;"><b>Ime :</b></td>
                                              <td><?php echo $i['name']?></td>
                                              <td style="font-size:16px;"><b>Prezime:</b></td>
                                              <td><?php echo $i['lastname']?></td>
			          <td style="font-size:16px;"><b>Korisničko ime:</b></td>
                                              <td><?php echo $i['username']?></td>
				</tr>
				

				
				<tr> 
                                              <td style="font-size:16px;"><b>Vrsta odsustva:</b></td>
                                              <td><?php echo $i['leave_type']?></td>
                                              <td style="font-size:16px;"><b>Datum odlaska:</b></td>
                                              <td><?php echo $i['from_date']?> do <?php echo $i['to_date']?></td>
			          <td style="font-size:16px;"><b>Datum objave:</b></td>
                                              <td><?php echo $i['date']?></td>
				</tr>
				
				<tr> 
                                              <td style="font-size:16px;"><b>Opis odsustva:</b></td>
                                              <td colspan="5"><?php echo $i['description']?></td>
				</tr>
				
                                            <tr>
				<td style="font-size:16px;"><b>Odobrenje odsustva:</b></td>
				<td colspan="5"><?php $stats=$i['approval'];
				if($stats==1){
				?>
				<span style="color: green">Odobreno</span>
				 <?php } if($stats==2)  { ?>
				<span style="color: red">Nije odobreno</span>
				<?php } if($stats==0)  { ?>
				 <span style="color: blue">Odobravanje u tijeku</span>
				<?php } ?>
				</td>
				</tr>
			        <tr>
				<td style="font-size:16px;"><b>Bilješka: </b></td>
				<td colspan="5"><?php
				if($i['Note']==""){
				 echo "";  
				}
				else{
				 echo $i['Note'];
				}
				?></td>
				 </tr>
			        
				 <tr>
				<td style="font-size:16px;"><b>Datum bilješke: </b></td>
				<td colspan="5"><?php
				if($i['NoteDate']==""){
				 echo "";  
				}
				else{
				echo $i['NoteDate'];
				}
				?>
				
				</td>
				 </tr>
				
				<tr>
					<td colspan="5">
				<?php 
				if($stats==0)
				{

				?>
				<!--kreiranje gumba za otvaranje forme kao pop-up prozor-->
				<input type="submit" class="open-button" onclick="openForm();" value="Odobri">
 

<div class="form-popup" id="form">
<!--	krerianje forme gdje admin potvrđuje odsustvo zaposlenika-->
  <form method="post" class="form-container">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeForm();"><span aria-hidden="true">&times;</span></button>
    <h3>Odsustvo</h3>

    <select class="browser-default" name="approval" required="">
                                            <option value="">	Odaberi</option>
                                            <option value="1">Odobreno</option>
                                            <option value="2">Nije odobreno </option>
                                        </select></p>
                                        <p><textarea id="textarea1" name="description" class="materialize-textarea" name="description"
                                        placeholder="Opis" length="500" maxlength="500" required></textarea></p>

    <input type="submit" name="update" value="Potvrdi">
    
  </form>
</div>

 </td>
</tr>
				
<?php } ?>				

</tr>
<?php   
					 }
					}
				  }
	      
				?>
</table>


<br/>

</div>
 <script>
function openForm() {
  document.getElementById("form").style.display = "block";
}

function closeForm() {
  document.getElementById("form").style.display = "none";
}

</script>
	
	<script src="https://www.w3schools.com/lib/w3.js"></script>
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