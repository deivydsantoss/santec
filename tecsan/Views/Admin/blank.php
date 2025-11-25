<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Dashboards</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?= BASE_URL . 'Home/config'; ?>">Config</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row row-card-no-pd">

            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Receita Diaria</b></h6>
                                <p class="text-muted">Vendas de hoje.</p>
                            </div>
                            <h4 class="text-info fw-bold">
                                <?php if (!empty($today_revenue['price'])): ?>

                                    R$ <?= number_format($today_revenue['price'], 2, ',', '.'); ?>

                                <?php else: ?>
                                    <p class="text-muted">R$ 00,00</p>
                                <?php endif; ?>

                            </h4>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-info " style="width: <?= empty($today_revenue['price']) ? '0' : (($today_revenue['price'] / 1400) * 100) ?>% !important;" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Porcentagem</p>
                            <p class="text-muted mb-0"><?= empty($today_revenue['price']) ? '0' : number_format((($today_revenue['price'] / 1400) * 100), -1)  ?>%</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Receita Total</b></h6>
                                <p class="text-muted">Renda desse mês.</p>
                            </div>
                            <h4 class="text-success fw-bold">
                                <?php if (!empty($total_revenue['total_price'])): ?>

                                    R$ <?= number_format($total_revenue['total_price'], 2, ',', '.'); ?>

                                <?php else: ?>
                                    <p class="text-muted">R$ 00,00</p>
                                <?php endif; ?>
                            </h4>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success " style="width: <?= ($total_revenue['total_price'] / $meta['renda_mensal']) * 100; ?>% !important;" aria-valuenow="<?= ($total_revenue['total_price'] / 40000) * 100 ?>" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Porcentagem</p>
                            <p class="text-muted mb-0"><?= number_format(($total_revenue['total_price'] / 40000) * 100, -1)  ?>%</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Novos pedidos</b></h6>
                                <p class="text-muted">Pedidos feitos hoje.</p>
                            </div>
                            <h4 class="text-danger fw-bold">
                                <?php if (!empty($quantity_today['quantity'])): ?>

                                    <?= $quantity_today['quantity']; ?>

                                <?php else: ?>
                                    <p class="text-muted">Nenhuma venda.</p>
                                <?php endif; ?>
                            </h4>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger " style="width:<?= empty($quantity_today['quantity']) ? '0' : (($quantity_today['quantity'] / 200) * 100) ?>% !important;" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Porcentagem</p>
                            <p class="text-muted mb-0"><?= empty($quantity_today['quantity']) ? '0' : number_format((($quantity_today['quantity'] / 200) * 100), +1)  ?>%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Novos Usuarios</b></h6>
                                <p class="text-muted">Usuarios de hoje.</p>
                            </div>
                            <h4 class="text-secondary fw-bold">
                                <?php if (!empty($client_today['quantity'])): ?>

                                    <?= $client_today['quantity']; ?>

                                <?php else: ?>
                                    <p class="text-muted">Nenhum usuario.</p>
                                <?php endif; ?>
                            </h4>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-secondary" style="width:<?= empty($client_today['quantity']) ? '0' : (($client_today['quantity'] / 200) * 100) ?>% !important;" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Porcentagem</p>
                            <p class="text-muted mb-0"><?= empty($client_today['quantity']) ? '0' : number_format((($client_today['quantity'] / 200) * 100), +1)  ?>%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Dashboard</h5>
                    </div>
                    <div class="card-body">
                        <div class="row row-card-no-pd">
                            <div class="col-12 col-sm-6 col-md-3 col-xl-6">
                                <div class="card">
                                    <canvas id="categ"></canvas>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-3 col-xl-3">
                                <div class="card">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6><b>Relatório de Vendas</b></h6>
                                                <p class="text-muted">Produto mais vendido foi:</p>
                                            </div>
                                            <h4 class="text-success fw-bold">

                                                <p class="text-muted">Qtd</p>

                                            </h4>
                                        </div>
                                        <div class="">
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="text-muted mb-0">Produto X</p>
                                                <p class="text-muted mb-0">1567</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- Grafico dos Produtos Pizza  -->
                            <script>
                                const pie = document.getElementById('myChart');

                                new Chart(pie, {
                                    type: 'doughnut',
                                    data: {
                                        labels: <?= json_encode($products_list_names);  ?>,
                                        datasets: [{
                                            label: 'Produtos Vendidos',
                                            data: <?= json_encode($products_list_qtds); ?>,
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>

                            <!-- Grafico dos Categ Pizza  -->
                            <script>
                                const categ = document.getElementById('categ');

                                new Chart(categ, {
                                    type: 'bar',
                                    data: {
                                        labels: <?= json_encode($products_list_categ);  ?>,
                                        datasets: [{
                                            label: 'Categorias Mais Vendidas',
                                            data: <?= json_encode($products_list_qtds_categ); ?>,
                                            borderWidth: 1,
                                        }]
                                    },
                                    options: {
                                        indexAxis: 'y',
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>

                        </div>

                    </div>
                </div>
            </div>
        </div>
</main>