<?php include 'header.php';?>

<style>
	.bgimg {
 		  background-position: center;
  		background-size: cover;
  		background-image: url("images/recherche_background.jpg");
  		min-height: 75%;

}
</style>

<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small animation_label">
    <span class="w3-tag">toutsurlecinema.<a href="credits_secrets.php" class="no-underline rainbow-hover">™</a></span>
  </div>
  <div class="w3-display-middle w3-center font-Cantique-titre">
    <span>Recherche Sur la Base</span>
  </div>
</header>

<!-- Add a background color and large text to the whole page -->

<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->

<div class="w3-container" id="apropos">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">Rechercher dans la base de donnée </span></h5>
    <form id="recherche-form" action="recherche_real.php" method="post">
      <div class="form__group">
        <label for="choix" class="form__label">Rechercher par :</label>
        <br>
        <select name="choix" class="form__input">
          <option value="realisateur">Réalisateur</option>
          <option value="film">Film</option>
        </select>
      </div>
      <br>
      <div class="form__group">
        <input type="text" name="recherche" class="form__input" id="recherche" placeholder="Entrez votre recherche" required>
        <label for="recherche" class="form__label">Entrez votre recherche</label>
      </div>
      <p class="center-button-flex fungal_recherche"><button class="fungal_recherche" type="submit" name="submit">RECHERCHER</button></p>
</form> 
  </div>
</div>

<!-- End page content -->

</div>



<?php include 'footer.php';?>

