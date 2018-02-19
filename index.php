<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Teufeurs | Contact</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<style>
    body{background-color:transparent;}
    label{color: white;}
</style>
<body>
	<div style="margin-top:25px;" class="container">
        <?php if(array_key_exists('errors', $_SESSION)): ?>
        <div class="alert alert-danger">
            <?= implode('<br>', $_SESSION['errors']); ?>
        </div>
        <?php endif; ?>
        <?php if(array_key_exists('success', $_SESSION)): ?>
            <div class="alert alert-success">
                Votre email a bien été envoyé.
            </div>
        <?php endif; ?>
		<form style="margin-top:25px; margin-bottom:35px;" action="post_contact.php" method="POST">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="inputname">Votre nom</label>
						<input required type="text" name="name" class="form-control" id="inputname" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="inputemail">Votre Email</label>
						<input required type="email" name="email" class="form-control" id="inputemail" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>">
					</div>
				</div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputservice">Service</label>
                        <select name="service" id="inputservice" class="form-control">
                            <option value="0">A propos du site</option>
                            <option value="1">Faire un live</option>
                            <option value="2">Demande d'information</option>
                        </select>
                    </div>
                </div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="inputmessage">Votre message</label>
						<textarea required name="message" class="form-control" id="inputmessage"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea>
					</div>
					<button class="btn btn-primary" style="width:100%" type="submit">Envoyer</button>
				</div>
			</div>
        </form>
	</div>
<?php
    unset($_SESSION['inputs']);
    unset($_SESSION['errors']);
    unset($_SESSION['success']);
?>
</body>
</html>