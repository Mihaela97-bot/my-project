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
    margin-top:-30px;width: 1200px; " >
   
   
   <h2 >Evidencija sati</h2>
    </br>
       <form method="POST"   autocomplete="off">
		
		
		<div>
        <select id="year" name="year" style="width:10%; margin-left:350px;margin-top:-20px;border-bottom: 2px solid #666666;" required >
      <?php
	  $sql= "SELECT  DISTINCT YEAR(DateLog) as year FROM logs";
	  $result = mysqli_query($conn, $sql);
	  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        ?>
   <option value="<?php echo $row['year']?>"><?php echo $row['year']?></option>
<?php }} ?> 
	  
    </select>
		 </div>
		
		
		<div>
       <label for="month" name="month" style="color:#666666;margin-top:-54px;">Odaberi mjesec i godinu</label>
        <select id="month" name="month" style="width:30%;margin-top:-20px;border-bottom: 2px solid #666666;" required>
			 <option value="" disabled selected></option>
      <?php
	  $sql= "SELECT  DISTINCT MONTHNAME(DateLog) as month FROM logs ORDER by DateLog ASC";
	  $result = mysqli_query($conn, $sql);
	  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        ?>
   <option value="<?php echo $row['month']?>"><?php echo $row['month']?></option>
<?php }} ?> 
	  
    </select>
		 </div>
		<input type="submit"  value="Potvrdi" name="submit" style="margin-left: 500px;margin-top: -40px;position: fixed;" >
	</form >
       
       </br>
			</br>
			<table class="table table-striped table-bordered responsive">
				<tr>
					<th>Ukupno radnih dana</th>
					<th>Ukupno radnih sati</th>
				</tr>
       <?php
     
if(isset($_POST['submit'])){
   $user_name=$_SESSION['username'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	$sql1 = "SELECT COUNT(DateLog) as total_days, TIME(SUM(TIMEDIFF(TimeOut,TimeIn))) as total_hours from logs where Name='$user_name' AND YEAR(DateLog)='$year' AND MONTHNAME(DateLog)='$month' ";
	$result1 = mysqli_query($conn, $sql1);
	if (mysqli_num_rows($result1) > 0)
				{
         while($row1 = mysqli_fetch_assoc($result1))
						{
						?>
						<tr >
					 <td ><?php echo $row1['total_days']?> dana</td>
					  <td ><?php echo $row1['total_hours']?> sati</td>
						</tr>
						<?php
						}
				}
 $sql = "SELECT TIMEDIFF(TimeOut,TimeIn)as total_hours,TimeIn, DATE_FORMAT( DateLog , '%d.%m.%Y.' ) as DateLog,TimeOut,Name from logs where Name='$user_name' AND YEAR(DateLog)='$year' AND MONTHNAME(DateLog)='$month' ";
        $result = mysqli_query($conn, $sql);
		
        echo "<table class='table table-striped table-bordered responsive'>
            <thead>
                <tr>
					<th>Datum</th>
                    <th>Dolazak</th>
                    <th>Odlazak</th>
                    <th>Ukupno sati</th>
                </tr>
            </thead>";

            if (mysqli_num_rows($result) > 0) 
                {
                    while($row = mysqli_fetch_assoc($result)) 
                        {
							
                            echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" . $row['DateLog'] . "</td>";  
                                    echo "<td>" . $row['TimeIn'] . "</td>";       
                                    echo "<td>" . $row['TimeOut'] . "</td>";
									echo "<td>" . $row['total_hours'] . "</td>";
                                echo "</tr>";
                            echo "</tbody>";
							
                        }
						
						

                }
	
}
	?>
			

			</table>
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