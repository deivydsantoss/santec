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
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
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
                            <div class="progress-bar bg-info w-75" role="progressbar" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Porcentagem</p>
                            <p class="text-muted mb-0">75%</p>
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
                            <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Porcentagem</p>
                            <p class="text-muted mb-0">25%</p>
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
                            <div class="progress-bar bg-danger w-50" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Porcentagem</p>
                            <p class="text-muted mb-0">50%</p>
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
                            <div class="progress-bar bg-secondary w-25" role="progressbar" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Change</p>
                            <p class="text-muted mb-0">25%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Empty card</h5>
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
                                                <h6><b>Total Revenue</b></h6>
                                                <p class="text-muted">All Customs Value</p>
                                            </div>
                                            <h4 class="text-success fw-bold">
                                                <?php if (!empty($today_revenue['price'])): ?>

                                                    R$ <?= number_format($today_revenue['price'], 2, ',', '.'); ?>

                                                <?php else: ?>
                                                    <p class="text-muted">Nenhuma venda.</p>
                                                <?php endif; ?>
                                            </h4>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <p class="text-muted mb-0">Change</p>
                                            <p class="text-muted mb-0">25%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- <div class="row row-card-no-pd">
                            <div class="col-12 col-sm-6 col-md-3 col-xl-6">
                                <div class="card">
                                    <canvas id="categ"></canvas>
                                </div>
                            </div>


                            <div class="col-12 col-sm-6 col-md-6 col-xl-6">
                                <div class="card">
                                    <canvas id="vendidos"></canvas>
                                </div>
                            </div>
                        </div> -->


                        <!-- Grafico dos Produtos Linha  -->
                        <script>
                            const line = document.getElementById('mes_mais_vendido');

                            new Chart(line, {
                                type: 'line',
                                data: {
                                    labels: <?= json_encode($products_list_names);  ?>,
                                    datasets: [{
                                        label: 'Produtos Mais Vendidos',
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

                        <!-- Grafico dos Produtos   -->
                        <script>
                            const ctx = document.getElementById('vendidos');

                            new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: <?= json_encode($products_list_names);  ?>,
                                    datasets: [{
                                            label: 'Produtos Mais Vendidos',
                                            data: <?= json_encode($products_list_qtds); ?>,
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'Produtos Mais Vendidos',
                                            data: <?= json_encode($products_list_qtds); ?>,
                                            borderWidth: 2
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        title: {
                                            display: true,
                                            text: 'Chart.js Line Chart - Cubic interpolation mode'
                                        },
                                    },
                                    interaction: {
                                        intersect: false,
                                    },
                                    scales: {
                                        x: {
                                            display: true,
                                            title: {
                                                display: true
                                            }
                                        },
                                        y: {
                                            display: true,
                                            title: {
                                                display: true,
                                                text: 'Value'
                                            },
                                            suggestedMin: -10,
                                            suggestedMax: 200
                                        }
                                    }
                                },
                            });
                        </script>

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