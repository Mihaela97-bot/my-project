<?php
session_start();
if (isset($_SESSION['username']) && ($_SESSION['username']) != "Admin") {
    header("location: index.php");
}
require('includes/baza.php');    
    //uzimanje podataka trenutnog datuma i vrmena
    date_default_timezone_set('Europe/Zagreb');
    $d = date("Y-m-d");

    $Tarrive = mktime(07,00);
    $TimeArrive = date("H:i", $Tarrive);
 
    $Tleft = mktime(15,00);
    $Timeleft = date("H:i", $Tleft);
//ukoliko je datum prazan, nema podataka
    if (!empty($_POST['seldate'])) {
        $seldate = $_POST['date'];
    }
    else{
        $seldate = $d;
      }

	  //kreiranje sesije za izvoz podataka u excel
    $_SESSION["exportdata"] = $seldate;
?>
<?php
    include_once ('includes/a_sidebar.php');
?>

<?php
    include_once ('includes/a_header.php');
?>


<div class="box" style="margin-left: 100px;
    width: 1200px; " >
	<h2 >Dnevna evidencija sati</h2>
	<h4 style="margin-left: 15px;position: absolute;font-style: italic ;">
<b> Dolazak : <?php echo $TimeArrive?> h<br>
  Odlazak : <?php echo $Timeleft?> h </b> 
  
</h4>
	
	<!--kreiranje forme za pojedini datum-->
	<form method="POST" action="">
					<label style="margin-left: 800px;">Odaberi datum</label>
					<input type="date" name="date" style="margin-left: 800px; width:20%;">
					<input type="submit" name="seldate" value="Odaberi" style="margin-left:20px; width: 90px; margin-bottom:70px;position: absolute;"/>
				</form>
	</br>
	<form method="post" action="export.php">
  <button type="submit" name="export" class="export" style="border:none;background: none; margin-left:1070px;margin-bottom:10px;" title="Excel"><img src="img/excel.png" width="20" ></button>
</form>
	<table class="table table-striped table-hover" id="table">
<tr>
	<th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer" >Serijski broj <i class="fa fa-sort"></i></th> 
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer" >Korisničko ime <i class="fa fa-sort"></i></th>
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer" >ID kartica <i class="fa fa-sort"></i></th>
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer" >Datum <i class="fa fa-sort"></i></th>
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer" >Dolazak <i class="fa fa-sort"></i></th>
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer" >Odlazak <i class="fa fa-sort"></i></th>
    <!--<th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer" >Status dolaska <i class="fa fa-sort"></i></th>-->
</tr>

<?php


require('includes/baza.php');

$seldate = $_SESSION["exportdata"];
//uzimanje podataka iz tablice ukoliko se zaposlenik prijavio odnosno odjavio
$sql = "SELECT  DATE_FORMAT( DateLog , '%d.%m.%Y.' ) as DateLog,SerialNumber, Name,CardNumber,TimeIn,TimeOut,UserStat FROM logs WHERE DateLog='$seldate' ORDER BY id ASC";
$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
?>
        <tr class="item">
		
		<td><?php echo $row['SerialNumber'];?></td>
        <td><?php echo $row['Name'];?></td>
        <td><?php echo $row['CardNumber'];?></td>
        <td><?php echo $row['DateLog'];?></td>
        <td><?php echo $row['TimeIn'];?></td>
        <td><?php echo $row['TimeOut'];?></td>
        <!--<td><?php echo $row['UserStat'];?></td>-->
        </tr>
<?php
  }
}
?>
</table>
	
	
</div>

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
