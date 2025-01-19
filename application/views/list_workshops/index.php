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
