<script>
    document.addEventListener('DOMContentLoaded', () => {
        const priceInputs = document.querySelectorAll('input[name*="Diaria"]');

        priceInputs.forEach(input => {
            input.addEventListener('input', (e) => {
                let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é número
                value = (value / 100).toFixed(2) + ''; // Coloca as duas casas decimais
                value = value.replace('.', ','); // Troca ponto por vírgula
                value = 'R$ ' + value; // Adiciona símbolo
                e.target.value = value;
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const priceInputs = document.querySelectorAll('input[name*="Mensal"]');

        priceInputs.forEach(input => {
            input.addEventListener('input', (e) => {
                let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é número
                value = (value / 100).toFixed(2) + ''; // Coloca as duas casas decimais
                value = value.replace('.', ','); // Troca ponto por vírgula
                value = 'R$ ' + value; // Adiciona símbolo
                e.target.value = value;
            });
        });
    });
</script>

<main>
    <div>
        <form method="POST" action="<?= BASE_URL . 'Home/config' ?>">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="params_name" class="form-label">Renda diária esperada:</label>
                            <input type="text" class="form-control" name="Diaria" id="params_name" placeholder="R$ 0,00" value="" required>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="params_name" class="form-label">Renda mensal esperada:</label>
                            <input type="text" class="form-control" name="Mensal" id="params_name" placeholder="R$ 0,00" value="" required>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="params_name" class="form-label">Vendas diárias esperada</label>
                            <input type="text" class="form-control" name="Vendas" id="params_name" value="" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="params_description" class="form-label">Novos usuários diários:</label>
                            <input type="text" class="form-control" name="User" id="params_description" placeholder="" value="" required>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" name="meta" class="btn btn-info">Enviar metas</button>
            </div>
        </form>
    </div>
</main>