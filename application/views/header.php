<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        header {
            background: linear-gradient(135deg,rgb(203, 116, 17),rgb(252, 213, 37));
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
        }
        .logo i {
            margin-right: 10px;
            color:rgb(255, 87, 87);
        }
        nav a {
            color: white;
            font-weight: 500;
            transition: color 0.3s;
        }
        nav a:hover {
            color:rgb(226, 6, 6);
        }
        @media (max-width: 768px) {
            header {
                flex-wrap: wrap;
                text-align: center;
            }
            nav {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <header class="d-flex justify-content-between align-items-center p-3 flex-wrap">
        <!-- Logo del Museo -->
        <div class="logo">
            <i class="fas fa-landmark"></i> Museum 2025
        </div>
        <!-- Navegación -->
        <nav class="d-flex gap-3">
            <a href="<?php echo site_url(); ?>/" class="text-decoration-none">Home</a>
            <a href="<?php echo site_url(); ?>/Clients/index" class="text-decoration-none">Register</a>
            <a href="<?php echo site_url(); ?>/Workshops/index" class="text-decoration-none">Workshops</a>
            <a href="<?php echo site_url('logincontroller'); ?>" class="text-decoration-none">Login</a>

        </nav>
    </header>
</body>
</html>
