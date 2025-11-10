<?php

class PurchaseController extends Controller
{

    private $data = array();

    public function index()
    {

        $cart_product = $_SESSION['carrinho'] ?? [];
        $this->data['cart_product'] = $cart_product;

        //valor
        $total = 0;
        foreach ($cart_product as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        $this->data['cart_total'] = $total;

        //quantidade
        $quantity = 0;
        foreach ($cart_product as $item) {
            $quantity += $item['quantity'] ;
        }
        $this->data['cart_quantity'] = $quantity;

        // Scripts e visual
        $this->data['JS'] = '
                <script src="' . BASE_URL . 'Assets/js/jquery-3.5.1.js"></script>
                <script src="' . BASE_URL . 'Assets/js/mask.js"></script>
                <script src="' . BASE_URL . 'Assets/js/datatables.js"></script>
                <script src="' . BASE_URL . 'Assets/js/jqueryUser.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        $("#table-stock").DataTable({ responsive: true });
                    });
                </script>
            ';

        $this->loadTemplateSite('Purchase/index', $this->data);
    }
}
