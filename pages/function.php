<?php 

    include_once 'connection.php';

    function writehead($pagename){
        echo"
            <head>
                <!-- <titel> -->
                <title>";  

                if(empty($pagename)){
                    $pagename = 'fabianr.de';
                }

                echo"$pagename</title>
            
                <!--<METADATA Gerneral Settings>-->
                <meta charset='utf-8'>
                <meta name='language' content='deutschland'>
                <meta name='robots' content='index, follow, noimageindex'>
                <meta name='author' content='Fabian Rauer'>
            
                <!--<METADATA More Settings>-->
                <meta name='Keywords' content='Fabian Rauer Gestaltung, Services, Leistungen, Fabian Rauer, Design, Gestaltung, Print, Druck, Flyer, Booklet, Bücher, Freelancer, Freiberufler, Mediengestalter, Mediengestaltung, fabianr.de, fabianr.media'>
                <meta name='description'
                    content='Fabian Rauer Gestaltung - Fabian Rauer, ein junger Mediengestalter aus dem Spreewald, spezialsiert auf Printdesign und Produkte. Seine Liebe findet er im Medien machen.'>
            
                <!--<METADATA Tech Settings>-->
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            
                <!--< Favicon>-->
                <link rel='shortcut icon' type='image/c-icon' sizes='500x500'  href='../img/logo.png'>
                <link rel='apple-touch-icon-precomposed' sizes='500x500' href='../img/logo.png'>
            
                <!--< CSS Stylesheets>-->
                <link rel='stylesheet' type='text/css' href='css/fonts.css'>
                <link rel='stylesheet' type='text/css' href='css/global.css'>
                <link rel='stylesheet' type='text/css' href='css/media-queries.css'>
                <link rel='stylesheet' type='text/css' href='css/page.css'>

                <link rel='stylesheet' type='text/css' href='css/hamburger.css'>
                <link rel='stylesheet' type='text/css' href='css/procjects.css'>
            
                <!--< Java Scripts Einbindungen >-->
                <script language='javascript' type='text/javascript' src='js/bb.js'></script>
            
            </head>
        ";

        menu();
    }   

    function menu(){

        $home = "<a href='#' title='#'>Home</a>";
        $about = "<a href='work.php' title='Arbeiten'>Arbeiten</a>";
        $work = "<a href='#' title='#'>Home</a>";

        echo"
            <!--< OVERLAY >-->
            <div id='overlay'></div>
            <!--< NAV-HOLDER>-->
            <div id='nav-holder'>
                <ul>
                    <li>
                        <button onclick='toggleMenu()' id='bb-btn' class='hamburger hamburger--minus toogle' type='button'>
                            <span class='hamburger-box'>
                            <span class='hamburger-inner'></span>
                            </span>
                        </button>
                    </li>
                </ul>
            </div>

            <!--< Aside-Navigations-Element >-->
            <nav id='nav'>
                <ul>
                    <li>$home</li>
                    <li>$about</li>
                    <li>$work</li>
                </ul>
        
                <div id='quick-contact'>
                    Projektanfragen und Kontakt: <a href='mailto:hello@fabianr.de'>hello@fabianr.de</a>
                </div>
                <div id='inner-footer'>
                    <ul>
                        <li>Urheberrecht Fabian Rauer</li>
                    </ul> 
                </div>
            </nav>
        ";
    }

    function productsnew() {

        echo"";

        global $connection;
        //SQL-Zugriff auf Datensaetze
        $query = $connection->prepare("SELECT cms_projects.id AS id, cms_projects.path, cms_projects.cover, cms_projects.cover, cms_projects.headline, cms_projects.subheadline, T_Types.name AS 'type', T_Clients.name AS 'client' FROM cms_projects, T_Clients, T_Types WHERE cms_projects.client = T_Clients.p_client_nr AND cms_projects.type = T_Types.p_type_nr AND cms_projects.active = 1");
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $query->fetch()){

            $headline = $row['headline'];
            $subheadline		= $row['subheadline'];
            $type		= $row['type'];
            $path		= $row['path'];
            $cover		= $row['cover'];
            $client		= $row['client'];
            $id         = $row['id'];

            if(empty($id)) {
                include_once "pages/404.php";
            }

            else {
                echo "
                <div title='$headline' onclick=\"location.href='project.php?id=$id'\" class='box--new'>
                    <div class='box-inner-new'>
                        <img src='src/$path$cover' alt='$headline'>
                    </div>
                    <strong>$headline</strong> <br> <small>$subheadline</small>
                </div>";
            }
        }

    }; //Ende der WHILE-Schleife

    function viewernew (string $projectid){
        global $connection;
        //SQL-Zugriff auf Datensaetze
        $query = $connection->prepare("SELECT cms_projects.cover AS coverimg, cms_projects.headline, cms_projects.subheadline, T_Clients.name AS pclient, T_Types.name AS ptype, DATE_FORMAT(cms_projects.onlinedate, '%d.%m.%Y') AS onlinedate, cms_projects.projecttext, cms_projects.hint, cms_projects.path, cms_projects.path, cms_projects.img1, cms_projects.img2, cms_projects.img3, cms_projects.img4, cms_projects.img5, cms_projects.img6 FROM cms_projects, T_Types, T_Clients WHERE cms_projects.type = T_Types.p_type_nr AND cms_projects.client = T_Clients.p_client_nr AND cms_projects.id = $projectid;");
        
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC); 
    
        while ($row = $query->fetch()){
    
            $headline = $row['headline'];
            $subheadline = $row['subheadline'];
            $type		= $row['ptype'];
            $path		= $row['path'];
            $cover		= $row['coverimg'];
            $client		= $row['pclient'];
            $date		= $row['onlinedate'];
            $text = $row['projecttext'];
            $hint = $row['hint'];
            $img1 = $row['img1'];
            $img2 = $row['img2'];
            $img3 = $row['img3'];
            $img4 = $row['img4'];
            $img5 = $row['img5'];
            $img6 = $row['img6'];

            echo "

            <head>
                <title>$headline</title>
            </head>";


            echo "
            <div class=\"flex row rowrewerse\">
                <div class=\"col-6\">
                    <div class=\"coverimage\">
                        <img src=\"src/$path$img1\" alt='$headline'>
                    </div>";

                    if($img2 == "0") 
                    {
                    echo "";
                    } 
                    else 
                    {
                    echo "<img class='projectimage' src='src/$path$img2' alt='$headline'>";
                    }

                    if($img3 == "0") 
                    {
                    echo "";
                    } 
                    else 
                    {
                    echo "<img class='projectimage' src='src/$path$img3' alt='$headline'>";
                    }

                    if($img4 == "0") 
                    {
                    echo "";
                    } 
                    else 
                    {
                    echo "<img class='projectimage' src='src/$path$img4' alt='$headline'>";
                    }

                    if($img5 == "0") 
                    {
                    echo "";
                    } 
                    else 
                    {
                    echo "<img class='projectimage' src='src/$path$img5' alt='$headline'>";
                    }

                    if($img6 == "0") 
                    {
                    echo "";
                    } 
                    else 
                    {
                    echo "<img class='projectimage' src='src/$path$img6' alt='$headline'>";
                    }

                echo "
                </div>
                <div class=\"col-4\">
                    <ul class=\"vita copy--large \">
                        <li><strong>$headline</strong></li>
                        <li class=\"darkgrey\">$subheadline
                            <p class=\"grey contenttext nocols margin0\">
                            $text
                            </p>
                        </li>
                        <li>
                            <p class=\"darkgrey contenttext nocols margin0\">
                                <strong>Typ: </strong>$type <br>
                                <strong>Klient: </strong>$client <br>
                                <strong>Erscheinungsdatum: </strong>$date";  
                                echo"
                                <br>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            "; 

            if($hint == "") 
            {
            echo "";
            } 
            else {
            echo "<p class='hint'><strong>Hinweis</strong>$hint</p>";
            }

            echo "
                <div class='project-question'>
                    <p>Du hast Interesse dein Projekt zusammen mit mir zu verwirklichen? Schreib mir doch eine E-Mail oder Frage nach einer unverbindlichen Preisanfrage.</p>
                    <a class='link' href='mailto:hello@fabianr.de?subject=Projektanfrage: Dein Betreff hier'>Projekt anfragen</a>
                    <a href='index.php' class='link'>Mehr Projekte ansehen</a>
                </div>
            ";


           
        }
    
    
        };


    function footer(){
        echo"
            <footer>
                footer
            </footer>
        ";
    }

?>