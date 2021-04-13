<main>
	<section id="connect">

		<form action="?page=connect" method="POST">
			<div>
				<input placeholder="Pseudo" type="text" class="for-control" id="InputPseudo" name="pseudo" required>
			</div>
			<div>
				<input placeholder="Mot de passe" type="password" class="for-control" id="InputPass" name="pass" required>
			</div>


			<button type="submit" class="btnbtn-primary">Se connecter</button>

			<?php

			if (isset($result["message"]) == true)

				echo "<p>" . $result["message"] . "</p>";
			?>
			<p>Mot de passe oublier ? <a style="color:red!important" href="?page=recoveryPass">Réinitialiser mot de passe. </a></p>

		</form>
	</section>
</main>