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
    margin-top:-70px;width: 900px; position: relative;" >
     
   
      
    <h2 >Novo odsustvo</h2>
     
        
     <h4> <strong>  <?php 
          
          if(isset($_POST['submit'])){
               $user_name=$_SESSION['uid'];
               $leave_type = $_POST['leave_type'];
               $from_date = $_POST['from_date'];
               $to_date = $_POST['to_date'];
              $description = $_POST['description'];
             $approval=0;
              if($from_date>$to_date){
                echo " Drugi datum mora biti veći od prvog datuma. ";
              }
              else{
               echo "Uspješno dodano odsustvo.";
              }
            
              $sql ="INSERT INTO leaves( type,leave_type,from_date,to_date, description,approval, status, date,user_name)
              VALUES ( 'message', '$leave_type', '$from_date', '$to_date', '$description', '$approval','unread', CURRENT_TIMESTAMP,'$user_name')";
              
              if(mysqli_query($conn, $sql)){
                  echo "";
          }
          else{
            echo "ERROR $sql"  . mysqli_error($link);
          }
          }
          ?></strong></h4>
          </br>
          </br>
        </br>
        <form id="form" method="post" name="odsustvo">
      
    <div>
    <div>
      <label for="leave_type" name="leave_type" style="color:#666666;margin-top:-36px;">Odaberi odsustvo</label>
        <select id="leave_type" name="leave_type" required >
      <option value="" disabled selected></option>
      <option value="Godisnji odmor">Godisnji odmor</option>
      <option value="Slobodni dani">Slobodni dani</option>
    </select>
    
        </div>
    <br/>
    
      <div>
      <input id="from_date" name="from_date" type="date" class="datepicker" autocomplete="off" style="width: 60%; margin-top: 10px;" required  >
        <label for="from_date">Od datuma</label>
        </div>
      
      
        <div>
        <input id="to_date" name="to_date" type="date" class="datepicker" autocomplete="off" style="width: 60%; margin-top: 10px;"required  >
        <label for="to_date">Do datuma</label>
        </div>
        
        <div>
        <textarea id="description" name="description"  type="text" length="500" autocomplete="off" style="margin-top:10px;" required ></textarea>
        <label for="description" >Opis</label>
        </div>
        </br>
        </br>
        </br>
        </br>
        <input type="submit"  value="Potvrdi" name="submit">
    
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