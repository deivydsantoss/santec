<?php

Class CategoryController extends Controller {
    
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


        
        if (!$user->hasPermission('manage_stock')) {


            $category = new Category(); // Model responsável pelo banco de dados


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

            $this->loadTemplateAdmin('Category/index', $this->data);
        } else {
            redirect('Home');
        }
    }
}
