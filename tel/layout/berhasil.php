<?php
session_start();
if(empty($_SESSION['pengguna']))
{
	header("location:login.php");
}else{
include "../inc/koneksi.php";
$lihat_data=mysql_query("SELECT * FROM user WHERE user='$_SESSION[pengguna]'");
$tampil_user=mysql_fetch_array($lihat_data);
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">
    <link rel="shortcut icon" href="images/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="material.min.css">
    <link rel="stylesheet" href="../style/styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
	.keren{
	margin-top: 50px;
	margin-left: 0px;
	margin-right: 0px;
	width:100%;
	align: left;
	background-color:#ffffff;
	box-shadow: 0 0 2px #000000;
	}
	.keren th{
		background-color: #ffffff;
	}
		.keren tr td{
		padding: 6px;
	}
    </style>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--white mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
		<span class="mdl-layout-title">Halaman Admin</span>
          <div class="mdl-layout-spacer"></div>
            <?php
				echo "<div><a href='keluar.php'><img src='logout.png' height='50px' align='right' title='Keluar'/></a></div>";
			?>
		  </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
			<div class="demo-avatar">
				<?php
					echo "<div style='height:90px; width:90px; border-radius:50px; background-image:url(../images/admin/$tampil_user[foto]); background-repeat:no-repeat; background-size:cover; background-position:center;'></div>"
				?>
			</div>
          <div class="demo-avatar-dropdown">
            <span>
			<?php
			echo"$tampil_user[nama]";
			?>
			</span>
			<div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href="?admin=menu"><font size="4">Manager Menu</font></a>
		  <a class="mdl-navigation__link" href="?admin=user"><font size="4">Manager Admin</font></a>
		  <a class="mdl-navigation__link" href="?admin=artikel"><font size="4">Manager Artikel</font></a>
		  <a class="mdl-navigation__link" href="?admin=upload"><font size="4">Unggah Berkas Admin</font></a>
		  <a class="mdl-navigation__link" href="?admin=download"><font size="4">Unduh Berkas Admin</font></a>
		  <a class="mdl-navigation__link" href="?admin=uploaduser"><font size="4">Unggah Berkas Pengguna</font></a>
		  <a class="mdl-navigation__link" href="?admin=downloaduser"><font size="4">Kelola Berkas Pengguna</font></a>
                  <a class="mdl-navigation__link" href="http://bagiin.ga/admin" target="_blank"><font size="4">Megono File Host</font></a>
		  <a class="mdl-navigation__link" href="?admin=tamu"><font size="4">Buku Tamu</font></a>
		  <a class="mdl-navigation__link" href="?admin=komen"><font size="4">Daftar Komentar</font></a>
          <div class="mdl-layout-spacer"></div>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
		<div class="mdl-grid demo-content">
		<?php
			if(ISSET($_GET["admin"]))
			{
			if($_GET["admin"]=="menu"){include "adm_menu.php";}
			if($_GET["admin"]=="user"){include "adm_user.php";}
			if($_GET["admin"]=="artikel"){include "adm_artikel.php";}
			if($_GET["admin"]=="upload"){include "upload.php";}
			if($_GET["admin"]=="download"){include "unduh.php";}
			if($_GET["admin"]=="uploaduser"){include "uploadfordownloader.php";}
			if($_GET["admin"]=="downloaduser"){include "downloadfordownloader.php";}
			if($_GET["admin"]=="tamu"){include "bukutamu.php";}
			if($_GET["admin"]=="komen"){include "komentar.php";}
			}
		?>
		</div>
      </main>
    </div>
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <mask id="piemask" maskContentUnits="objectBoundingBox">
            <circle cx=0.5 cy=0.5 r=0.49 fill="white" />
            <circle cx=0.5 cy=0.5 r=0.40 fill="black" />
          </mask>
          <g id="piechart">
            <circle cx=0.5 cy=0.5 r=0.5 />
            <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
          </g>
        </defs>
      </svg>
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <g id="chart">
            <g id="Gridlines">
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="27.3" x2="468.3" y2="27.3"/>
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="66.7" x2="468.3" y2="66.7"/>
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="105.3" x2="468.3" y2="105.3"/>
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="144.7" x2="468.3" y2="144.7"/>
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="184.3" x2="468.3" y2="184.3"/>
            </g>
            <g id="Numbers">
              <text transform="matrix(1 0 0 1 485 29.3333)" fill="#888888" font-family="'Roboto'" font-size="9">500</text>
              <text transform="matrix(1 0 0 1 485 69)" fill="#888888" font-family="'Roboto'" font-size="9">400</text>
              <text transform="matrix(1 0 0 1 485 109.3333)" fill="#888888" font-family="'Roboto'" font-size="9">300</text>
              <text transform="matrix(1 0 0 1 485 149)" fill="#888888" font-family="'Roboto'" font-size="9">200</text>
              <text transform="matrix(1 0 0 1 485 188.3333)" fill="#888888" font-family="'Roboto'" font-size="9">100</text>
              <text transform="matrix(1 0 0 1 0 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">1</text>
              <text transform="matrix(1 0 0 1 78 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">2</text>
              <text transform="matrix(1 0 0 1 154.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">3</text>
              <text transform="matrix(1 0 0 1 232.1667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">4</text>
              <text transform="matrix(1 0 0 1 309 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">5</text>
              <text transform="matrix(1 0 0 1 386.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">6</text>
              <text transform="matrix(1 0 0 1 464.3333 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">7</text>
            </g>
            <g id="Layer_5">
              <polygon opacity="0.36" stroke-miterlimit="10" points="0,223.3 48,138.5 154.7,169 211,88.5
              294.5,80.5 380,165.2 437,75.5 469.5,223.3 	"/>
            </g>
            <g id="Layer_4">
              <polygon stroke-miterlimit="10" points="469.3,222.7 1,222.7 48.7,166.7 155.7,188.3 212,132.7
              296.7,128 380.7,184.3 436.7,125 	"/>
            </g>
          </g>
        </defs>
      </svg>
      <a href="../index.php" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Lihat Website</a>
    <script src="../../material.min.js"></script>
  </body>
 </html>