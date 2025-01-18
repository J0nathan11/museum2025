<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registe Client</title>
</head>


<br>
<div class="container">
    <h3 class="text-center">Register Client</h3>
    <form action="<?php echo site_url('Clients/guardar'); ?>" method="post" class="form" id="frm_client">
        <div class="mb-3">
            <label for="id_card_cli" class="form-label">ID Card/ID</label>
            <input type="text" name="id_card_cli" id="id_card_cli" class="form-control" placeholder="Ingrese el número de cédula/ID" required>
        </div>
        <div class="mb-3">
            <label for="first_name_cli" class="form-label">First Name</label>
            <input type="text" name="first_name_cli" id="first_name_cli" class="form-control" placeholder="Ingrese el nombre" required>
        </div>
        <div class="mb-3">
            <label for="last_name_cli" class="form-label">Last Name</label>
            <input type="text" name="last_name_cli" id="last_name_cli" class="form-control" placeholder="Ingrese el apellido" required>
        </div>
        <div class="mb-3">
            <label for="phone_cli" class="form-label">Phone</label>
            <input type="text" name="phone_cli" id="phone_cli" class="form-control" placeholder="Ingrese el teléfono">
        </div>
        <div class="mb-3">
            <label for="email_cli" class="form-label">Email</label>
            <input type="email" name="email_cli" id="email_cli" class="form-control" placeholder="Ingrese el correo electrónico">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="reset" class="btn btn-secondary">Cancelar</button>
            <button class="btn btn-secondary"><a class="boton-regresar" href="<?php echo site_url(); ?>/">Go Back</a></button>
        </div>
    </form>
</div>
<br>

<!-- jQuery and jQuery Validation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        // Form validation
        $("#frm_client").validate({
            rules: {
                id_card_cli: {
                    required: true,
                    digits: true,  
                    minlength: 10,
                    maxlength: 10, 
                },
                first_name_cli: {
                    required: true,
                },
                last_name_cli: {
                    required: true,
                },
                phone_cli: {
                    required: true,
                    digits: true,  
                    minlength: 10,
                    maxlength: 10, 
                },
                email_cli: {
                    required: true,
                    email: true,
                }
            },
            messages: {
                id_card_cli: {
                    required: "Please enter the ID card",
                    digits: "Please enter only numbers",
                    minlength: "The ID card must have 10 digits",
                    maxlength: "The ID card must have 10 digits",
                },
                first_name_cli: {
                    required: "Please enter the first name",
                },
                last_name_cli: {
                    required: "Please enter the last name",
                },
                phone_cli: {
                    required: "Please enter the phone number",
                    digits: "Please enter only numbers",
                    minlength: "The phone number must have 10 digits",
                    maxlength: "The phone number must have 10 digits",
                },
                email_cli: {
                    required: "Please enter the email address",
                    email: "Please enter a valid email address",
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
    .boton-regresar{
        text-decoration: none;
        color: white;
    }
    .error {
        color: red;
        font-size: 0.875rem;
    }

    .form-control-sm {
        font-size: 0.875rem; 
        padding: 0.375rem 0.75rem; 
        width: 100%; 
    }

    .form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .form .mb-3 {
        width: 100%; 
        max-width: 500px;
    }

    .btn {
        padding: 10px 20px;
        margin-top: 10px;
    }
</style>