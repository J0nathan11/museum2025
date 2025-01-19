<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Workshop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
        }
        .small-alert {
            font-size: 0.875rem;
            padding: 10px;
        }
        .btn-inline {
            display: inline-block;
            width: 48%;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Edit Workshop</h2>
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

    <!-- Formulario para editar un taller -->
    <div class="form-container">
        <form action="<?php echo site_url('EditWorkshopController/update/' . $workshop['id_work']); ?>" method="POST">
            <div class="form-group">
                <label for="topic_work">Topic:</label>
                <input type="text" class="form-control" id="topic_work" name="topic_work" value="<?php echo $workshop['topic_work']; ?>" required>
            </div>
            <div class="form-group">
                <label for="date_work">Date:</label>
                <input type="date" class="form-control" id="date_work" name="date_work" value="<?php echo $workshop['date_work']; ?>" required>
            </div>
            <div class="form-group">
                <label for="time_work">Time:</label>
                <input type="time" class="form-control" id="time_work" name="time_work" value="<?php echo $workshop['time_work']; ?>" required>
            </div>
            <div class="form-group">
                <label for="status_work">Status:</label>
                <select class="form-control" id="status_work" name="status_work" required>
                    <option value="Active" <?php echo ($workshop['status_work'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                    <option value="Inactive" <?php echo ($workshop['status_work'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fk_id_org">Organizer:</label>
                <select class="form-control" id="fk_id_org" name="fk_id_org" required>
                    <option value="">Select Organizer</option>
                    <?php foreach ($organizers as $organizer): ?>
                        <option value="<?php echo $organizer['id_org']; ?>" <?php echo ($workshop['fk_id_org'] == $organizer['id_org']) ? 'selected' : ''; ?>>
                            <?php echo $organizer['first_name_org'] . ' ' . $organizer['last_name_org']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="description_detail">Description:</label>
                <textarea class="form-control" id="description_detail" name="description_detail" rows="3" required><?php echo $workshop['description_detail']; ?></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-outline-success btn-inline">Save Changes</button>
                <a href="<?php echo site_url('list_workshops'); ?>" class="btn btn-outline-secondary btn-inline">Go Back</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<br>

