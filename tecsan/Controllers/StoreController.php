<?php

class StoreController extends Controller
{

    private $data = array();


    public function index($id_category = null)
    {

        $cart_product = $_SESSION['carrinho'] ?? [];
        $this->data['cart_product'] = $cart_product;

        // var_dump($cart_product);
        // exit;

        // calculei o total do carrinho
        $total = 0;
        foreach ($cart_product as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        $this->data['cart_total'] = $total;


        $this->data['level-1'] = 'WebSite';

        $category = new Category(); // Model responsável pelo banco de dados
        $stock = new Stock(); // Model responsável pelo banco de dados



        //  Listar produtos
        if ($id_category != null) {
            $this->data['products_list'] = $stock->selectCategory($id_category);
        } else {
            $this->data['products_list'] = $stock->getList();
        }

        // Listar Categorias
        $this->data['category_list'] = $category->getCategory();

        // $this->data['CSS'] = customCSS('style');
        $this->loadTemplateSite('Store/index', $this->data);
    }

    public function addCarrinho()
    {
        session_start();

        $stock = new Stock(); // Model responsável pelo banco de dados

        $id_product = $_POST['id_product'];
        $product = $stock->selectForId($id_product);

        // Garante que o carrinho exista
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }


        $existe = false;

        foreach ($_SESSION['carrinho'] as $i => $item) {
            if ($item['id'] == $product['id_product']) {
                $_SESSION['carrinho'][$i]['quantity']++;
                $existe = true;
                break;
            }
        }

        if (!$existe) {
            $_SESSION['carrinho'][] = [
                'id' => $product['id_product'],
                'name' => $product['name_product'],
                'description' => $product['description'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }


        header('Location: ' . BASE_URL . 'Store/index?cart=open');
        exit;
    }

    public function removeCarrinho()
    {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }


        $id_product = (int)($_POST['id_product'] ?? $_GET['id'] ?? 0);
        if ($id_product <= 0) {
            header('Location: ' . BASE_URL . 'Store/index');
            exit;
        }


        $removeAll = isset($_POST['remove_all']) && (int)$_POST['remove_all'] === 1;

        if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
            header('Location: ' . BASE_URL . 'Store/index');
            exit;
        }

        $removed = false;

        // 1) Tenta localizar por itens onde 'id' é igual ao id_product
        foreach ($_SESSION['carrinho'] as $key => $item) {
            // normaliza comparações
            $itemId = isset($item['id']) ? (int)$item['id'] : (int)$key;

            if ($itemId === $id_product) {
                // se pediu para remover tudo -> unset
                if ($removeAll) {
                    unset($_SESSION['carrinho'][$key]);
                } else {
                    // se existe quantity > 1 -> decrementa
                    if (isset($item['quantity']) && (int)$item['quantity'] > 1) {
                        $_SESSION['carrinho'][$key]['quantity'] = (int)$item['quantity'] - 1;
                    } else {
                        // quantity = 1 ou não existe -> remove o item
                        unset($_SESSION['carrinho'][$key]);
                    }
                }
                $removed = true;
                break; // se quiser remover todas as entradas com mesmo id, retire o break
            }
        }

        // 2) Caso não tenha encontrado no loop acima, talvez o carrinho esteja indexado por id (ex.: $_SESSION['carrinho'][$id] = [...])
        if (!$removed && isset($_SESSION['carrinho'][$id_product])) {
            $item = $_SESSION['carrinho'][$id_product];

            if ($removeAll) {
                unset($_SESSION['carrinho'][$id_product]);
            } else {
                if (isset($item['quantity']) && (int)$item['quantity'] > 1) {
                    $_SESSION['carrinho'][$id_product]['quantity'] = (int)$item['quantity'] - 1;
                } else {
                    unset($_SESSION['carrinho'][$id_product]);
                }
            }
            $removed = true;
        }

        // 3) Reindexa apenas se o array estiver usando índices numéricos sequenciais (0..n)
        if ($removed && is_array($_SESSION['carrinho'])) {
            $keys = array_keys($_SESSION['carrinho']);
            $sequential = ($keys === range(0, count($_SESSION['carrinho']) - 1));
            if ($sequential) {
                $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
            }
        }

        // echo '<pre>';
        // echo "ID recebido no POST: ";
        // var_dump($id_product);
        // echo "Carrinho atual: ";
        // var_dump($_SESSION['carrinho']);
        // echo '</pre>';
        // exit;

        header('Location: ' . BASE_URL . 'Store/index?cart=open');
        exit;
    }


    public function limpar()
    {
        $_SESSION['carrinho'] = [];


        header('Location: ' . BASE_URL . 'Store/index?cart=open');
        exit;
    }
}
