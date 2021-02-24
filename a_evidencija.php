<?php
require('includes/baza.php');

    //trenutni datum i vrijeme
    date_default_timezone_set('Europe/Zagreb');
    $d = date("Y-m-d");
    $t = date("H:i");

    $Tarrive = mktime(07,00);
    $TimeArrive = date("H:i", $Tarrive);

    $Tleft = mktime(15,00);
    $Timeleft = date("H:i", $Tleft);

   
   if(!empty($_GET['test'])){
    if($_GET['test'] == "test"){
        echo "";
        exit();
    }
}
   
    
if(!empty($_GET['CardID'])){

    $Card = $_GET['CardID'];

    $sql = "SELECT * FROM users WHERE CardID=?";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select_card";
        exit();
    }
    else{
        mysqli_stmt_bind_param($result, "s", $Card);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        if ($row = mysqli_fetch_assoc($resultl)){ 
            
            // kartica za prijavu ili odjavu
            if (!empty($row['username'])){
                $Uname = $row['username'];
                $Number = $row['SerialNumber'];
                $sql = "SELECT * FROM logs WHERE CardNumber=? AND DateLog=CURDATE()";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select_logs";
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($result, "s", $Card);
                    mysqli_stmt_execute($result);
                    $resultl = mysqli_stmt_get_result($result);
                    
                    
                    //prijava
                    if (!$row = mysqli_fetch_assoc($resultl)){
                        if ($t <= $TimeArrive) {
                            $UserStat = "Dolazak na vrijeme";
                        }
                        else{
                            $UserStat = "Kasni dolazak";
                        }
                        $sql = "INSERT INTO logs (CardNumber, Name, SerialNumber, DateLog, TimeIn, UserStat) VALUES (? ,?, ?, CURDATE(), CURTIME(), ?)";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_Select_login";
                            exit();
                        }
                        else{
                            mysqli_stmt_bind_param($result, "ssds", $Card, $Uname, $Number, $UserStat);
                            mysqli_stmt_execute($result);

                            echo "Prijava!";
                            exit();
                        }
                    }
                    
                    //odjava
                    else {
                        
                        if ($t >= $Timeleft && $row['TimeIn'] <= $TimeArrive) {
                            $UserStat = "Dolazak i odlazak na vrijeme";
                        }
                        elseif ($t < $Timeleft && $row['TimeIn'] > $TimeArrive){   
                            $UserStat = "Kasni dolazak i rani odlazak";
                        }
                        elseif ($t < $Timeleft && $row['TimeIn'] <= $TimeArrive) {
                            $UserStat = "Dolazak na vrijeme i rani odlazak";
                        }
                        elseif ($t >= $Timeleft && $row['TimeIn'] > $TimeArrive) {
                            $UserStat = "Kasni dolazak i odlazak na vrijeme";
                        }
                        
                        $sql="UPDATE logs SET TimeOut=CURTIME(), UserStat=? WHERE CardNumber=? AND DateLog=CURDATE()";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_insert_logout";
                            exit();
                        }
                        else{
                            mysqli_stmt_bind_param($result, "sd", $UserStat, $Card);
                            mysqli_stmt_execute($result);

                            echo "Odjava!";
                            exit();
                        }
                    }
                }
            }
            
            
            
            
            else{
                $sql = "SELECT CardID_select FROM users WHERE CardID_select=?";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select";
                    exit();
                }
                else{
                    $card_sel = 1;
                    mysqli_stmt_bind_param($result, "i", $card_sel);
                    mysqli_stmt_execute($result);
                    $resultl = mysqli_stmt_get_result($result);
                    
                    if ($row = mysqli_fetch_assoc($resultl)) {

                        $sql="UPDATE users SET CardID_select =?";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_insert";
                            exit();
                        }
                        else{
                            $card_sel = 0;
                            mysqli_stmt_bind_param($result, "i", $card_sel);
                            mysqli_stmt_execute($result);

                            $sql="UPDATE users SET CardID_select =? WHERE CardID=?";
                            $result = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($result, $sql)) {
                                echo "SQL_Error_insert_An_available_card";
                                exit();
                            }
                            else{
                                $card_sel = 1;
                                mysqli_stmt_bind_param($result, "is", $card_sel, $Card);
                                mysqli_stmt_execute($result);

                                echo "Kartica je dostupna!";
                                exit();
                            }
                        }
                    }
                    else{
                        $sql="UPDATE users SET CardID_select =? WHERE CardID=?";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_insert_An_available_card";
                            exit();
                        }
                        else{
                            $card_sel = 1;
                            mysqli_stmt_bind_param($result, "is", $card_sel, $Card);
                            mysqli_stmt_execute($result);

                            echo "Kartica je dostupna!";
                            exit();
                        }
                    }
                } 
            }
        }
        
        
        
        //nova kartica
        else{
            $Uname = "";
            $Number = "";
            $gender= "";
            $name= "";
            $lastname= "";
            $password= "";
            $birth_date="";
            $address="";
            $city="";
            $Mobile_phone="";

            $sql = "SELECT CardID_select FROM users WHERE CardID_select=?";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo "SQL_Error_Select";
                exit();
            }
            else{
                $card_sel = 1;
                mysqli_stmt_bind_param($result, "i", $card_sel);
                mysqli_stmt_execute($result);
                $resultl = mysqli_stmt_get_result($result);
                if ($row = mysqli_fetch_assoc($resultl)) {

                    $sql="UPDATE users SET CardID_select =?";
                    $result = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($result, $sql)) {
                        echo "SQL_Error_insert";
                        exit();
                    }
                    else{
                        $card_sel = 0;
                        mysqli_stmt_bind_param($result, "i", $card_sel);
                        mysqli_stmt_execute($result);

                        $sql = "INSERT INTO users (username , SerialNumber, gender, name, lastname,password,birth_date,address,city, Mobile_phone, CardID, CardID_select)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_Select_add";
                            exit();
                        }
                        else{
                            $card_sel = 1;
                            mysqli_stmt_bind_param($result, "sdssssssssisi", $Uname, $Number, $gender, $name, $lastname, $password, $birth_date,$address,$city,$Mobile_phone, $Card, $card_sel );
                            mysqli_stmt_execute($result);

                            echo "Uspješno dodano!";
                            exit();
                        }
                    }
                }
                else{
                    $sql = "INSERT INTO users (username , SerialNumber, gender, name, lastname, password,birth_date,address, city,Mobile_phone, CardID, CardID_select)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $result = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($result, $sql)) {
                        echo "SQL_Error_Select_add";
                        exit();
                    }
                    else{
                        $card_sel = 1;
                        mysqli_stmt_bind_param($result, "sdsssssssisi", $Uname, $Number, $gender, $name, $lastname,$password, $birth_date,$address,$city, $Mobile_phone, $Card, $card_sel);
                        mysqli_stmt_execute($result);

                        echo "Uspješno dodano!";
                        exit();
                    }
                }
            } 
        }    
    }
}


else{
    echo "Prazna ID kartica!";
    exit();
}
mysqli_stmt_close($result);
mysqli_close($conn);
?>
