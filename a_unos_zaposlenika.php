<?php
session_start();

require ('includes/baza.php');


if ($_SERVER["REQUEST_METHOD"] == "POST"){


//prijava 
	if(isset($_POST['login'])) {

      $Uname = $_POST['Uname'];
      $Number = $_POST['Number'];
      $gender= $_POST['gender'];
	  $name = $_POST['name'];
	  $lastname = $_POST['lastname'];
	  $password = sha1($_POST['password']);
	  $birth_date = $_POST['birth_date'];
	  $address = $_POST['address'];
	  $city = $_POST['city'];
	  $Mobile_phone = $_POST['Mobile_phone'];
	  
      //provjeri dali ima odabrane kartice
      $sql = "SELECT CardID FROM users WHERE CardID_select=?";
      $result = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($result, $sql)) {
          header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
          exit();
      }
      else{
          $card_sel = 1;
          mysqli_stmt_bind_param($result, "i", $card_sel);
          mysqli_stmt_execute($result);
          $resultl = mysqli_stmt_get_result($result);
          if ($row = mysqli_fetch_assoc($resultl)) {
              // provjeri dali postoji korisnik sa tim serijskim brojem  
              $sql = "SELECT SerialNumber FROM users WHERE SerialNumber=?";
              $result = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($result, $sql)) {
                  header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
                  exit();
              }
              else{
                  mysqli_stmt_bind_param($result, "d", $Number);
                  mysqli_stmt_execute($result);
                  $resultl = mysqli_stmt_get_result($result);
                  if (!$row = mysqli_fetch_assoc($resultl)) {
                      //dodaj korisnika u bazu 
                      $sql = "UPDATE users SET username=?, SerialNumber=?, gender=?, name=?, lastname=?, password=?,birth_date=?,address=?, city=?, Mobile_phone=? WHERE CardID_select=?";
                      $result = mysqli_stmt_init($conn);
                      if (!mysqli_stmt_prepare($result, $sql)) {
                          header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
                          exit();
                      }
                      else{
                          $card_sel = 1;
                          mysqli_stmt_bind_param($result, "sdsssssssii", $Uname, $Number, $gender, $name, $lastname,$password, $birth_date,$address, $city,$Mobile_phone, $card_sel);
                          mysqli_stmt_execute($result);
                          header("location: a_dodaj_zaposlenika.php?success=Registered");
                          exit();
                      }
                  }
                  //serijski broj već postoji 
                  else{
                      header("location: a_dodaj_zaposlenika.php?error=SerialNumber_taken");
                      exit();
                  }
              }
          }
          //nema odabrane kartice za dodavanje
          else{
              header("location: a_dodaj_zaposlenika.php?error=No_selecting_card");
              exit();
          }
      }
  }
  
  
  
//ažuriraj 
  if (isset($_POST['update'])) {
        
      $Uname = $_POST['Uname'];
      $Number = $_POST['Number'];
      $gender= $_POST['gender'];
	  $name= $_POST['name'];
	  $lastname= $_POST['lastname'];
	  $password= sha1($_POST['password']);
	  $birth_date= $_POST['birth_date'];
	  $address= $_POST['address'];
	  $city= $_POST['city'];
	  $Mobile_phone= $_POST['Mobile_phone'];
      
      $sql = "SELECT CardID FROM users WHERE CardID_select=?";
      $result = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($result, $sql)) {
          header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
          exit();
      }
      else{
          $card_sel = 1;
          mysqli_stmt_bind_param($result, "i", $card_sel);
          mysqli_stmt_execute($result);
          $resultl = mysqli_stmt_get_result($result);
          if ($row = mysqli_fetch_assoc($resultl)) {
              //provjeri dali postoji korisnik sa tim serijskim brojem
              $sql = "SELECT SerialNumber FROM users WHERE SerialNumber=?";
              $result = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($result, $sql)) {
                  header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
                  exit();
              }
              else{
                  mysqli_stmt_bind_param($result, "d", $Number);
                  mysqli_stmt_execute($result);
                  $resultl = mysqli_stmt_get_result($result);
                  if (!$row = mysqli_fetch_assoc($resultl)) {
                      //dodaj korisnika u bazu
                      $sql = "UPDATE users SET username=?, SerialNumber=?, gender=?, name=?, lastname=?, password=?, birth_date=?,address=?,city=?, Mobile_phone=? WHERE CardID_select=?";
                      $result = mysqli_stmt_init($conn);
                      if (!mysqli_stmt_prepare($result, $sql)) {
                          header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
                          exit();
                      }
                      else{
                          mysqli_stmt_bind_param($result, "sdsssssssii", $Uname, $Number, $gender, $name, $lastname,$password,$birth_date,$address,$city,$Mobile_phone, $card_sel);
                          mysqli_stmt_execute($result);
                          header("location: a_dodaj_zaposlenika.php?success=Updated");
                          exit();
                      }
                  }
                  //serijski broj već postoji 
                  else{
                      header("location: a_dodaj_zaposlenika.php?error=SerialNumber_taken");
                      exit();
                  }
              }
          }
          else{
              header("location: a_dodaj_zaposlenika.php?error=No_selecting_card");
              exit();
          }
      }
  }

  
  //obriši
    if(isset($_POST['del']))  {

        
        if (!empty($_POST['CardID'])) {

            $CardID = $_POST['CardID'];
            $sql = "SELECT CardID FROM users WHERE CardID=?";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
                exit();
            }
            else{
                mysqli_stmt_bind_param($result, "s", $CardID);
                mysqli_stmt_execute($result);
                $resultl = mysqli_stmt_get_result($result);
                if ($row = mysqli_fetch_assoc($resultl)) {

                    $sql ="DELETE FROM users WHERE CardID=?";
                    $result = mysqli_stmt_init($conn);
                    if ( !mysqli_stmt_prepare($result, $sql)){
                        header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($result, "s", $CardID);
                        mysqli_stmt_execute($result);
                        header("location: a_dodaj_zaposlenika.php?success=Deleted");
                        exit();
                    }
                }
                else{
                    header("location: a_dodaj_zaposlenika.php?error=Card_not_exist");
                    exit();
                }
            }
        }
        else{
            header("location: a_dodaj_zaposlenika.php?error=No_selecting_card");
            exit();
        }
    }

	
	//odaberi
    if(isset($_POST['set'])) {

        if (!empty($_POST['CardID'])) {
          
            $CardID = $_POST['CardID'];

            $sql = "SELECT CardID FROM users WHERE CardID=?";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
                exit();
            }
            else{
                mysqli_stmt_bind_param($result, "s", $CardID);
                mysqli_stmt_execute($result);
                $resultl = mysqli_stmt_get_result($result);
                if ($row = mysqli_fetch_assoc($resultl)) {

                    $sql = "SELECT CardID_select FROM users WHERE CardID_select=?";
                    $result = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($result, $sql)) {
                        header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
                        exit();
                    }
                    else{
                        $card_sel = 1;
                        mysqli_stmt_bind_param($result, "i", $card_sel);
                        mysqli_stmt_execute($result);
                        $resultl = mysqli_stmt_get_result($result);
                        if ($row = mysqli_fetch_assoc($resultl)) {

                            $sql = "UPDATE users SET CardID_select=?";
                            $result = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($result, $sql)) {
                                header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
                                exit();
                            }
                            else{
                                $card_sel = 0;
                                mysqli_stmt_bind_param($result, "i", $card_sel);
                                mysqli_stmt_execute($result);

                                $sql = "UPDATE users SET CardID_select=? WHERE CardID=?";
                                $result = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($result, $sql)) {
                                    header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
                                    exit();
                                }
                                else{
                                    $card_sel = 1;
                                    mysqli_stmt_bind_param($result, "is", $card_sel, $CardID);
                                    mysqli_stmt_execute($result);
                                    header("location: a_dodaj_zaposlenika.php?success=Selected");
                                    exit();
                                }
                            }
                        }
                        else{
                            $sql = "UPDATE users SET CardID_select=? WHERE CardID=?";
                            $result = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($result, $sql)) {
                                header("location: a_dodaj_zaposlenika.php?error=SQL_Error");
                                exit();
                            }
                            else{
                                $card_sel = 1;
                                mysqli_stmt_bind_param($result, "is", $card_sel, $CardID);
                                mysqli_stmt_execute($result);
                                header("location: a_dodaj_zaposlenika.php?success=Selected");
                                exit();
                            }
                        }
                    }    
                }
                else{
                    header("location: a_dodaj_zaposlenika.php?error=Card_not_exist");
                    exit();
                }
            }
        }
        else{
            header("location: a_dodaj_zaposlenika.php?error=No_selecting_card");
            exit();
        }
    }
}

?>