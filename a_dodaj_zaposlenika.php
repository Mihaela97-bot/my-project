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
    width: 1250px; margin-top: 270px; z-index: 1;" >
    
        
  <form action="a_unos_zaposlenika.php" id="form"  method="POST"  name="zaposlenici" autocomplete="off">
   
        <h2 >Novi zaposlenik</h2>
        
    <div class="row">
        <div class="row1">
    
     
      <div>
        <input id="Number" name="Number" type="number" required="">
        <label for="Number">Serijski broj</label>
    </div>
     
     <div>
        <input id="Uname" name="Uname" type="text" required="">
        <label for="Uname">Korisničko ime</label>
    </div>
     <div>
        <input id="name" name="name" type="text" required="">
        <label for="name">Ime</label>
    </div>
     
     <div>
        <input id="lastname" name="lastname" type="text" required="">
        <label for="lastname">Prezime</label>
    </div>
     
     
     <div>
        <input id="password" name="password" type="password" required="">
        <label for="password">Lozinka</label>
    </div>
     
     <div>
        <input id="confirmpassword" name="confirmpassword" type="password" required="">
        <label for="confirmpassword">Potvrdi lozinku</label>
    </div>
     </br>
     
    
     </div>
        
        <div class="row2">
      </br>
       </br>
      </br>
      <div>
        <label for="gender" name="gender" style="color:#666666;margin-top:-26px;">Spol</label>
        <select id="gender" name="gender" style="width:100%;" required >
      <option value="" disabled selected></option>
      <option value="Žensko">Žensko</option> </br>
      <option value="Muško">Muško</option>
    </select>
      </div>
       </br>
        <div>
        <input id="Mobile_phone" name="Mobile_phone" type="tel" required="">
        <label for="Mobile_phone">Mobitel</label>
    </div>
      <div>
        <input id="birth_date" name="birth_date" type="date" class="datepicker" style="border-bottom:2px solid #666666;" autocomplete="off" >
        <label for="birth_date" style="color:#666666;">Datum rođenja</label>
       </div>
        
      
    <div>
        <input id="address" name="address" type="text" required="">
        <label for="address">Adresa stanovanja</label>
    </div>
    
    
    
    <div class="autocomplete">
        <input id="city" name="city" type="text" required="">
        <label for="city">Grad</label>
    </div>
     
      
</br>
</br>
</div>
    </br>
   <div>
    <input type="submit"  value="Dodaj" onclick="return valid();" name="login" style="width:130px; height: 50px; margin-left:-370px; margin-top:430px;">  <br>
   </div>
    <div>
        <input type="submit"  value="Ažuriraj"  onclick="return valid();" name="update" style="width:130px; height: 50px; margin-left:-200px; margin-top:430px;"> 
    </div>
  </form>
  
<form method="POST" action="a_unos_zaposlenika.php" autocomplete="off">
          <button type="submit" name="set"  style="border:none;background: none; margin-left:1100px; margin-top:15px;position: absolute;" title="Odaberi" ><img src="img/select.png" width="20" ></button>
            <input type="text" name="CardID" placeholder="Card ID" style="margin-left: 910px; width:20%;">  </br>
            </br>
            
<table  class="table table-striped table-hover" id="table" >
  <tr>
    <th  onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer" >ID <i class="fa fa-sort"></i>  </th>
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer">Serijski broj  <i class="fa fa-sort"></i> </th>
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer" >Korisničko ime  <i class="fa fa-sort"></i> </th> 
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer">Ime  <i class="fa fa-sort"></i> </th>
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer">Prezime  <i class="fa fa-sort"></i> </th>  
    <th onclick="w3.sortHTML('#table', '.item', 'td:nth-child(1)');" style="cursor:pointer">ID kartica  <i class="fa fa-sort"></i> </th>
    <TH colspan="2">    </TH>
   
  </tr> 
<?php  

require('includes/baza.php');

$sql ="SELECT * FROM users ORDER BY id ASC";
$result=mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_assoc($result))
    {
?>
   <tr class="item" style="<?php if($row['id'] == "0") echo 'display:none;'; ?>">
      <td ><?php echo $row['id']?> </td>  
      <td ><?php echo $row['SerialNumber']?></td>
      <td><?php echo $row['username']?></td>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['lastname']?></td> 
      <td><?php echo $row['CardID'];
          if ($row['CardID_select'] == 1) {
              echo '<img src="img/check-mark.png" style=" width="15" height="15" title="The selected Card">';
          }
          else{
              echo '';
          }?>
      </td>
     
     <td><button type="submit" name="del"  style="border:none;background: none; position: absolute;" title="Obriši" ><i class="material-icons">delete</i></button></td>
    <td></td>
   </tr> 
<?php   
    }
}
?>
</table>

        </form> 
 </div> 


<script>
function valid()
{
if(document.zaposlenici.password.value!= document.zaposlenici.confirmpassword.value)
{
alert("Lozinka i potvrđena lozinka ne odgovaraju!");
document.zaposlenici.confirmpassword.focus();
return false;
}
return true;
}
</script>


<script>
function autocomplete(inp, arr) {
  var currentFocus;
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(a);
      for (i = 0; i < arr.length; i++) {
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          b.addEventListener("click", function(e) {
              inp.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        currentFocus++;
        addActive(x);
      } else if (e.keyCode == 38) { //up
        currentFocus--;
        addActive(x);
      } else if (e.keyCode == 13) {
        e.preventDefault();
        if (currentFocus > -1) {
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    if (!x) return false;
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
var countries = ["Bedenica","Bistra","Brckovljani","Brdovec","Dubrava","Dubravica","Dugo Selo","Farkaševac","Gradec","Ivanić-Grad","Jakovlje","Jastrebarsko","Klinča Sela","Kloštar Ivanić","Krašić","Kravarsko","Križ","Luka","Marija Gorica","Orle","Pisarovina","Pokupsko","Preseka","Pušća","Rakovec","Rugvica","Samobor","Stupnik","Sveta Nedelja","Sveti Ivan Zelina","Velika Gorica","Vrbovec","Zaprešić","Žumberak","Bedekovčina","Budinščina","Desinić","Donja Stubica","Đurmanec","Gornja Stubica","Hrašćina","Hum na Sutli","Jesenje","Klanjec","Konjščina","Kraljevec na Sutli","Krapina","Krapinske Toplice","Kumrovec","Lobor","Mače","Marija Bistrica","Mihovljan","Novi Golubovec","Oroslavje","Petrovsko","Pregrada","Radoboj","Stubičke Toplice","Sveti Križ Začretje","Tuhelj","Veliko Trgovišće","Zabok","Zagorska Sela","Zlatar","Zlatar Bistrica","Donji Kukuruzari","Dvor","Glina","Gvozd","Hrvatska Dubica","Hrvatska Kostajnica","Jasenovac","Kutina","Lekenik","Lipovljani","Majur","Martinska Ves","Novska","Petrinja","Popovača","Sisak","Sunja","Topusko","Velika Ludina","Barilović","Bosiljevo","Cetingrad","Draganić","Generalski Stol","Josipdol","Kamanje","Krnjak","Lasinja","Netretić","Plaški","Rakovica","Ribnik","Saborsko","Tounj","Vojnić","Žakanje","Duga Resa","Karlovac","Ogulin","Ozalj","Slunj","Brinje","Donji Lapac","Gospić","Karlobag","Lovinac","Novalja","Otočac","Perušić","Plitvička Jezera","Senj","Udbina","Vrhovine","Bednja","Beretinec","Breznica","Breznički Hum","Cestica","Donja Voća","Gornji Kneginec","Jalžabet","Ivanec","Klenovnik","Ljubešćica","Lepoglava","Ludbreg","Mali Bukovec","Martijanec","Maruševec","Novi Marof","Petrijanec","Sračinec","Sveti Đurđ","Sveti Ilija","Trnovec Bartolovečki","Varaždin","Varaždinske Toplice","Veliki Bukovec","Vidovec","Visoko","Drnje","Đelekovec","Đurđevac","Ferdinandovac","Gola","Gornja Rijeka","Hlebine","Kalinovac","Kalnik","Kloštar Podravski","Koprivnički Bregi","Koprivnica","Koprivnički Ivanec","Legrad","Molve","Novigrad Podravski","Novo Virje","Peteranec","Podravske Sesvete","Rasinja","Sokolovac","Sveti Ivan Žabno","Sveti Petar Orehovec","Virje","Križevci","Berek","Bjelovar","Čazma","Daruvar","Dežanovac","Đulovac","Garešnica","Grubišno Polje","Hercegovac","Ivanska","Kapela","Končanica","Nova Rača","Rovišće","Severin","Sirač","Šandrovac","Štefanje","Velika Pisanica","Velika Trnovitica","Veliki Grđevac","Veliko Trojstvo","Zrinski Topolovac","Bakar","Baška","Brod Moravice","Cres","Crikvenica","Čabar","Čavle","Delnice","Dobrinj","Fužine","Jelenje","Kastav","Klana","Kostrena","Kraljevica","Krk","Lokve","Lopar","Lovran","Mali Lošinj","Malinska-Dubašnica","Matulji","Mošćenička Draga","Mrkopalj","Novi Vinodolski","Omišalj","Opatija","Rab","Ravna Gora","Rijeka","Skrad","Vinodolska općina","Viškovo","Vrbnik","Vrbovsko","Crnac","Čačinci","Čađavica","Gradina","Lukač","Mikleuš","Nova Bukovica","Orahovica","Pitomača","Slatina","Sopje","Suhopolje","Špišić Bukovica","Virovitica","Voćin","Zdenci","Brestovac","Čaglin","Jakšić","Kaptol","Kutjevo","Lipik","Pakrac","Požega","Velika","Bebrina","Brodski Stupnik","Bukovlje","Cernik","Davor","Donji Andrijevci","Dragalić","Garčin","Gornja Vrba","Gornji Bogićevci","Gundinci","Klakar","Nova Gradiška","Nova Kapela","Okučani","Oprisavci","Oriovac","Podcrkavlje","Rešetari","Sibinj","Sikirevci","Slavonski Brod","Slavonski Šamac","Stara Gradiška","Staro Petrovo Selo","Velika Kopanica","Vrbje","Vrpolje","Benkovac","Bibinje","Biograd na Moru","Galovac","Jasenice","Kali","Kolan","Kukljica","Lišane Ostrovičke","Nin","Novigrad","Obrovac","Pag","Pakoštane","Pašman","Polača","Poličnik","Posedarje","Povljana","Preko","Privlaka","Ražanac","Sali","Stankovci","Starigrad","Sukošan","Sveti Filip i Jakov","Škabrnja","Tkon","Vir","Vrsi","Zadar","Zemunik Donji","Antunovac","Beli Manastir","Belišće","Bilje","Bizovac","Čeminac","Čepin","Darda","Donja Motičina","Donji Miholjac","Draž","Drenje","Đakovo","Đurđenovac","Erdut","Ernestinovo","Feričanci","Gorjani","Jagodnjak","Kneževi Vinogradi","Koška","Levanjska Varoš","Magadenovac","Marijanci","Našice","Osijek","Petlovac","Petrijevci","Podgorač","Podravska Moslavina","Popovac","Punitovci","Satnica Đakovačka","Semeljci","Strizivojna","Šodolovci","Trnava","Valpovo","Viljevo","Viškovci","Vladislavci","Vuka","Blato","Dubrovačko primorje","Dubrovnik","Janjina","Konavle","Korčula","Kula Norinska","Lastovo","Lumbarda","Metković","Mljet","Opuzen","Orebić","Ploče","Pojezerje","Slivno","Smokvica","Ston","Trpanj","Vela Luka","Zažablje","Župa dubrovačka","Bilice","Biskupija","Civljane","Drniš","Ervenik","Kijevo","Kistanje","Knin","Murter-Kornati","Pirovac","Primošten","Promina","Rogoznica","Ružić","Skradin","Šibenik","Tisno","Tribunj","Unešić","Vodice","Andrijaševci","Babina Greda","Bogdanovci","Borovo","Bošnjaci","Cerna","Drenovci","Gradište","Gunja","Ilok","Ivankovo","Jarmina","Lovas","Markušica","Negoslavci","Nijemci","Nuštar","Otok","Privlaka","Stari Jankovci","Stari Mikanovci","Štitar","Tompojevci","Tordinci","Tovarnik","Trpinja","Vinkovci","Vođinci","Vrbanja","Vukovar","Županja","Baška Voda","Bol","Brela","Cista Provo","Dicmo","Dugi Rat","Dugopolje","Gradac","Hrvace","Hvar","Imotski","Jelsa","Kaštela","Klis","Komiža","Lećevica","Lokvičići","Lovreć","Makarska","Marina","Milna","Muć","Nerežišća","Okrug","Omiš","Otok","Podbablje","Podgora","Podstrana","Postira","Prgomet","Primorski Dolac","Proložac","Pučišća","Runovići","Seget","Selca","Sinj","Solin","Split","Stari Grad","Sućuraj","Supetar","Sutivan","Šestanovac","Šolta","Trilj","Trogir","Tučepi","Vis","Vrgorac","Vrlika","Zadvarje","Zagvozd","Zmijavci","Bale-Valle","Barban","Brtonigla-Verteneglio","Buje-Buie","Buzet","Cerovlje","Fažana-Fasana","Funtana-Fontane","Gračišće","Grožnjan-Grisignana","Kanfanar","Karojba","Kaštelir-Labinci-Castelliere-S. Domenica","Kršan","Labin","Lanišće","Ližnjan-Lisignano","Lupoglav","Marčana","Medulin","Motovun-Montona","Novigrad-Cittanova","Oprtalj-Portole","Pazin","Pićan","Poreč-Parenzo","Pula-Pola","Raša","Rovinj-Rovigno","Sveta Nedelja","Sveti Lovreč","Sveti Petar u Šumi","Svetvinčenat","Tar-Vabriga-Torre Abrega","Tinjan","Umag-Umago","Višnjan-Visignano","Vižinada-Visinada","Vodnjan-Dignano","Vrsar-Orsera","Žminj","Belica","Čakovec","Dekanovec","Domašinec","Donja Dubrava","Donji Kraljevec","Donji Vidovec","Goričan","Gornji Mihaljevec","Kotoriba","Mala Subotica","Mursko Središće","Nedelišće","Orehovica","Podturen","Prelog","Pribislavec","Selnica","Strahoninec","Sveta Marija","Sveti Juraj na Bregu","Sveti Martin na Muri","Šenkovec","Štrigova","Vratišinec","Zagreb",
];
autocomplete(document.getElementById("city"), countries);
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