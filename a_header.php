

<!DOCTYPE html>

<html>



<head>
   <meta charset="utf-8">
   <link rel ="stylesheet" type ="text/css" href="style.css">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  -->
          <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->  
           <!--<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  -->
    

</head>
<body>
            
      <header>
        <nav class="navbar navbar-expand-lg" style="background-color:#191934; height: 80px;">
  <img src="img/logo.png" width="119" height="70" class="d-inline-block align-top" alt="" style="margin-bottom: 10px;position: absolute" >
  
    
    <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left:1400px; margin-top:20px;">
                  <i class="material-icons" style="margin-left: 30px;"> notification_important</i>
            
                <?php
                require('includes/baza.php');
                
                $sql= "SELECT * FROM leaves WHERE status='unread' ORDER BY date DESC";
                  if ($result=mysqli_query($conn, $sql))
                  {
                        $rowcount=mysqli_num_rows($result);
                ?>
                <span  style="margin-bottom:30px; " class="badge badge-dark" ><?php echo ($rowcount); ?></span>
              <?php
                }
                    ?>
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01" style="margin-left:1250px;margin-top:-10px;width:255px;">
                <?php
             $sql1 = "SELECT leaves.id,users.name,users.lastname,users.username, DATE_FORMAT( leaves.date , '%d.%m.%Y.' ) as date
            from leaves join users on leaves.user_name=users.id where status='unread'"; 
                 $result1=mysqli_query($conn, $sql1);
                  if (mysqli_num_rows($result1) > 0)
                  {
                     while($i = mysqli_fetch_assoc($result1)){
                ?>
               <a style ="
                         <?php
                         $status='unread';
                            if($i==$status){
                                echo "font-weight:bold;";
                            }
                            
                            
                         ?>
                         " class="dropdown-item"  href="a_detalji_odsustva.php?id=<?php echo $i['id'] ?>">
               <b><?php echo $i['username'] ?></br></b> <small><?php echo"šalje zahtjev za odsustvo" ?></small> </br>
                <small><i><?php echo date('d.m.Y. ',strtotime($i['date'])) ?></i></small><br/>
                  <?php 
                  $type='message';
                if($i== $type){
                    echo "";
                }
                  ?>
                </a>
               
              
               
              <div  class="dropdown-divider" ></div>
                <?php
                     }
                 }else{
                     echo "Nema podataka.";
                 }
                     ?>
            </div>
          </li>
        </ul>
        
        
        
        
          
  
      </header>