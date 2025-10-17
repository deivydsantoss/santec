<?php

Class StockController extends Controller {
    
    private $data = array();

    public function __construct()
	{
		$user = new Users();
		if (!$user->isLogged()) {
			header('Location: ' . BASE_URL . 'Login');
			exit;
		} else {
			$user->setLoggedUser();
			$this->data["name"] = $user->getName();
		}
	}

    public function createProduct(){

        $stock = new Stock(); // Model responsável pelo banco de dados
        
            if (!empty($_POST['name']) && !empty($_POST['quantity']) && !empty($_POST['description']) && !empty($_POST['category']) && !empty($_POST['price'])) {
                $name_product = addslashes(trim($_POST['name']));
                $description = addslashes(trim($_POST['description']));
                $category = addslashes(trim($_POST['category']));
                $quantity = intval($_POST['quantity']);
                $price = floatval($_POST['price']);
                
                if ($quantity < 0 || $price < 0) {
                    $this->data['Erro'] = message()->warning('Valores negativos não são permitidos.');
                } else {
                    
                    $stock->addProduct($name_product, $description, $category, $quantity, $price);
                }

            }
    }

    public function index()
    {
        $this->data['title'] = 'Gestão de Estoque';
        $this->data['nivel-1'] = 'Estoque';

        $user = new Users();
        $user->setLoggedUser();

        // echo 'oi';
        // return 'oi';

        
        if (!$user->hasPermission('manage_stock')) {


            $stock = new Stock(); // Model responsável pelo banco de dados
            $category = new Category(); // Model responsável pelo banco de dados

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

            //  Adicionar novo produto
            if (isset($_REQUEST['add'])) {
                $name_product = addslashes(trim($_POST['name']));
                $description = addslashes(trim($_POST['description']));
                $id_category = addslashes(trim($_POST['id_category']));
                $quantity = intval($_POST['quantity']);
                $price = floatval($_POST['price']);
                
                if ($quantity < 0 || $price < 0) {
                    $this->data['Erro'] = message()->warning('Valores negativos não são permitidos.');
                } else {
                    
                    $stock->addProduct($name_product, $description, $id_category, $quantity, $price);
                }

                redirect('Home');

            }

            //  Editar novo produto
            // if (!empty($_POST['name_product']) && !empty($_POST['quantity']) && !empty($_POST['description']) && !empty($_POST['id_category']) && !empty($_POST['price'])) {
            if (isset($_REQUEST['edit'])) {
                $name_product = addslashes(trim($_POST['name']));
                $description = addslashes(trim($_POST['description']));
                $id_category = addslashes(trim($_POST['id_category']));
                $quantity = intval($_POST['quantity']);
                $price = floatval($_POST['price']);

                
                if ($quantity < 0 || $price < 0) {
                    $this->data['Erro'] = message()->warning('Valores negativos não são permitidos.');
                } else {
                    
                    $stock->editProduct($name_product, $description, $id_category, $quantity, $price);
                }

            }
            

            //  Remover o produto para lixeira 
            if (!empty($_POST['id_product'])) {
                $id_product = intval($_POST['id_product']);
                $stock->RemoveToTrashProduct($id_product);
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


            //  Listar produtos
            $this->data['products_list'] = $stock->getList();

            //  Listar produtos da lixeira
            $this->data['products_trash'] = $stock->getListTrash();


            // Listar Categorias
            $this->data['category_list'] = $category->getCategory();


            // Scripts e visual
            $this->data['JS'] = '
                <script src="' . BASE_URL . 'Assets/js/datatables.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        $("#table-stock").DataTable({ responsive: true });
                    });
                </script>
            ';

            $this->loadTemplateAdmin('Stock/index', $this->data);
        } else {
            redirect('Home');
        }
    }
}
