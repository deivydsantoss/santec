<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Deftec Store</title>

    <link href="<?= BASE_URL; ?>Assets/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

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
            <header class="p-3 mb-3 bg-dark border-bottom">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                                <use xlink:href="#bootstrap"></use>
                            </svg>
                        </a>

                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="#" class="nav-link text-white px-2 link-dark">Home</a></li>
                            <li><a href="#" class="nav-link text-white px-2 link-dark">Products</a></li>
                            <li><a href="#" class="nav-link text-white px-2 link-dark">Contact</a></li>
                            <li><a href="#" class="nav-link text-white px-2 link-dark">About</a></li>
                        </ul>

                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                        </form>

                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
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
            <div class="nav-scroller bg-body shadow-sm">
                <nav class="nav nav-underline align-content-center pb-3" aria-label="Secondary navigation">
                    <a class="nav-link btn btn-outline-secondary text-light bg-secondary ms-3 p-1 ps-2 pe-2 rounded-pill shadow-sm" aria-current="page" href="#">Componentes PC</a>
                    <a class="nav-link btn btn-outline-secondary text-light bg-secondary ms-3 p-1 ps-2 pe-2 rounded-pill shadow-sm" href="#">Escritorio</a>
                    <a class="nav-link btn btn-outline-secondary text-light bg-secondary ms-3 p-1 ps-2 pe-2 rounded-pill shadow-sm" href="#">Papelaria</a>
                    <a class="nav-link btn btn-outline-secondary text-light bg-secondary ms-3 p-1 ps-2 pe-2 rounded-pill shadow-sm" href="#">Smartphones</a>
                    <a class="nav-link btn btn-outline-secondary text-light bg-secondary ms-3 p-1 ps-2 pe-2 rounded-pill shadow-sm" href="#">Notebook</a>
                </nav>
            </div>
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="index.html" class="text-muted"><strong>AdminKit Demo</strong></a> &copy; Murilo Morais
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
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