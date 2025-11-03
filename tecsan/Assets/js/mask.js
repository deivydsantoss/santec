document.addEventListener('DOMContentLoaded', () => {
    const priceInputs = document.querySelectorAll('input[name*="price"]');

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