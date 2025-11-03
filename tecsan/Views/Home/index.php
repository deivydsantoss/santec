<div class="nav-scroller shadow-sm">
    <nav class="nav nav-underline align-content-center pb-3" aria-label="Secondary navigation">

        <?php foreach ($category_list as $category) : ?>
            <a class="nav-link btn text-muted fw-bold ms-3 p-1 ps-2 pe-2 rounded-pill shadow-sm" style="background-color: #e2e1e1ff;" href="#"><?= $category['name_category']; ?></a>
        <?php endforeach; ?>


    </nav>
</div>
<main>

    <!-- Heroe Start -->
    <div class="bg-dark text-secondary px-4 py-5 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Tecnologia que mantém o seu mundo em movimento.</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">Somos especialistas em manutenção, montagem e upgrade de computadores, notebooks e periféricos. Oferecemos também os melhores produtos de informática, com garantia e suporte técnico de quem entende.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Solicitar Orçamento</button>
                    <button type="button" class="btn btn-outline-light btn-lg px-4">Ver Produtos</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Heroe End -->

    <!-- Grid Start -->
    <div class="container px-4 py-5" id="icon-grid">
        <h2 class="pb-2 border-bottom">O que entregamos?</h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
            <div class="col d-flex align-items-start">
                <i class="text-black bi text-muted flex-shrink-0 me-3 mt-1" data-feather="flag"></i>
                <div>
                    <h4 class="fw-bold mb-0">Assistência Técnica Completa</h4>
                    <p>Conserto de computadores, notebooks e periféricos com diagnóstico rápido e garantia de qualidade.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <i class="text-black bi text-muted flex-shrink-0 me-3 mt-1" data-feather="monitor"></i>
                <div>
                    <h4 class="fw-bold mb-0">Montagem de Computadores Personalizados</h4>
                    <p>Escolha as peças e nós montamos o PC ideal para o seu estilo — gamer, profissional ou doméstico.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <i class="text-black bi text-muted flex-shrink-0 me-3 mt-1" data-feather="truck"></i>
                <div>
                    <h4 class="fw-bold mb-0">Entrega Rápida e Retirada na Loja</h4>
                    <p>Compre online e receba em casa com agilidade, ou retire pessoalmente em nossa unidade.
                        Praticidade e eficiência para quem valoriza o tempo.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <i class="text-black bi text-muted flex-shrink-0 me-3 mt-1" data-feather="rss"></i>
                <div>
                    <h4 class="fw-bold mb-0">Suporte Remoto e Atendimento Online</h4>
                    <p>Diagnóstico e solução de problemas sem precisar sair de casa.
                        Conecte-se com nossos técnicos e receba ajuda imediata por acesso remoto ou chat especializado.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <i class="text-black bi text-muted flex-shrink-0 me-3 mt-1" data-feather="award"></i>
                <div>
                    <h4 class="fw-bold mb-0">Consultoria Técnica Especializada</h4>
                    <p>Indicação de peças e soluções sob medida para o seu projeto.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <i class="text-black bi text-muted flex-shrink-0 me-3 mt-1" data-feather="lock"></i>
                <div>
                    <h4 class="fw-bold mb-0">Segurança e Garantia</h4>
                    <p>Serviço autorizado e produtos com garantia estendida. Confiança é a nossa marca.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <i class="text-black bi text-muted flex-shrink-0 me-3 mt-1" data-feather="shopping-cart"></i>
                <div>
                    <h4 class="fw-bold mb-0">Loja Virtual de Informática</h4>
                    <p>Produtos originais, preços justos e envio rápido. Tudo o que precisa em um só lugar.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <i class="text-black bi text-muted flex-shrink-0 me-3 mt-1" data-feather="zap"></i>
                <div>
                    <h4 class="fw-bold mb-0">Upgrades e Otimização</h4>
                    <p>Melhore o desempenho do seu computador com upgrades de SSD, memória RAM e processador.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Grid End -->

    <!-- Products Start -->
    
    <!-- Products End -->

    <!-- Section Start -->
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="" class="d-block mx-lg-auto img-fluid" alt="" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Responsive left-aligned hero with image</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid
                    system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Start -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Our Office</h5>
                    <p class="mb-2">
                        <i class="text-muted bi flex-shrink-0 me-3" data-feather="map"></i>
                        123 Centro, Juazeiro do Norte, CE
                    </p>
                    <p class="mb-2">
                        <i class="bi text-muted flex-shrink-0 me-3" data-feather="phone"></i>
                        +55 (88) 1234-5678
                    </p>
                    <p class="mb-2">
                        <i class="text-black bi text-muted flex-shrink-0 me-3 mt-1" data-feather="folder"></i>
                        deftec@gmail.com
                    </p>

                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-secondary rounded-circle me-2" href=""><i class="flex-shrink-0" data-feather="twitter"></i></a>
                        <a class="btn btn-square btn-secondary rounded-circle me-2" href=""><i class="flex-shrink-0" data-feather="facebook"></i></a>
                        <a class="btn btn-square btn-secondary rounded-circle me-2" href=""><i class="flex-shrink-0" data-feather="youtube"></i></a>
                        <a class="btn btn-square btn-secondary rounded-circle me-2" href=""><i class="flex-shrink-0" data-feather="linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms &amp; Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Business Hours</h5>
                    <p class="mb-1">Monday - Friday</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Saturday</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                    <p class="mb-1">Sunday</p>
                    <h6 class="text-light">Closed</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

</main>