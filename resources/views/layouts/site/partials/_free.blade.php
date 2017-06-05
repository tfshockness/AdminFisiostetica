<?php
if(!isset($submit)){
?>
<form method="post" action="index.php#free">
	<fieldset>
		<legend class="dancing-font wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">Agende Sua Avaliação Gratuita</legend>
		<input type="text" name="name" placeholder="Nome" required />
		<input type="email" name="email" placeholder="E-mail" required />
		<input type="text" name="telefone" placeholder="Telefone" required />
		<input type="submit" name="submit" value="Enviar">
	</fieldset>
</form>
<?php }else{
	if($ok === true){
?>
<div class="lato-font container center" style="border:2px solid #ff6699; height: 150px; padding-top: 20px;">
	<p style="font-size:2em; font-weight: bold;"><?=$name?>, sua solicitação foi enviada com sucesso!</p>
	<p style="font-size:1.5em; padding-top: 20px;">Nossa equipe entrará em contato no telefone - <?=$telefone?> ou no email - <?=$email?>, para agendar o dia da avaliação. </p>
	<p style="font-size:1.5em; padding-top: 5px;">Nos vemos em breve! </p>
</div>
	<?php }else{
	?>
	<div class="lato-font container center" style="border:2px solid #ff6699; height: 150px;">
	<p style="font-size:2em; font-weight: bold;">Desculpe <?=$name?>,</p>
	<p style="font-size:1.5em; padding-top: 20px;">Por algum motivo não recebemos seus contatos. Por favor entre em contato no (69) 3222-0503 ou tente novamente mais tarde!</p>
	<?php echo $mail->ErrorInfo; ?>
	</div>
	<?php } 
	}?>