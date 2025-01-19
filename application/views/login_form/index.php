<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5 d-flex justify-content-center">
    <div class="card" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h2 class="text-center">Login</h2>
            <hr>

            <!-- Mostrar mensaje de error si hay alguno -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger text-center">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <!-- Formulario de login -->
            <form action="<?php echo site_url('logincontroller/validate'); ?>" method="POST" id="frm_login">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <!-- Botones -->
                <div class="justify-content-between text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="<?php echo site_url(); ?>/" class="btn btn-secondary">Go Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<br><br>

<!-- jQuery and jQuery Validation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        // Form validation
        $("#frm_login").validate({
            rules: {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                }
            },
            messages: {
                username: {
                    required: "Please enter the username",
                },
                password: {
                    required: "Please enter the password",
                },
            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                error.addClass('error');
                error.insertAfter(element);
            }
        });
    });
</script>
<style>
    .error {
        color: red;
        font-size: 0.875rem;
    }
</style>