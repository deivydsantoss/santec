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
                <div class="card ms-2 mb-1 rounded-3 col-2 shadow-sm border-primary">
                    <div class="card-header py-3 text-white d-flex align-items-center justify-content-center border-primary">
                        <img height="70%" src="<?= BASE_URL . $products['path']; ?>">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"><?= $products['name_product']; ?></h1>
                        <h1 class="card-title pricing-card-title">R$ <?= number_format($products['price'], 2, ',', '.'); ?></h1>
                        <p>
                            <td><?= $products['description']; ?></td>
                        </p>
                        <button type="button" class="w-100 btn btn-lg btn-primary">Comprar</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</main>