<!-- Petit script pour mettre en arc en ciel le TM que quand l'utilisateur à la souris dessus -->

<script type="text/javascript">
// Sélectionner le lien avec la classe .rainbow-hover
const link = document.querySelector('.rainbow-hover');

// Ajouter un gestionnaire d'événement pour le survol
link.addEventListener('mouseover', () => {
  // Ajouter la classe .rainbow-text au lien
  link.classList.add('rainbow-text');
});

// Ajouter un gestionnaire d'événement pour la fin du survol
link.addEventListener('mouseout', () => {
  // Supprimer la classe .rainbow-text du lien
  link.classList.remove('rainbow-text');
});
</script>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
  <p>Alimenté par <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a> - Par <span class="font-Cantique">amour</span> pour le cinema, par les <a href="credits_secrets.php" class="no-underline rainbow-text font-Cantique">fans</a> et pour les <span class="font-Cantique">fans</span></p>
  <a href="images/gee.png"><img src="images/Censor_Gc.gif" title="Tout public (Gee)"></a>
</footer>

</body>
</html>