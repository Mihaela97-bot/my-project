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



<div class="box" style=" position: fixed;margin-left: 100px;
margin-top:40px; width: 1200px; min-height: 600px;" >       
<div class="container ">
    <div class="card">
   <div style="padding-right: 30px;">
    <a id="previous" href=""  onclick="previous();return false" ><span class="glyphicon glyphicon-chevron-left" style="font-size:32px; position: absolute; margin-top:27px;margin-left:-160px;"></span></a>
     <h2  style="margin-top: 30px;" id="monthAndYear"></h2>
    <a  id="next" href="" onclick="next();return false"><span class="glyphicon glyphicon-chevron-right" style="font-size:32px; position: absolute; margin-top:27px;margin-left:125px;" ></span></a> 
       </div>
        <table class="table table-bordered table-responsive-sm" id="calendar">
            <thead>
            <tr>
                <th bgcolor="#a9a9d6">NED</th>
                <th bgcolor="#a9a9d6">PON</th>
                <th bgcolor="#a9a9d6">UTO</th>
                <th bgcolor="#a9a9d6">SRI</th>
                <th bgcolor="#a9a9d6">ČET</th>
                <th bgcolor="#a9a9d6">PET</th>
                <th bgcolor="#a9a9d6">SUB</th>
            </tr>
            </thead>

            <tbody id="calendar-body">

            </tbody>
        </table>

        
        <br/>
        <form class="form-inline">
            
            <a name="month" id="month" onchange="jump();"></a>
            <a name="year" id="year" onchange="jump();"></a>
            
           
        </form>
    </div>
    <div class="legenda" style="margin-right:700px; margin-top:20px;">
    <h3>Legenda:</h3>
    
     <h5>Planiran dan isplate plaće: <button  style="background-color: #dc3545;border: none;padding: 16px 30px;text-decoration: none;display: inline-block;margin-left:5px;"></button></h5>
     
</div>
</div>


</div>

<script src="scripts.js"></script>


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