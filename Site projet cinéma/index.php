<?php include 'header.php';?>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small animation_label">
    <span class="w3-tag">toutsurlecinema.<a href="credits_secrets.php" class="no-underline rainbow-hover">™</a></span>
  </div>
  <div class="w3-display-middle w3-center font-Cantique-titre">
    <span>Tout<br>Sur le<br>Cinema.</span>
  </div>
</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
<div class="w3-container" id="apropos">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">A propos de la base de donnée</span></h5>
    <p>La base de données est conçue de manière que vous puissiez rechercher des informations concernant un film/un réalisateur ou encore un genre en particulier.</p>
    <p>Le site étant encore en développement, de nouvelles fonctionnalités quant à la recherche d'information sur la base de données seront ajoutées dans le futur.</p>
  </div>
</div>
<div class="w3-container" id="recherche">
	<div class="w3-content" style="max-width:700px">
  		<h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Rechercher dans la base de donnée</span></h5>
      <p>Si vous souhaitez rechercher des informations à propos d'un film ou d'un réalisateur, veuillez cliquer sur le bouton ci-dessous :<p>
      <div class="frame" style="text-align: center;">
        <button class="w3-center w3-padding-64 boutton-recherche" style="width: 200px; height: 50px;" onclick="window.location.href='recherche.php'">RECHERCHE</button>
      </div>
	</div>
</div>
</div>

<?php include 'footer.php';?>

