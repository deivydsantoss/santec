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
                                <h6><b>Todays Income</b></h6>
                                <p class="text-muted">All Customs Value</p>
                            </div>
                            <h4 class="text-info fw-bold">$170</h4>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-info w-75" role="progressbar" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Change</p>
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
                                <h6><b>Total Revenue</b></h6>
                                <p class="text-muted">All Customs Value</p>
                            </div>
                            <h4 class="text-success fw-bold">$120</h4>
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
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>New Orders</b></h6>
                                <p class="text-muted">Fresh Order Amount</p>
                            </div>
                            <h4 class="text-danger fw-bold">15</h4>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger w-50" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Change</p>
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
                                <h6><b>New Users</b></h6>
                                <p class="text-muted">Joined New User</p>
                            </div>
                            <h4 class="text-secondary fw-bold">12</h4>
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
                            <div class="col-12 col-sm-6 col-md-6 col-xl-6">
                                <div class="card">
                                    <canvas id="vendidos"></canvas>
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
                                            <h4 class="text-success fw-bold">$120</h4>
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



                        <script>
                            const ctx = document.getElementById('vendidos');

                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                        label: '# of Votes',
                                        data: [12, 19, 3, 5, 2, 3],
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

                        <script>
                            const pie = document.getElementById('myChart');

                            new Chart(pie, {
                                type: 'pie',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                        label: '# of Votes',
                                        data: [12, 19, 3, 5, 2, 3],
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


                    </div>
                </div>
            </div>
        </div>

    </div>
</main>