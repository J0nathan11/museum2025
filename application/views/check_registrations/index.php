<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Registrations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Check Your Registrations</h2>
    <hr>

    <!-- Mostrar mensaje de error si hay alguno -->
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger text-center" style="max-width: 500px; margin: 0 auto;">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
        <br><br>
    <!-- Formulario para validar cédula -->
    <form action="<?php echo site_url('check_registrations/validate_id_card'); ?>" method="POST" class="text-center">
        <div class="form-group">
            <label for="id_card_cli">Enter Your ID Card:</label>
            <input type="text" class="form-control d-inline-block" id="id_card_cli" name="id_card_cli" required style="max-width: 300px;">
        </div>

        <!-- Botón centrado -->
        <button type="submit" class="btn btn-outline-primary d-inline-block" style="width: 200px;">Check Registrations</button>
        <a href="<?php echo site_url(); ?>/Workshops/index" class="btn btn-outline-secondary">Go Back</a>
    </form>
</div>
</body>
</html>
<br><br><br><br>
