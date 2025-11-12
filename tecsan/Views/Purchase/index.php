<div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h2>
                <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">Formulário de conclusão de compra</font>
                </font>
            </h2>
            <p class="lead">
                <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">Abaixo, segue um exemplo de um formulário construído inteiramente usando os controles de formulário do Bootstrap. Cada conjunto de formulários obrigatórios possui uma condição de validação que pode ser acionada ao tentar enviar o formulário sem preenchê-lo.</font>
                </font>
            </p>
        </div>

        <div class="row g-3">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">
                        <font dir="auto" style="vertical-align: inherit;">
                            <font dir="auto" style="vertical-align: inherit;">carrinho de compras</font>
                        </font>
                    </span>
                    <span class="badge bg-secondary rounded-pill">
                        <font dir="auto" style="vertical-align: inherit;">
                            <font dir="auto" style="vertical-align: inherit;"><?= $cart_quantity; ?></font>
                        </font>
                    </span>
                </h4>
                <ul class="list-group mb-3">
                    <?php if (!empty($_SESSION['carrinho'])): ?>

                        <?php foreach ($cart_product as $item): ?>
                            <li class="list-group-item d-flex flex-column justify-content-between lh-sm">
                                <div class="d-flex justify-content-between p-1">
                                    <div>
                                        <h6 class="my-0"><?= $item['name']; ?></h6>
                                        <small class="text-muted"><?= $item['description']; ?></small>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center align-items-end">
                                        <span class="text-black ">R$ <?= number_format($item['price'], 2, ',', '.'); ?></span>
                                        <strong class="text-muted " disabled><?= $item['quantity']; ?></strong>
                                    </div>
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
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="fw-bold">Total</span>
                        <strong>R$ <?= number_format($cart_total, 2, ',', '.'); ?></strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Código promocional">
                        <button type="submit" class="btn btn-secondary">
                            <font dir="auto" style="vertical-align: inherit;">
                                <font dir="auto" style="vertical-align: inherit;">verificação</font>
                            </font>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">
                    <font dir="auto" style="vertical-align: inherit;">
                        <font dir="auto" style="vertical-align: inherit;">Adicione seus dados</font>
                    </font>
                </h4>
                <form method="POST" action="<?= BASE_URL; ?>Purchase/finish"  >
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">Primeiro nome</font>
                                </font>
                            </label>
                            <input type="text" class="form-control" name="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        Por favor, insira um nome válido.
                                    </font>
                                </font>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">Sobrenome</font>
                                </font>
                            </label>
                            <input type="text" class="form-control" name="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        Por favor, insira um sobrenome correto.
                                    </font>
                                </font>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="username" id="username" name="username" class="form-label">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">nome de usuário</font>
                                </font>
                            </label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        <font dir="auto" style="vertical-align: inherit;">@</font>
                                    </font>
                                </span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="nome de usuário" required="">
                                <div class="invalid-feedback">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        <font dir="auto" style="vertical-align: inherit;">
                                            Seu nome de usuário é obrigatório.
                                        </font>
                                    </font>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" id="email"  class="form-label">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">E-mail </font>
                                </font><span class="text-muted">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        <font dir="auto" style="vertical-align: inherit;">(opcional)</font>
                                    </font>
                                </span>
                            </label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="você@exemplo.com">
                            <div class="invalid-feedback">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        Por favor, insira um endereço de e-mail válido para receber atualizações sobre o envio.
                                    </font>
                                </font>
                            </div>
                        </div>

                        <div id="address-fields" class="d-none">
                            <div class="col-12 ">
                                <label for="address" class="form-label">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        <font dir="auto" style="vertical-align: inherit;">Endereço</font>
                                    </font>
                                </label>
                                <input type="text" class="form-control" id="address" name="road" placeholder="Rua João, 123" >
                                <div class="invalid-feedback">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        <font dir="auto" style="vertical-align: inherit;">
                                            Por favor, insira seu endereço de entrega.
                                        </font>
                                    </font>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <label for="address2" class="form-label">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        <font dir="auto" style="vertical-align: inherit;">Complemento </font>
                                    </font><span class="text-muted">
                                        <font dir="auto" style="vertical-align: inherit;">
                                            <font dir="auto" style="vertical-align: inherit;">(Opcional)</font>
                                        </font>
                                    </span>
                                </label>
                                <input type="text" class="form-control" id="address2" name="complement" placeholder="Apartamento 24">
                            </div>
                        </div>




                    </div>

                    <hr class="my-4">

                    <div class="form-check">
                        <input type="radio" id="same-address" name="deliveryMethod" class="form-check-input" value="same-address">
                        <label class="form-check-label" for="same-address">
                            <font dir="auto" style="vertical-align: inherit;">
                                <font dir="auto" style="vertical-align: inherit;">Entrega</font>
                            </font>
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="save-info" name="deliveryMethod" class="form-check-input" value="save-info">
                        <label class="form-check-label" for="save-info">
                            <font dir="auto" style="vertical-align: inherit;">
                                <font dir="auto" style="vertical-align: inherit;">Retirada</font>
                            </font>
                        </label>
                    </div>



                    <hr class="my-4">

                    <h4 class="mb-3">
                        <font dir="auto" style="vertical-align: inherit;">
                            <font dir="auto" style="vertical-align: inherit;">Método de pagamento</font>
                        </font>
                    </h4>

                    <div class="my-3">
                        <div class="form-check">
                            <input value="credit" id="credit" name="paymentMethod" type="radio" class="form-check-input">
                            <label class="form-check-label" for="credit">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">Cartão de crédito</font>
                                </font>
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="cash" id="cash" name="paymentMethod" type="radio" class="form-check-input">
                            <label class="form-check-label" for="cash">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">Dinheiro</font>
                                </font>
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="pix" id="pix" name="paymentMethod" type="radio" class="form-check-input">
                            <label class="form-check-label" for="paypal">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">Pix</font>
                                </font>
                            </label>
                        </div>
                    </div>

                    <div id="credit-fields" class="row gy-3 d-none">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">Nome no cartão</font>
                                </font>
                            </label>
                            <input type="text" class="form-control" id="cc-name" placeholder="">
                            <small class="text-muted">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">Nome completo conforme consta no cartão.</font>
                                </font>
                            </small>
                            <div class="invalid-feedback">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        Nome obrigatório para o cartão
                                    </font>
                                </font>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cc-number" class="form-label">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">Número do cartão</font>
                                </font>
                            </label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" >
                            <div class="invalid-feedback">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        Número do cartão de crédito obrigatório
                                    </font>
                                </font>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-expiration" class="form-label">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">data de validade</font>
                                </font>
                            </label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" >
                            <div class="invalid-feedback">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        Data de validade necessária
                                    </font>
                                </font>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">O código triplo (CVV)</font>
                                </font>
                            </label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" >
                            <div class="invalid-feedback">
                                <font dir="auto" style="vertical-align: inherit;">
                                    <font dir="auto" style="vertical-align: inherit;">
                                        Código de segurança obrigatório
                                    </font>
                                </font>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" name="purchase" type="submit">
                        <font dir="auto" style="vertical-align: inherit;">
                            <font dir="auto" style="vertical-align: inherit;">Confirmar compra</font>
                        </font>
                    </button>
                </form>
            </div>
        </div>
    </main>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">
            <font dir="auto" style="vertical-align: inherit;">
                <font dir="auto" style="vertical-align: inherit;">© 2017-2021 Deftec</font>
            </font>
        </p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">
                    <font dir="auto" style="vertical-align: inherit;">
                        <font dir="auto" style="vertical-align: inherit;">Política de Privacidade</font>
                    </font>
                </a></li>
            <li class="list-inline-item"><a href="#">
                    <font dir="auto" style="vertical-align: inherit;">
                        <font dir="auto" style="vertical-align: inherit;">Termos de Uso</font>
                    </font>
                </a></li>
            <li class="list-inline-item"><a href="#">
                    <font dir="auto" style="vertical-align: inherit;">
                        <font dir="auto" style="vertical-align: inherit;">Suporte técnico</font>
                    </font>
                </a></li>
        </ul>
    </footer>
</div>