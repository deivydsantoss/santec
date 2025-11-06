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

    public function addCarrinho(){

        $stock = new Stock(); // Model responsável pelo banco de dados

        $id_product = $_POST['id_product'];
        $product = $stock->selectForId($id_product);

        if(!isset($_SSESION['carrinho'])){
            $_SESSION['carrinho'] = [];
        }
            

        $cart = false;
        foreach($_SESSION['carrinho'] as $i => $item) { 
            if($item['id'] == $product['id']){
                $_SESSION['carrinho'][$i]['quantidade']++;
                $cart = true;
                break;
            }
        }

        if(!$cart){
            $_SESSION['carrinho'][]=[
                'id'=> $product['id_product'],
                'name'=> $product['name_product'],
                'description' => $product['description'],
                'price'=> $product['price'],
                'quantity'=> 1
            ];
        }

        header("Location: " . BASE_URL . "Store/index");
        exit;
    }

}
