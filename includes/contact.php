<section id="contact">

  <div class="box" id="cadre">
    <div class="full_width">
      <?php if (isset($_GET['success']) && $_GET['success'] == 'false') { ?><div class="c2a c2a_red">
        <span>Erreur : vérifiez que vous avez rempli tous les champs correctement.</span>
      </div><?php } ?>
      <?php if (isset($_GET['success']) && $_GET['success'] == 'true') { ?><div class="c2a c2a_primary">
        <span>Votre message a bien été envoyé !</span>
      </div><?php } ?>
    </div>
    <h1><i class="fas fa-at"></i> Contactez-moi</h1>
    <form id="contact_form" action="<?php echo $GLOBALS['url']; ?>mail.php" method="POST">
      <div id="first_row">
        <input name="name" type='text' placeholder='Votre nom' />
        <input name="mail" type='text' placeholder='Votre adresse mail' />
      </div>
      <textarea name="message" id="message" placeholder="Votre message"></textarea>
      <div class="full_width" id="captcha_container">
        <div class="g-recaptcha" data-callback="captcha" data-sitekey="6LeYnncUAAAAAFcEWFrtUZ3Cipf5jC1XhJah2Tlp"></div>
      </div>
      <div id="send_container"><button class="button" id="send" onclick='document.getElementById("contact_form").submit()' disabled>Envoyer <i class="far fa-envelope"></i></button></div>
    </form>
  </div>

</section>
<script>
/*grecaptcha.ready(function() {
grecaptcha.execute('6LfunXcUAAAAANzZ7krqnNM9CbLsRgJMdkIjej_E', {action: 'action_name'})
.then(function(token) {
  // Verify the token on the server.
});
});*/
function captcha(res) {
  document.getElementById('send').disabled = false;
}
</script>
