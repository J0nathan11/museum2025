<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center"><?php echo $workshop['topic_work']; ?></h2>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Date:</strong> <?php echo $workshop['date_work']; ?></p>
            <p><strong>Time:</strong> <?php echo date("H:i", strtotime($workshop['time_work'])); ?></p>
            <p><strong>Status:</strong> <?php echo $workshop['status_work']; ?></p>
            <p><strong>Description:</strong> 
                <?php 
                    echo $workshop['description_detail'] ?: "No details available for this workshop."; 
                ?>
            </p>
        </div>
    </div>
    <div class="text-center mt-4">
    <a href="<?php echo site_url('register_workshop/index/' . $workshop['id_work']); ?>" class="btn btn-outline-success">Registration</a>

    <a href="<?php echo site_url(); ?>/Workshops/index" class="btn btn-outline-secondary">Go Back</a>
</div>

</div>
</body>
</html>
<br>
