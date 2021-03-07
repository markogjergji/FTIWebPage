<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FTI</title>

    
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700%2C400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3' type='text/css' media='all' />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel='stylesheet' href='resources/css/mainPage.css' type='text/css' />
    <script src="resources/js/stylingScript.js"></script>

    <?php
        include('config/database.php');
        include('config/config.php');
        include('navbar.php');
    ?>

</head>
<body>
    
    <main>
            <div>
                <div>
                    <div class="background-gradient"></div>
                    <div class="school-text"><img src="resources/images/textv2.png" alt="" style="width:100vw;" /></div>
                    <div class="slideshow-item"><img src="resources/images/f2v3.jpg" alt="" style="width:100vw;" /></div>
                    <div class="slideshow-item"><img src="resources/images/f1.jpg" alt="" style="width:100vw;" /></div>
                    <div class="slideshow-item"><img src="resources/images/f3.jpg" alt="" style="width:100vw;" /></div>
                    <div class="about-us"><a href="urlRouter.php?slug=rreth-fti">Rreth FTI</a></div>
                </div>
                <div id="departaments">
                    <div id="informatics">
                        <i class="fas fa-laptop-code"></i>
                        <a href="<?php echo VIEWS_URL ?>section.php?slug=dep-info">Departamenti i Inxhinierisë Informatike</a>
                    </div>
                    <div id="electronics">
                        <i class="fas fa-microchip"></i>
                        <a href="<?php echo VIEWS_URL ?>section.php?slug=dep-elek">Departamenti i Elektronikës dhe Telekomunikacionit</a>
                    </div>
                    <div id="databases">
                        <i class="fas fa-server"></i>
                        <a href="<?php echo VIEWS_URL ?>section.php?slug=dep-baza">Departamenti i Bazave të Informatikës</a>
                    </div>
                </div>
            </div>
    </main>  
    
    <section>
        <div id="more-container">
            <p>ME TE FUNDIT</p>
        </div>
        <div id="parallelogram-container">
            <img src="resources/images/techStripesTop.png" alt="" style="width:100vw;opacity:0.4;" />
            <img src="resources/images/stripes/techStripe1.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe2.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe3.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe4.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe5.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe6.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe7.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe8.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe9.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe10.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe11.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe12.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe13.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe14.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe15.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe16.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe17.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe18.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe19.png" alt="" style="width:100vw;" />
            <img src="resources/images/stripes/techStripe20.png" alt="" style="width:100vw;" />


        </div>
            <div id="articles-container">
                <?php
                    $query = "SELECT * FROM posts ORDER BY ID DESC LIMIT 5";
                    $result = mysqli_query($conn,$query);
                    $allRows = array();
                    while($row = mysqli_fetch_array($result)) {
                        $allRows[] = $row;
                    }
                    
                    printf("
                                <div id = 'main-article'>
                                    <article>
                                        <a href='urlRouter.php?slug=' class='main-title'>" . $allRows[0]['title'] . "</a>
                                        <p class='main-body'>%s</p>
                                    </article>
                                </div>
                            ", mb_strimwidth(strip_tags(htmlspecialchars_decode($allRows[0]['body'])), 0, 500, '...'));

                    echo "<div id='side-articles'>";

                    for ($x = 1; $x < 5; $x++) {
                        echo "
                                <div id = 'sub-side-article'>
                                    <article>
                                        <a href='urlRouter.php?slug=' class='side-title'>" . $allRows[$x]['title'] . "</a>
                                        <p class='side-body'>" . mb_strimwidth(strip_tags(htmlspecialchars_decode($allRows[$x]['body'])), 0, 50, "...") . "</p>
                                    </article>
                                </div>
                            ";
                    }
                    
                    echo "</div>";
                ?>

            </div>



    </section>
    <section>
        <div id="visit-container">
            <p>VIZITO</p>
        </div>
        <div id="services-container">
            <div>
                <div class="white-cover">
                    <a href="">Kendi i Studentit</a>
                </div>
            </div>
            <div >
                <div class="white-cover">
                    <a href="">Forumi</a>
                </div>
            </div>
            <div>
                <div class="white-cover">
                    <a href="">Biblioteka</a>
                </div>
            </div>
            <div>
                <div class="white-cover">
                    <a href="">Orari</a>
                </div>
            </div>
            <div>
                <div class="white-cover">
                    <a href="">Burimet Njerezore</a>
                </div>
            </div>
            <div>
                <div class="white-cover">
                    <a href="">Sekretaria</a>
                </div>
            </div>
        </div>

    </section> 
    <?php
        include("footer.php");
    ?>
</body>
</html>