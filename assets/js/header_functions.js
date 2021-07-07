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