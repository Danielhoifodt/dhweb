<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="En blog relatert til koding av Daniel Høifødt.">
        <meta name="keywords" content="webutvikling, koding, backend, frontend, fullstack">
        <meta name="author" content="Daniel Høifødt">
		    <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124581948-2"></script>
		<script>
  			window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());

  		gtag('config', 'UA-124581948-2');
		</script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="assets/bootstrap-5.0.1-dist/css/bootstrap.css" rel="stylesheet">
        <script src="assets/bootstrap-5.0.1-dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="icon" type="image/jpg" href="assets/img/logo.png"/>
		<title>Webutvikling blog</title>
	</head>
	<body>
<div class="intro">
    <img class="logo" alt="logo" src="assets/img/logo.png">
	<h1 class="intro-heading">Daniel Høifødt's</h1>
    <h2 class="intro-subheading"> Blogg om webutvikling</h2>
    <span id="intro-tap">Trykk for å åpne/Press to open</span>
</div>
<div id="index">
<nav>
	<div class="nav_wrapper">
		<ul class="ul_desktop">
			<li class="li_desktop"><a style="text-decoration: underline;" class="link home">Hjem</a></li>
			<li class="li_desktop"><a class="link products">Produkter</a></li>
            <li class="li_desktop"><a class="link blog">Blogg</a></li>
			<li class="li_desktop"><a class="link login">Logg inn</a></li>
			<li class="li_desktop"><a class="link contact">Kontakt</a></li>
			<li class="li_desktop" onclick="oversett();" title="Google Translate">Translate</li>
		</ul>
		</div>
	
</nav>
<div class="mobile_menu" id="mobile_menu">
	<ul class="ul_mobile">
		<li><a class="li_box_m"><div class="li_content_m">Hjem</div></a></li>
		<li><a class="li_box_m"><div class="li_content_m">Produkter</div></a></li>
        <li><a class="li_box_m"><div class="li_content_m">Blogg</div></a></li>
		<li><a class="li_box_m"><div class="li_content_m">Logg inn</div></a></li>
		<li><a class="li_box_m"><div class="li_content_m">Kontakt</div></a></li>
	</ul>
</div>
<div class="site_wrapper">
			<div class="site_section">
            <div class="text_wrapper">
<h1 class="page-heading">Webutvikling og koding</h1>
<p>
    Her finner du mine anbefalte produkter for koding og en spennende blog om alt relatert til web-utvilking og koding! Produktene er linker til Amazon.com.
    Du kan også logge inn med navn og lage en web-utvikler profil.<br> <br>
    Håper du finner noe fint!<br><br>
</p>
<img class="profile_pic" src="assets/img/koding.jpg" alt="koding">
<br><br><br>
</div>
<br>
</div>
</div>
<footer>
	<div class="footer-wrapper">
	<p class="footer"><span id="joke">►Last vits...</span><br>
	&copy; All Rights Reserved Daniel Høifødt</p>
	</div>
</footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous"></script>
<script>

//Intro animation

let anime = gsap.timeline({paused:true, defaults: {duration: 1.5}})
let intro = document.querySelector(".intro");
let heading = document.querySelector(".intro-heading");
let subHeading = document.querySelector(".intro-subheading");
let index = document.getElementById("index");
let tap = document.getElementById("intro-tap");

anime.to(intro, {height: "0vh"})



intro.addEventListener("click", function(){

    heading.style.display = "none";
    subHeading.style.display = "none";
    tap.style.display = "none";
    index.style.display = "block";

	anime.play();
    
    setTimeout(function(){window.location.pathname = "/hjem"; }, 1500);
})
</script>
</body>
</html>
