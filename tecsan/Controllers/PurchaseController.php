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
            $quantity += $item['quantity'];
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

    public function finish()
    {

        $cart_product = $_SESSION['carrinho'] ?? [];
        $this->data['cart_product'] = $cart_product;

        $total = 0;
        foreach ($cart_product as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        $this->data['cart_total'] = $total;


        $client = new Client();

        $address = new Address();

        $orders = new Orders();

        $items = new Items();

        $stock = new Stock();


        if (isset($_REQUEST['purchase'])) {

            $first_name = addslashes(trim($_POST['firstName']));
            $last_name = addslashes((trim($_POST['lastName'])));
            $username = addslashes(trim($_POST['username']));
            $email = addslashes(trim($_POST['email']));

            $last_id_client = $client->addClient($first_name, $last_name, $username, $email);

            $road = addslashes(trim($_POST['road']));
            $complement = addslashes(trim($_POST['complement']));

            $last_id_address = $address->addAddress($road, $complement, $last_id_client);

            $payment_method = addslashes(trim($_POST['paymentMethod']));
            $delivery_method = addslashes(trim($_POST['deliveryMethod']));

            $last_id_order = $orders->addOrder($last_id_client, $last_id_address, $total, $delivery_method, $payment_method);

            // echo '<pre>';
            // var_dump($_SESSION['carrinho']);
            // exit;

            foreach ( $_SESSION['carrinho'] as $itens_carrinho) {
                $items->addItems($itens_carrinho['id'], $last_id_order, $itens_carrinho['name'], $itens_carrinho['price'], $itens_carrinho['quantity']);

                // apenas para descontar a quantidade de produtos vendidos
                $stock->vendaRealizada($itens_carrinho['id'], $itens_carrinho['quantity']);
            }

            unset($_SESSION['carrinho']);

            header('Location: ' . BASE_URL . 'Purchase');
            exit;
        }
    }
}
