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
            if (!empty($_POST['name']) && !empty($_POST['quantity']) && !empty($_POST['price'])) {
                $name = addslashes(trim($_POST['name']));
                $quantity = intval($_POST['quantity']);
                $price = floatval($_POST['price']);

                if ($quantity < 0 || $price < 0) {
                    $this->data['Erro'] = message()->warning('Valores negativos não são permitidos.');
                } else {
                    $stock->addProduct($name, $quantity, $price);
                    header('Location: ' . BASE_URL . 'Stock/index/new_product');
                    exit;
                }
            }

            //  Editar produto
            if (!empty($_POST['id_edit']) && !empty($_POST['name_edit'])) {
                $id = intval($_POST['id_edit']);
                $name = addslashes(trim($_POST['name_edit']));
                $quantity = intval($_POST['quantity_edit']);
                $price = floatval($_POST['price_edit']);

                $stock->editProduct($id, $name, $quantity, $price);
                header('Location: ' . BASE_URL . 'Stock/index/edit_product');
                exit;
            }

            //  Excluir produto
            if (!empty($_POST['id_delete'])) {
                $id = intval($_POST['id_delete']);
                $stock->deleteProduct($id);
                header('Location: ' . BASE_URL . 'Stock/index/delete_product');
                exit;
            }

            //  Listar produtos
            $this->data['product_list'] = $stock->getList();

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
