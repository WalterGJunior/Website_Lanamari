<div class="contact-section text-center animate-block">
			<div class="container">
				<div class="contact-section-info">
					<h2>Nossa localização</h2>
				</div>
			</div>
		</div>
</div>
<div style="width: 100%">
	<center>
	<iframe width="90%" height="400" src="http://www.maps.ie/create-google-map/map.php?width=90%&amp;height=400&amp;hl=en&amp;coord=-23.3104321,-51.153997000000004&amp;q=Rua%20Brasil%2C%20162+(Lanamari)&amp;ie=UTF8&amp;t=&amp;z=16&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
	</center>
</div><br>
<div id="contact" class="animate-block content-block contact-block">
  <div class="contact-block-inner container">
    <div class="clear">
      <div class="contact-block-content col-6-tablet">
        <h2 class="h2 uppercase">Conheça nossa loja</h2>
        
        <ul class="contact-list">
          <li><span class="icon contact-icon contact-icon-location">Rua Brasil, 162 - Londrina/PR</span></li>
          <li><span class="icon contact-icon contact-icon-phone">(43) 3347-3560 </span></li>
          <li><span class="icon contact-icon contact-icon-phone">(43) 9985-0127 (whatsapp)</span></li>
          <li><span class="icon contact-icon contact-icon-email"><a href="mailto:atendimento@lanamari.com.br?subject=Site;body=">atendimento@lanamari.com.br</a></span></li>
        </ul>
      </div>
      <div class="contact-block-form col-6-tablet">
        <h2 class="h2">QUER SER AVISADO SOBRE NOVAS COLEÇÕES?</h2>        
        <form id="signup" class="contact-form" action="php/send.php" method="post">
          <fieldset>
            <legend class="sr">Contato</legend>
            <div class="field-group">
              <label class="sr" for="fname">Nome</label>
              <input name="name" class="field" id="name" type="text" placeholder="Nome*"/>
            </div>
            <div class="field-group">
              <label class="sr" for="email">Email</label>
              <input name="email" class="field" id="email" type="email" placeholder="Email*">
            </div>
            <div class="field-group">
              Quero ser um parceiro!<br>
            <select name=""check" class="field" id="check" >
            <option value="SIM">SIM</option>
            <option value="NÃO">NÃO</option>            
            </select>
            </div>
            <div class="field-group">
              <textarea name="message" class="field" id="message" placeholder="Mensagem*"></textarea>
            </div>
            <div id="response"></div>            
            <div class="text-right">
              <input type="submit" class="button button-primary contact-submit" value="Cadastrar">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="footer">
  <div class="footer-inner container">
    <div class="clear">
      <div class="footer-column col-8-tablet">
        <p>
          &copy; 2016 &mdash; TODOS OS DIREITOS RESERVADOS
        </p>
      </div>
      <div class="footer-column col-4-tablet">
        <ul class="footer-social-list icon-list-inline">
          <li class="navigation-item-social"><a class="social-icon social-facebook" href="https://www.facebook.com/lanamariconfeccoes/" target="_blank"><span class="sr">Facebook</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
		$(document).ready(function() {
      $(".fancybox").fancybox();
			// jQuery Validation
			$("#signup").validate({
				// if valid, post data via AJAX
				submitHandler: function(form) {
					$.post("php/send.php", { name: $("#name").val(), email: $("#email").val(), message: $("#message").val(), check: $("#check").val() }, function(data) {
						$('#response').html(data);
					});
				},
				// all fields are required
				rules: {
					fname: {
						required: true
					},
					lname: {
						required: true
					},
					email: {
						required: true,
						email: true
					}
				}
			});
		});
	</script>
</body>
</html>