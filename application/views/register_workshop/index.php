<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Workshop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<br><br>
<body>
<div class="d-flex justify-content-center align-items-center">
    <div class="container p-4" style="max-width: 500px; background-color: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h2 class="text-center mb-4">Register for Workshop: <?php echo $topic_work; ?></h2>

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

            <!-- Botones centrados y del mismo tamaño -->
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-outline-primary w-45">Register</button>
                <a href="<?php echo site_url('workshops/details/' . $id_work); ?>" class="btn btn-outline-secondary w-45">Back to Details</a>
            </div>
        </form>
    </div>
</div>
</body>
<style>
    body {
        background-color: #f8f9fa; /* Fondo claro */
    }

    .w-45 {
        width: 45%; /* Ancho igual para ambos botones */
    }

    .form-control {
        font-size: 16px;
    }

    .btn {
        font-size: 16px;
        padding: 10px;
    }
</style>
</html>
