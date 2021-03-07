<header>

<div>
            <?php
                session_start();
                if(!isset($_SESSION['displayName'])){
                    echo '<a class="sign-in" href= "app/Http/Controllers/AuthController.php" >Sign In</a>';
                    
                }
                else{
                    
                    echo '<a class="sign-out" href="app/Http/Controllers/SignOut.php">Sign Out</a>';
                    echo '<div class="user">'.$_SESSION['displayName'].'</div>';
                    echo '
                    <style type="text/css">
                        .search-icon {
                            right: 35vw !important;
                        }
                        .top-header > ul {
                            right: 31vw !important;
                        }
                        .show-search-field{
                            right:34vw !important;
                        }
                        .hide-search-field{
                            right:34vw !important;
                        }
                    </style>';
                    if(isset($_SESSION['admin'])){
                        if($_SESSION['admin']){
                            echo '<a class="panel" href="admin/adminDashboard.php">Admin Panel</a>';
                            echo '
                            <style type="text/css">
                                .search {
                                    right: 34.5vw !important;
                                }
                                .top-header > ul {
                                    right: 39vw !important;
                                }
                            </style>';
                        }
                    }

                }
            ?>
        </div>
            <div class="header-container">
                
                <div class="top-header">
                    <div class="title-scroller">
                        <a href="<?php echo BASE_URL ?>mainPage.php" class="title-scroller-text">
                        Fakulteti i Teknologjisë së Informacionit
                        </a>
                    </div>
                    <ul>
                        <li class="top-header-element"><a href="<?php echo VIEWS_URL ?>posts.php?slug=lajme">Lajme</a></li>
                        <li class="top-header-element"><a href="<?php echo VIEWS_URL ?>posts.php?slug=evente">Evente</a></li>
                        <li class="top-header-element"><a href="<?php echo VIEWS_URL ?>posts.php?slug=njoftime">Njoftime</a></li>
                    </ul>
                </div>
                <div class="bottom-header">
                    <div class="bottom-links">
                        <ul>
                            <li class="bottom-header-element"><a href="<?php echo VIEWS_URL ?>section.php?slug=fakulteti-main">Fakulteti</a>
                                <ul>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=fakulteti-stafi">Stafi</a></li>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=fakulteti-administrata">Administrata</a>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=fakulteti-departamentet">Departamentet</a></li>
                                </ul>
                            </li>
                            <li class="bottom-header-element"><a href="<?php echo VIEWS_URL ?>section.php?slug=kurset-main">Kurset e Studimit</a>
                                <ul>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=kurset-bachelor">Cikli i Pare Bachelor</a></li>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=kurset-master">Cikli i Dyte Master i Shkencave</a>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=kurset-doktor">Cikli i Trete Doktor i Shkencave</a></li>
                                </ul>
                            </li>
                            <li class="bottom-header-element"><a href="<?php echo VIEWS_URL ?>section.php?slug=studentet-main">Studentet</a>
                                <ul>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=studentet-bursa">Bursat e Studimit</a></li>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=studentet-tjera">Te Tjera</a>
                                </ul>
                            </li>
                            <li class="bottom-header-element"><a href="<?php echo VIEWS_URL ?>section.php?slug=kerkimi-shkencor-main">Kerkimi Shkencor</a>
                                <ul>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=kerkimi-shkencor-fushat">Fushat e Kerkimit</a></li>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=kerkimi-shkencor-projekte">Projekte</a>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=kerkimi-shkencor-lab">Laboratoret</a>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=kerkimi-shkencor-grupet">Grupet e Kerkimit</a>
                                </ul>
                            </li>
                            <li class="bottom-header-element"><a href="<?php echo VIEWS_URL ?>section.php?slug=karriere-main">Sherbimi i Karrieres</a>
                                <ul>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=karriere-praktike">Praktika</a></li>
                                    <li class="bottom-header-element-child"><a href="<?php echo VIEWS_URL ?>section.php?slug=karriere-tregu">Tregu i Punes</a>
                                    <li class="bottom-header-element-child"><a href="http://localhost/FTI/views/section.php?slug=karriere-tjera">Te Tjera</a>
                                </ul>
                            </li>
                            <li class="bottom-header-element"><a href="http://localhost/FTI/views/section.php?slug=rregullore">Rregullore</a>
                            </li>
                        </ul>


                        <div class="search">
                            
                            <div class="search-input">
                                <form role="search" method="post" action="<?php echo VIEWS_URL ?>search.php">
                                    <div id="search-field-con">
                                        <input type="text" placeholder="Search" id="search-field" class="hide-search-field" value="" name="search-string" maxlength="25">
                                    </div>
                                    <button type="submit" id="search-button">
                                            <div class="search-icon">
                                        <i class="fa fa-search"></i>
                                    </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    </header>