<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Recherche </title>
    <link rel="stylesheet" href="recherche.css">
</head>
<body>

<header>
    <h2 class="recherche">Recherche...</h2>
    <nav class="navigation">
        <a href="../../index.html">Accueil</a>
        <a href="../map/leaflet.php">Map</a>
        <a href="../repertoire/repertoire.php">Répertoire</a>
        <a href="rechercheB.php">Recherche</a>
        <a href="../contact/contact.html">Contact et plus..</a>
        <button class="btnLogin-popup">Connexion</button>
    </nav>
</header>

<input type="text" onkeydown="searchKeyword()" placeholder="Entrez un mot-clé.." id="myKeyword">
<div id="response"></div>


<script>
const searchKeyword = async () => {
    document.querySelector("#response").innerHTML = ""
    let keyword = document.querySelector("#myKeyword").value;
    const req = await fetch(`recherche.php?keyword=${keyword}`)
    const json = await req.json()
    if(json.length > 0){
        json.forEach((post) => {
            // Création d'un lien vers Wikipedia avec le nom du poisson comme texte de l'hyperlien
            document.querySelector("#response").innerHTML += `<a href="https://fr.wikipedia.org/wiki/${post.NomPoisson}" target="_blank">${post.NomPoisson}</a><br>`;
        }) 
    }
}
</script>
    
</body>
</html>
