<?php

// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////  LOCALHOST ///////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // define("HOST", "localhost"); 			// The host you want to connect to. 
        // define("USER", "root"); 			// The database username. 
        // define("PASSWORD", ""); 	// The database password. 
        // define("DATABASE", "lux");             // The database name.
        // $hostname = 'localhost';
        // $database = 'lux';
        // $username = 'root';
        // $password = '';
        // $database = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8",$username,$password);



// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////// WEB HOSTING  /////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

        define("HOST", "db5007270364.hosting-data.io"); 			// The host you want to connect to. 
        define("USER", "dbu482015"); 			// The database username. 
        define("PASSWORD", "NFsUi2da@p#J6yL"); 	// The database password. 
        define("DATABASE", "dbs5992035");             // The database name.
        $hostname = 'db5007270364.hosting-data.io';
        $database = 'dbs5992035';
        $username = 'dbu482015';
        $password = 'NFsUi2da@p#J6yL';
        $database = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8",$username,$password);




// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////// VARIABLES  ///////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
// change paramettre de URL HOSTING
        // $url = "http://localhost/lux/";
        $url = "https://matelaslux.elbossinmobiliaria.es/";

        // EMAIL SENDER SERVER
        $mailsender = "contact@matelaslux.com";


// DOSSIER IMAGES
        $hostingUrlimage="imgs";
// DEFAULT FICHIER IMAGES
        $ImageDefault="645dsfssd65f98sdf5sd6f5ssfsddsff.png";
// SYMBOLE DINARS
        $SymbolDinar = "DZD";
        $SymbolSub = "m²";

        $Adresse = "35000 تعاونية العقارية( ميموزة) حي الفواعيص مجمووعة ملكية 590 من القسم 4 برمرداس";
        $telsystem = '+213550693200';

// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////// cripting  ////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
        $crypting = 'AES-256-CBC';
        $key = "siphax";
        $iv = '1234567812345678';

        
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////// ACCES ADMINS  ////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        $Admin1='KH1';
        $Whatsapp1='+213796383708';
        $emailAdmin1 = 'zs7@gcloud.ua.es';

        $Admin2='KH2';
        $Whatsapp2='+213672249438';
        $emailAdmin2 = 'Khadidja7240@gmail.com';

        $Admin3='SF';
        $Whatsapp3='+34658629772';
        $emailAdmin3 = 'zs7@gcloud.ua.es';

        $Admin4='YOUVA';
        $Whatsapp4='+213557828839';
        $emailAdmin4 = 'Youvaflash19@gmail.com';

        $Admin5='AM';
        $Whatsapp5='+213550693200';
        $emailAdmin5 = 'omar01031962@gmail.com';
        
        $Admin6='YASMINE';
        $Whatsapp6='+213552094951';
        $emailAdmin6 = 'Yasminetl02@gmail.com';
        
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////// Estado shipping  ////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
          
        $Estado1 = 'Non Confermer';
        $Estado2 = 'Conferme';
        $Estado3 = 'Expédié';
        $Estado4 = 'Livré';
        $Estado5 = 'Annuler';









/**
 * Who can register and what the default role will be
 * Values for who can register under a standard setup can be:
 *      any  == anybody can register (default)
 *      admin == members must be registered by an administrator
 *      root  == only the root user can register members
 * 
 * Values for default role can be any valid role, but it's hard to see why
 * the default 'member' value should be changed under the standard setup.
 * However, additional roles can be added and so there's nothing stopping
 * anyone from defining a different default.
 */
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

/**
 * Is this a secure connection?  The default is FALSE, but the use of an
 * HTTPS connection for logging in is recommended.
 * 
 * If you are using an HTTPS connection, change this to TRUE
 */
define("SECURE", true);    // For development purposes only!!!!


    /////////////////////////////////// DATABASE CONNECT////////////////////////////////////


        



