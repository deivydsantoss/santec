<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Deftec Store</title>

    <link href="<?= BASE_URL; ?>Assets/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/css/site.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <!-- FAVICON -->
    <link rel="shortcut icon" href="<?= BASE_URL; ?>Assets/img/favicon.png" />
    <link rel="icon" href="<?= BASE_URL; ?>Assets/img/favicon.png" type="image/x-icon" />
    <?php if (isset($viewData['CSS'])) {
        echo $viewData['CSS'];
    }; ?>
    <style type="text/css">
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }
    </style>

</head>

<body>

    <div class="wrapper">

        <div class="main">
            <header class="p-3 bg-dark border-bottom">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                            <p class="h1 text-light me-3">DefTec</p>
                        </a>

                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="<?= BASE_URL; ?>Site" class="nav-link text-white px-2 link-dark">Inicio</a></li>
                            <li><a href="<?= BASE_URL; ?>Store" class="nav-link text-white px-2 link-dark">Produtos</a></li>
                            <li><a href="<?= BASE_URL; ?>Service" class="nav-link text-white px-2 link-dark">Serviços</a></li>
                        </ul>

                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                        </form>

                        <button class="btn btn-primary me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasScrolling">
                            <i class="text-white" data-feather="shopping-cart"></i>
                        </button>

                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="" alt="user" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">Seus Pedidos</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <?php $this->loadViewInTemplate($viewName, $viewData); ?>


        </div>
    </div>
    <script src="<?= BASE_URL; ?>Assets/js/jquery-3.5.1.js"></script>
    <script src="<?= BASE_URL; ?>Assets/js/jquery.mask.js"></script>
    <script src="<?= BASE_URL; ?>Assets/js/app.js"></script>
    <script type="text/javascript">
        const BASE_URL = '<?= BASE_URL; ?>'
    </script>
    <?php if (isset($viewData['JS'])) {
        echo $viewData['JS'];
    }; ?>
</body>

</html>