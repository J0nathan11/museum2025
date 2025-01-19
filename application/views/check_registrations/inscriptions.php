<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Registrations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Your Workshop Registrations</h2>
    <hr>

    <!-- Mostrar el nombre del cliente -->
    <?php if (!empty($inscriptions)): ?>
        <h3 class="text-center mb-4"><?php echo $inscriptions[0]['first_name_cli'] . ' ' . $inscriptions[0]['last_name_cli']; ?>'s Registrations</h3>

        <!-- Crear columnas para las inscripciones -->
        <div class="row">
            <?php foreach ($inscriptions as $inscription): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $inscription['topic_work']; ?></h5>
                            <p class="card-text">Date of Registration: <?php echo $inscription['date_reg']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="alert alert-warning">You have not registered for any workshops.</p>
    <?php endif; ?>

    <!-- Botón de regresar -->
    <div class="text-center mt-4">
        <a href="<?php echo site_url('check_registrations/index'); ?>" class="btn btn-outline-secondary">Back to Registration</a>
    </div>
</div>
</body>
</html>
<br><br>
