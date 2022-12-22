        <!-- HEADER -->
        <header>
        <div id="topHead">
            <div class="logo-header">
                <a href="index.php">
                    <img
                    src="./assets/img/logo-hotello.svg"
                    alt="Logo de Hotello"
                    id="Hotello Logo"
                    />
                </a>

            </div>
            <nav>
            <ul>
                <li><a class="l" href="index.html">ACCUEIL</a></li>
                <li><a class="l" href="#">SERVICES</a></li>
                <li><a class="l" href="room.php">CHAMBRES</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>
            </nav>
            <?php 

                if($connected == true){
                    echo "
                    
                    <div class=\"menu-client\">
                    
                    <a href=\"profil.php\" class=\"connexion\"><i class=\"bi bi-person-circle\"></i> $firstname</a>

                        <div class=\"submenu-client\">
                            <ul>
                                <li>
                                    <a href=\"profil.php\" class=\"\"> Profil</a>
                                </li>
                                <li>
                                    <a href=\"?action=deconnexion\" class=\"\"> Déconnexion</a>
                                </li>
                            </ul>
                        </div>
                        
                    
                    </div>";
                }else{
                    echo"<a href=\"connexion.php\" class=\"connexion\">CONNEXION</a>";
                }
            
            ?>
            <!-- <a href="connexion.php" class="connexion">CONNEXION</a> -->
        </div>
        <div id="bottomHead">
            <h1>HOTELLO</h1>
            <h5>Le plus bel endroit au monde</h5>
        </div>
        </header>