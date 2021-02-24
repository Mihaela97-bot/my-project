<?php

if (!isset($_SESSION['username']) || (!isset($_SESSION['role']) ? false: ($_SESSION['role'] !== 'admin'))) {
    header('location:index.php');
} 
?>
<aside>
			<div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="img/user.png" class="circle" alt="" style="width: 50px;height: 50px;">
                        </div>
                        <div class="sidebar-profile-info">
                                <p>Admin</p>
                    </div>
			 </div>
		<nav id="sidebar">
   		<div class="sidebar-header">
   		</div>
   		<ul class="list-unstyled components">
   			
   			<li class="active">
   				<a href="#Zaposlenici" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Zaposlenici</a>
   				<ul class="collapse list-unstyled" id="Zaposlenici">
   					
   					<li>
   						<a href="a_dodaj_zaposlenika.php">Dodaj zaposlenika</a>
   					</li>
   				</ul> 
   			</li>
   			<li>
   				<a href="#RadnoVrijeme" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Radno vrijeme</a>
   				<ul class="collapse list-unstyled" id="RadnoVrijeme">
   					<li>
   						<a href="a_dnevna_evidencija_sati.php">Dnevna evidencija</a>
   					</li>
   					<li>
   						<a href="a_mjesecna_evidencija_sati.php">Mjesečna evidencija</a>
   					</li>
   				</ul> 
   			</li>
			<li>
   				<a href="a_odsutnosti.php">Odsutnosti</a>
   			</li>
   			<li>
   				<a href="a_kalendar.php">Kalendar</a>
   			</li>
   			<li>
   				<a href="odjava.php">Odjava</a>
   			</li>
   		</ul>
   		
   		
   	</nav>
                      <div class="footer">
                    <p class="copyright">© Web aplikacija za evidenciju radnog vremena</p>
	</aside>