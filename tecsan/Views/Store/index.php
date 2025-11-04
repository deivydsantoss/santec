<div class="nav-scroller shadow-sm">
    <nav class="nav nav-underline align-content-center pb-3 pt-3" aria-label="Secondary navigation">

        <?php foreach ($category_list as $category) : ?>
            <a class="nav-link btn text-muted fw-bold ms-3 p-1 ps-2 pe-2 rounded-pill shadow-sm" style="background-color: #e2e1e1ff;" href="#"><?= $category['name_category']; ?></a>
        <?php endforeach; ?>

    </nav>
</div>

<main>
    <?php foreach ($product_list as $product) : ?>
        
    <?php endforeach; ?>
</main>