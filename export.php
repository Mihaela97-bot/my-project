<?php
session_start();
    //Connect to database
    require('includes/baza.php');

$output = '';
$outputdata = $_SESSION['exportdata'];

if(isset($_POST["export"])){

    $query = "SELECT DATE_FORMAT( DateLog , '%d.%m.%Y.' ) as DateLog, SerialNumber, Name, CardNumber,TimeIn,TimeOut FROM logs WHERE DateLog='$outputdata' ";
    $result = mysqli_query($conn, $query);
    if($result->num_rows > 0){
        $output .= '
                    <table class="table" bordered="2">  
                      <tr>
                        <th>Serijski broj</th> 
                        <th>Korisnicko ime</th>
                        <th>ID kartica</th>
                        <th>Datum</th>
                        <th>Dolazak</th>
                        <th>Odlazak</th>
                      </tr>';

      while($row=$result->fetch_assoc()) {

          $output .= '
                      <tr>
                      <td> '.$row['SerialNumber'].'</td> 
                          <td> '.$row['Name'].'</td>
                          <td> '.$row['CardNumber'].'</td>
                          <td> '.$row['DateLog'].'</td>
                          <td> '.$row['TimeIn'].'</td>
                          <td> '.$row['TimeOut'].'</td>
                      </tr>';
      }
      $output .= '</table>';
      header('Content-Type: application/xls');
      header('Content-Disposition: attachment; filename=Dnevna evidencija sati'.$outputdata.'.xls');
      echo $output;
    }
    else{
        header( "location: a_dnevna_evidencija_sati.php" );
    }
}
?>