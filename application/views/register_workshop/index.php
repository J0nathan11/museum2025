<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Workshop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Register for Workshop: <?php echo $topic_work; ?></h2>
    <hr>

    <!-- Mostrar mensaje de error si hay alguno -->
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <!-- Formulario de inscripción -->
    <form action="<?php echo site_url('register_workshop/register/' . $id_work); ?>" method="POST">
        <div class="form-group">
            <label for="id_card_cli">Enter Your ID Card:</label>
            <input type="text" class="form-control" id="id_card_cli" name="id_card_cli" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <br><a href="<?php echo site_url('workshops'); ?>">Back to Workshops</a>
</div>
</body>
</html>
