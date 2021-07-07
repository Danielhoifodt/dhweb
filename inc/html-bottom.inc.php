<footer>
	<div class="footer-wrapper">
	<p class="footer"><span id="joke" onclick="lastVits();">►Last vits...</span><br>
	&copy; All Rights Reserved Daniel Høifødt</p>
	</div>
</footer>
	
	<script>
	async function randomJoke()
{
	let res = await fetch("https://v2.jokeapi.dev/joke/Programming?type=single");

	let data = await res.json();

	let joke_span = document.getElementById("joke");

	//console.log(data);

	joke_span.innerHTML = data.joke;
}
function lastVits()
{
	let footer = document.querySelector("footer");
	footer.style.height = "200px";
	let span = document.getElementById("joke");
	span.style.textDecoration = "none";
	window.scrollTo(0,document.body.scrollHeight);
	randomJoke();
}


</script>
</body>
</html>
