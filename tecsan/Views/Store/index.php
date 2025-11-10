<div class="nav-scroller shadow-sm">
    <nav class="nav nav-underline align-content-center pb-3 pt-3" aria-label="Secondary navigation">
        <a class="nav-link btn text-muted fw-bold ms-3 p-1 ps-2 pe-2 rounded-pill shadow-sm" name="id_category" href="<?= BASE_URL; ?>Store/index" style="background-color: #e2e1e1ff;">Todos os Produtos</a>
        <?php foreach ($category_list as $category) : ?>
            <a class="nav-link btn text-muted fw-bold ms-3 p-1 ps-2 pe-2 rounded-pill shadow-sm" name="id_category" href="<?= BASE_URL . 'Store/index/' . $category['id_category']; ?>" style="background-color: #e2e1e1ff;"><?= $category['name_category']; ?></a>
        <?php endforeach; ?>

    </nav>
</div>

<main>
    <div class="card-body">
        <div class="row">
            <?php foreach ($products_list as $products) : ?>
                <div class="col-2">
                    <form method="POST" action="<?= BASE_URL; ?>Store/addCarrinho">
                        <div class="card ms-2 mb-1 rounded-3 shadow-sm border-primary">
                            <div class="card-header py-3 text-white d-flex align-items-center justify-content-center border-primary">
                                <img height="100" src="<?= BASE_URL . $products['path']; ?>">
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title"><?= $products['name_product']; ?></h1>
                                <h1 class="card-title pricing-card-title">R$ <?= number_format($products['price'], 2, ',', '.'); ?></h1>
                                <p>
                                    <td><?= $products['description']; ?></td>
                                </p>
                                <button type="submit" name="addCart" class="w-100 btn btn-lg btn-primary">Adicionar ao Carrinho</button>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="id_product" value="<?= $products['id_product']; ?>">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php if (isset($_GET['cart']) && $_GET['cart'] === 'open'): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasCart'));
                offcanvas.show();
            });
        </script>
    <?php endif; ?>


    <div class="offcanvas offcanvas-start shadow-lg" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Carrinho</h5>


            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-group mb-3">
                <?php if (!empty($_SESSION['carrinho'])): ?>

                    <?php foreach ($cart_product as $item): ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><?= $item['name']; ?></h6>
                                <small class="text-muted"><?= $item['description']; ?></small>
                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <span class="text-black ">R$ <?= number_format($item['price'], 2, ',', '.'); ?></span>
                                <strong class="text-muted " disabled><?= $item['quantity']; ?></strong>
                            </div>

                            <div class="">
                                <form method="POST" action="<?= BASE_URL; ?>Store/removeCarrinho">
                                    <button type="submit" name="removeCart" class="w-100 btn btn-sm btn-danger ">Remover</button>
                                    <input type="hidden" class="form-control" name="id_product" value="<?= $item['id']; ?>">
                                </form>
                            </div>
                        </li>
                    <?php endforeach; ?>

                <?php else: ?>
                    <p class="text-muted">O carrinho está vazio.</p>
                <?php endif; ?>
            </ul>
        </div>

        <div class="p-3 d-flex justify-content-between">
            <form method="POST" action="<?= BASE_URL; ?>Store/limpar">
                <button type="submit" class="btn btn-danger btn-sm">Limpar carrinho</button>
            </form>

            <li class="list-group-item d-flex justify-content-between">
                <span class="fw-bold">Total</span>
                <strong>R$ <?= number_format($cart_total, 2, ',', '.'); ?></strong>
            </li>


            <a href="<?= BASE_URL; ?>Purchase/index" type="submit" class="btn btn-success btn-sm float-end">Compra</a>

        </div>
    </div>

</main>