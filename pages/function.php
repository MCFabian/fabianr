<?php 

    include_once 'connection.php';

    function writehead($pagename, $active){
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
            
                <!--< Java Scripts Einbindungen >-->
                <script language='javascript' type='text/javascript' src='js/bb.js'></script>
            
            </head>
        ";

        menu($active);
    }   

    function menu($active){

        $home = "<a href='index.php' title='#'>Home</a>";
        $imprint = "<a href='impressum.php' title='Impressum'>Impressum</a>";
        $privacy = "<a href='datenschutz.php' title='Datenschutz'>Datenschutz</a>";

        if(!isset($active)){echo"Nothing active";}
        if($active == 1){$home = "<a class='activemenu' href='index.php' title='#'>Home</a>";}
        if($active == 2){ $imprint = "<a class='activemenu' href='impressum.php' title='Impressum'>Impressum</a>";}
        if($active == 3){ $privacy = "<a class='activemenu' href='datenschutz.php' title='Datenschutz'>Datenschutz</a>";}


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
                    <li>$imprint</li>
                    <li>$privacy</li>
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

   


    function footer(){
        echo"
            <footer>

            </footer>
        ";
    }

?>