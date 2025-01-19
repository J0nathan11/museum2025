<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Workshop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 600px; /* Ancho máximo del formulario */
            margin: 0 auto;   /* Centrar horizontalmente */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Añade una sombra */
            padding: 20px;   /* Espaciado interno */
            border-radius: 8px; /* Bordes redondeados */
            background-color: #fff; /* Fondo blanco */
        }
        .small-alert {
            font-size: 0.875rem; /* Tamaño reducido del texto */
            padding: 10px;       /* Reducir el espaciado interno */
        }
        .btn-inline {
            display: inline-block;
            width: 48%; /* Ajusta el ancho del botón */
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Add New Workshop</h2>
    <hr>

    <!-- Mostrar mensajes de error o éxito -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success text-center small-alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger text-center small-alert">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <!-- Formulario para añadir un taller -->
    <div class="form-container">
        <form action="<?php echo site_url('AddWorkshopController/save'); ?>" method="POST" id="frm_workshop">
            <div class="form-group">
                <label for="topic_work">Topic:</label>
                <input type="text" class="form-control" id="topic_work" name="topic_work" required>
            </div>
            <div class="form-group">
                <label for="date_work">Date:</label>
                <input type="date" class="form-control" id="date_work" name="date_work" required>
            </div>
            <div class="form-group">
                <label for="time_work">Time:</label>
                <input type="time" class="form-control" id="time_work" name="time_work" required>
            </div>
            <div class="form-group">
                <label for="status_work">Status:</label>
                <select class="form-control" id="status_work" name="status_work" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fk_id_org">Organizer:</label>
                <select class="form-control" id="fk_id_org" name="fk_id_org" required>
                    <option value="">Select Organizer</option>
                    <?php foreach ($organizers as $organizer): ?>
                        <option value="<?php echo $organizer['id_org']; ?>">
                            <?php echo $organizer['first_name_org'] . ' ' . $organizer['last_name_org']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="description_detail">Description:</label>
                <textarea class="form-control" id="description_detail" name="description_detail" rows="3" required></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-outline-success btn-inline">Add Workshop</button>
                <a href="<?php echo site_url('list_workshops'); ?>" class="btn btn-outline-secondary btn-inline">Go Back</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<!-- jQuery and jQuery Validation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        // Form validation
        $("#frm_workshop").validate({
            rules: {
                topic_work: {
                    required: true,
                },
                date_work: {
                    required: true,
                },
                time_work: {
                    required: true,
                },
                status_work: {
                    required: true,
                },
                fk_id_org: {
                    required: true,
                },
                description_detail: {
                    required: true,
                }
            },
            messages: {
                topic_work: {
                    required: "Please enter the Topic",
                },
                date_work: {
                    required: "Select the date",
                },
                time_work: {
                    required: "Select the time",
                },
                status_work: {
                    required: "Select state",
                },
                fk_id_org: {
                    required: "Select organizer"
                },
                description_detail: {
                    required: "Please enter the description",
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