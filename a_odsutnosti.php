<?php  
session_start();
if (isset($_SESSION['username']) && ($_SESSION['username']) != "Admin") {
    header("location: index.php");
}
?>

<?php
    include_once ('includes/a_sidebar.php');
?>

<?php
    include_once ('includes/a_header.php');
?>
<div class="box" style="margin-left: 100px;
    margin-top:-40px;width: 1200px; position: relative; 
  z-index: 1; " >
	
	<h2 >Odsutnosti</h2>
<table  class="table table-striped table-hover" id="table"  >
  <tr>
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer">Ime  <i class="fa fa-sort"></i> </th>
	 <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer">Prezime  <i class="fa fa-sort"></i> </th>
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer" >Korisničko ime  <i class="fa fa-sort"></i> </th>
	 <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer" >Vrsta odsustva  <i class="fa fa-sort"></i> </th> 
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer">Datum objave  <i class="fa fa-sort"></i> </th>
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer">Odobrenje odsustva  <i class="fa fa-sort"></i> </th>    
   <th></th>
	<th></th>
	<th colspan="2"></th>
	<th></th>
  </tr> 
<?php  
//Connect to database
require('includes/baza.php');

$sql ="SELECT leaves.id as lid,users.name,users.lastname,users.username,users.id,leaves.leave_type, DATE_FORMAT( leaves.date , '%d.%m.%Y.' ) as date,leaves.approval
from leaves join users on leaves.user_name=users.id order by lid ASC";
$result=mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_assoc($result))
    {
?>
   <tr class="item"> 
      <td><?php echo $row['name']?></td>
		<td><?php echo $row['lastname']?></td>
      <td><?php echo $row['username']?></td>
		<td><?php echo $row['leave_type']?></td>
      <td><?php echo $row['date']?></td>
      <td colspan="3"><?php $stats=$row['approval'];
				if($stats==1){
				?>
				<span style="color: green">Odobreno</span>
				 <?php } if($stats==2)  { ?>
				<span style="color: red">Nije odobreno</span>
				<?php } if($stats==0)  { ?>
				 <span style="color: blue">Odobravanje u tijeku</span>
				<?php } ?>
				</td>
      
    <td colspan="2"><a href="a_detalji_odsustva.php?id=<?php echo $row['lid'] ?> " style="color:black;">Detalji </a></td>
	 <td></td>
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