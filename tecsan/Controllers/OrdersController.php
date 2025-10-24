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

            //  Adicionar novo Pedido
            if (isset($_REQUEST['neworder'])) {
                $date = date($_POST['date']);
                $name_product = addslashes(trim($_POST['name_product']));
                $id_maker = addslashes(trim($_POST['id_maker']));
                $quantity = intval($_POST['quantity']);
                $total_price = floatval($_POST['total_price']);
                $unit_price = floatval($_POST['unit_price']);
                
                if ($quantity < 0 || $total_price < 0) {
                    $this->data['Erro'] = message()->warning('Valores negativos não são permitidos.');
                } else {
                    
                    $stock->addProduct($date,$name_product,$id_maker,$quantity,$unit_price,$total_price);
                }

                redirect('Stock');

            }

            //  Editar o produto
            if (isset($_POST['edit'])) {
                $id_product = intval($_POST['id_product']);
                $name_product = addslashes(trim($_POST['name']));
                $description = addslashes(trim($_POST['description']));
                $id_category = addslashes(trim($_POST['id_category']));
                $id_makers = addslashes(trim($_POST['id_makers']));
                $quantity = intval($_POST['quantity']);
                $price = floatval($_POST['price']);
                
            
                
                if ($quantity < 0 || $price < 0) {
                    $this->data['Erro'] = message()->warning('Valores negativos não são permitidos.');
                } else {
                    // var_dump($_POST);
                    // exit;
                    $stock->editProduct($name_product, $description,$quantity,$price,$id_category, $id_makers,$id_product);
                    redirect('Stock');
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


            //  Listar pedidos
            $this->data['orders_list'] = $orders->getOrders();

            // Scripts e visual
            $this->data['JS'] = '
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

    public function ordersConcluded()
    {
        $orders = new Orders(); // Model responsável pelo banco de dados

        $this->data['orders_list'] = $orders->getOrders();

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