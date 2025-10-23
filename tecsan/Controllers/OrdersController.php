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

        if (!$user->hasPermission('manage_orders')) {

            $orders = new Orders();

        }


        //  Listar produtos
        $this->data['products_list'] = $orders->getOrders();
    }

}