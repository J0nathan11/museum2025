<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshops List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 style="text-align: center;">Workshops</h2>
        <hr>
        <div class="row">
            <?php if (!empty($workshops)): ?>
                <?php foreach ($workshops as $workshop): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card d-flex flex-column shadow">
                            <div class="card-body flex-grow-1">
                                <h5 class="card-title workshop-title"><?php echo $workshop['topic_work']; ?></h5> <!-- Workshop topic -->
                                <p class="card-text"><strong>Date:</strong> <?php echo $workshop['date_work']; ?></p> <!-- Formatted date -->
                                <p class="card-text"><strong>Time:</strong> <?php echo date('H:i', strtotime($workshop['time_work'])); ?></p>

                                <p class="card-text"><strong>Status:</strong> <?php echo $workshop['status_work']; ?></p> <!-- Workshop status -->
                                <p class="card-text"><strong>Organizer:</strong> <?php echo $workshop['first_name_org']; ?></p> <!-- Organizer name -->
                            </div>
                            <div class="text-center mt-2">
                                <a href="<?php echo site_url('workshops/details/' . $workshop['id_work']); ?>" class="btn btn-outline-success">Details</a>
                                <br><br>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-warning mt-4" role="alert">
                    No workshops registered.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <style>
        .workshop-title {
            color: #db3510;
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
    </style>
</body>
</html>
