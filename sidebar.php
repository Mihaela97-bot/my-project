
<?php
//ako ne odgovara korisničko ime i tip korisnika, vraćaj na index stranicu
if (!isset($_SESSION['username']) || (!isset($_SESSION['role']) ? false: ($_SESSION['role'] !== 'zaposlenik'))) {
    header('location:index.php');
} 
?>
<aside>
			<div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="img/user.png" class="circle" alt="" style="width: 50px;height: 50px;">
                        </div>
                        <div class="sidebar-profile-info">
							<!--korištenje sesije za korisnika koji je prijavljen-->
                        <p ><?php echo $_SESSION['username'];?></p>
                    </div>
			 </div>
		<nav id="sidebar">
   		<div class="sidebar-header">
   		</div>
   		<ul class="list-unstyled components">
   			
   			<li class="active">
   				<a href="moj_profil.php" >Profil</a>
   				
   			</li>
   			<li>
   				<a href="#RadnoVrijeme" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Radno vrijeme</a>
   				<ul class="collapse list-unstyled" id="RadnoVrijeme">
   				
   					<li>
   						<a href="evidencija_sati.php">Evidencija sati</a>
   					</li>
					
   				</ul> 
   			</li>
			<li>
   				<a href="#Odsutnosti" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Odsutnosti</a>
   				<ul class="collapse list-unstyled" id="Odsutnosti">
   				
   					<li>
   						<a href="dodaj_odsustvo.php">Dodaj odsustvo</a>
   					</li>
					<li>
   						<a href="pregled_odsustva.php">Pregled odsustva</a>
   					</li>
   				</ul> 
   			</li>
   			<li>
   				<a href="kalendar.php">Kalendar</a>
   			</li>
   			<li>
   				<a href="odjava.php">Odjava</a>
   			</li>
   		</ul>
   		
   		
   	</nav>
                      <div class="footer">
                    <p class="copyright">© Web aplikacija za evidenciju radnog vremena</p>
	</aside>