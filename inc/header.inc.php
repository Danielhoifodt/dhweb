<?php

if(isset($_SESSION["access_token"]))
{
	$login_text = "Logg ut";
	$login_path = "logout.php";
}
else{
	$login_text = "Logg inn";
	$login_path = "logg-inn";
}

?>

<script>

function hamburger()
{
	let ul = document.getElementById("mobile_menu");
	let i = document.getElementById("hamburger");
	i.className = "fas fa-bars fa-2x hamburger";
	ul.className = "ul_mobile";
	if(ul.style.display == "block")
	{
		ul.style.display = "none";
		
	}
	else
	{
		ul.style.display = "block";
		ul.classList.add("animate");
		i.classList.add("hamburger_snurr");
	}
}
function oversett()
{
	let base = window.location.href;
	window.open("https://translate.google.com/translate?hl=en&sl=no&tl=en&u=" + base, "_self");
}

</script>
<nav>
	<div class="nav_wrapper">
		<a href="/" style="cursor:pointer;"><img class="logo" alt="logo" src="../assets/img/logo.png"></a>
		<ul class="ul_desktop">
			<li class="li_desktop"><a class="link home" href="hjem">Hjem</a></li>
			<li class="li_desktop"><a class="link products" href="produkter">Produkter</a></li>
            <li class="li_desktop"><a class="link blog" href="blog">Blogg</a></li>
			<li class="li_desktop"><a class="link login" href="<?php echo $login_path;?>"><?php echo $login_text;?></a></li>
			<li class="li_desktop"><a class="link contact" href="kontakt">Kontakt</a></li>
			<li class="li_desktop" onclick="oversett();" title="Google Translate">Translate</li>
		</ul>
		</div>
	
</nav>
<i onclick="hamburger();" id="hamburger" class="fas fa-bars fa-2x hamburger"></i>
<div class="mobile_menu" id="mobile_menu">
	<ul class="ul_mobile">
		<li><a href="hjem" class="li_box_m"><div class="li_content_m">Hjem</div></a></li>
		<li><a href="produkter" class="li_box_m"><div class="li_content_m">Produkter</div></a></li>
        <li><a href="blog" class="li_box_m"><div class="li_content_m">Blogg</div></a></li>
		<li><a href="<?php echo $login_path;?>" class="li_box_m"><div class="li_content_m"><?php echo $login_text;?></div></a></li>
		<li><a href="kontakt" class="li_box_m"><div class="li_content_m">Kontakt</div></a></li>
	</ul>
</div>
</div>
<script>
	
	let path = window.location.pathname;
	console.log(path)
	switch(path)
	{
		case "/hjem":
			let home = document.querySelector(".home");
			home.style.textDecoration = "underline";
		break;

		case "/produkter":
			let products = document.querySelector(".products");
			products.style.textDecoration = "underline";
		break;

        case "/blog":
            let blog = document.querySelector(".blog");
            blog.style.textDecoration = "underline";
            break;


		case "/profil":
			let login2 = document.querySelector(".login");
			login2.style.textDecoration = "underline";
		break;

		case "/logg-inn":
			let login = document.querySelector(".login");
			login.style.textDecoration = "underline";
		break;

		case "/kontakt":
			let contact = document.querySelector(".contact");
			contact.style.textDecoration = "underline";
		break;

		case "/medlemsportalen":
			let logged = document.querySelector(".login");
			logged.style.textDecoration = "underline";
		break;
			
	}
</script>