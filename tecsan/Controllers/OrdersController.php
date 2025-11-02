<?php

Class OrdersController extends Controller {
    
    private $data = array();

    public function __construct(){
		$user = new Users();
		if (!$user->isLogged()) {
			header('Location: ' . BASE_URL . 'Login');
			exit;
		} else {
			$user->setLoggedUser();
			$this->data["name"] = $user->getName();
		}
	}

    public function index(){

        $this->data['title'] = 'Gestão de Pedidos';
        $this->data['nivel-1'] = 'Pedidos';

        $user = new Users();
        $user->setLoggedUser();


        if (!$user->hasPermission('manage_stock')) {

            $stock = new Stock(); // Model responsável pelo banco de dados
            $category = new Category(); // Model responsável pelo banco de dados
            $orders = new Orders(); // Model responsável pelo banco de dados
            $maker = new Maker(); // Model responsável pelo banco de dados
            

            // Mensagens de sucesso
            if (!empty($success)) {
                if ($success == 'new_product') {
                    $this->data['success'] = message()->success('Produto adicionado com sucesso!');
                } elseif ($success == 'edit_product') {
                    $this->data['success'] = message()->success('Produto atualizado com sucesso!');
                } elseif ($success == 'delete_product') {
                    $this->data['success'] = message()->success('Produto removido com sucesso!');
                }
            }

            //  Adicionar nova categoria
            if (!empty($_POST['category'])) {

                $id_category = addslashes(trim($_POST['category']));
              
                $category->addCategory( $id_category);
                redirect('Stock');
            }

            //  Remover o produto para lixeira 
            if (!empty($_POST['restore'])) {
                $id_product = intval($_POST['restore']);
                $stock->restoreProduct($id_product);
            }

            //  Mover o produto para lixeira 
            if (!empty($_POST['id_product'])) {
                $id_product = intval($_POST['id_product']);
                $stock->MoveToTrashProduct($id_product);
            }

            //  Excluir produto
            if (!empty($_POST['delete'])) {
                $delete = intval($_POST['delete']);
                $stock->deleteProduct($delete);
            }

            // Listar Fabricantes
            $this->data['makers_list'] = $maker->getMaker();

            // Listar Products
            $this->data['products_list'] = $stock->getList();

            //  Listar pedidos
            $this->data['orders_list'] = $orders->getOrders();

            // Scripts e visual
            $this->data['JS'] = '
                <script src="' . BASE_URL . 'Assets/js/mask.js"></script>
                <script src="' . BASE_URL . 'Assets/js/datatables.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        $("#table-stock").DataTable({ responsive: true });
                    });
                </script>
            ';

            $this->loadTemplateAdmin('Orders/index', $this->data);
        } else {
            redirect('Home');
        }
    }

    public function createOrders()
    {
        $orders = new Orders();

        //  Adicionar novo Pedido
        if (isset($_REQUEST['neworder'])) {

            $name_product = addslashes(trim($_POST['id_product']));
            $id_maker = addslashes(trim($_POST['id_maker']));
            $quantity = intval($_POST['quantity']);
            $tprice_mask = $_POST['total_price'];
            $uprice_mask = $_POST['unit_price'];

            $delivery_time = date($_POST['delivery_time']);
            $delivery_date = date('0000-00-00');

            $total_price = str_replace(",", ".", $tprice_mask);
            $total_price = str_replace("R$ ", "", $total_price);

            $unit_price = str_replace(",", ".", $uprice_mask);
            $unit_price = str_replace("R$ ", "", $unit_price);
            // var_dump($unit_price);
            // exit;

            if ($quantity < 0 || $total_price < 0) {
                $this->data['Erro'] = message()->warning('Valores negativos não são permitidos.');
            } else {
                    
                $orders->addOrder($name_product,$id_maker,$quantity,$unit_price,$total_price , $delivery_time, $delivery_date);
            }
                redirect('Orders');
            }
    }

    public function editOrders()
    {
        $orders = new Orders();

        //  Editar Pedido
        if (isset($_POST['editar'])) {

            $id_order = intval($_POST['id_order']);
            $name_product = addslashes(trim($_POST['id_product']));
            $id_maker = addslashes(trim($_POST['id_maker']));
            $quantity = intval($_POST['quantity']);
            $tprice_mask = $_POST['total_price'];
            $uprice_mask = $_POST['unit_price'];
            $delivery_time = date($_POST['delivery_time']);
            $delivery_date = date('0000-00-00');

            $total_price = str_replace(",", ".", $tprice_mask);
            $total_price = str_replace("R$ ", "", $total_price);

            $unit_price = str_replace(",", ".", $uprice_mask);
            $unit_price = str_replace("R$ ", "", $unit_price);
            // var_dump($_POST);
            // exit;

            if ($quantity < 0 || $total_price < 0) {
                $this->data['Erro'] = message()->warning('Valores negativos não são permitidos.');
            } else {
                    
                $orders->editOrder($id_order, $name_product, $id_maker, $quantity, $total_price, $unit_price, $delivery_time, $delivery_date);
            }
                redirect('Orders');
            }
    }

    public function ordersConcluded()
    {
        $orders = new Orders(); // Model responsável pelo banco de dados

        $this->data['orders_list'] = $orders->ordersConcluded();

            // Scripts e visual
            $this->data['JS'] = '
                <script src="' . BASE_URL . 'Assets/js/datatables.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        $("#table-stock").DataTable({ responsive: true });
                    });
                </script>
            ';

            $this->loadTemplateAdmin('Orders/Concluded', $this->data);
    }   
}