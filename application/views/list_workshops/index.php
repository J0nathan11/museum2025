<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Workshops</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">List of Workshops</h2>
    <hr>
    <div class="text-center mb-4">
        <a href="<?php echo site_url('AddWorkshopController'); ?>" class="btn btn-outline-success">New Workshop</a>
        <a href="<?php echo site_url('logincontroller'); ?>" class="btn btn-outline-secondary">Exit</a>
    </div>
    
    <!-- Mostrar la lista de talleres -->
    <?php if (!empty($workshops)): ?>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Topic</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Organizer</th>
                    <th>Actions</th> <!-- Columna para botones -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($workshops as $index => $workshop): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $workshop['topic_work']; ?></td>
                        <td><?php echo $workshop['date_work']; ?></td>
                        <td><?php echo $workshop['time_work']; ?></td>
                        <td><?php echo $workshop['status_work']; ?></td>
                        <td><?php echo $workshop['fk_id_org']; ?></td>
                        <td>
                            <!-- Botón de editar -->
                            <a href="<?php echo site_url('edit_workshop/edit/' . $workshop['id_work']); ?>" 
                               class="btn btn-outline-warning">
                                Edit
                            </a>
                            <!-- Botón de eliminar (si lo necesitas) -->
                            <a href="<?php echo site_url('workshop/delete/' . $workshop['id_work']); ?>" 
                               class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this workshop?');">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No workshops available.</p>
    <?php endif; ?>
</div>
</body>
</html>
