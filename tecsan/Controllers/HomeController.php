<?php

class HomeController extends Controller
{
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
		$client = new Client();
		$config = new Config();
		$orders = new Orders();
		$items = new Items();
		$products = $items->getListChart();

		$this->data['products_list_names'] = array_column($products, 'name_products');
		$this->data['products_list_qtds'] = array_column($products, 'quantity');

		// var_dump( array_column($this->data['products_list'],'name_products'));
		// exit;

		$categ = $items->getListChartCateg();
		$this->data['products_list_categ'] = array_column($categ, 'name_category');
		$this->data['products_list_qtds_categ'] = array_column($categ, 'quantity');

		$this->data['today_revenue'] = $items->getTodayRevenue();
		$this->data['total_revenue'] = $items->getTotalRevenue();

		$this->data['meta'] = $config->getMeta();

		$this->data['quantity_today'] = $orders->countOrders();

		$this->data['client_today'] = $client->countClient();

		$this->data['nivel-1'] = 'Dashboard';

		$this->loadTemplateAdmin('Admin/blank', $this->data);
	}

	public function config()
	{
		$config = new Config();

		// var_dump($_POST);
		// exit;

		if (isset($_REQUEST['meta'])) {

			$renda_diaria = addslashes(trim($_POST['Diaria']));
			$renda_mensal = addslashes(trim($_POST['Mensal']));
			$qtd_pedidos = addslashes(trim($_POST['Vendas']));
			$qtd_novo_user = addslashes(trim($_POST['User']));

			$price = str_replace(",", ".", $renda_diaria);
            $price = str_replace("R$ ", "", $price);

			$preco = str_replace(",", ".", $renda_mensal);
            $preco = str_replace("R$ ", "", $preco);

			$config->addMeta($price, $preco, $qtd_pedidos, $qtd_novo_user);
		}



		$this->loadTemplateAdmin('Admin/config', $this->data);
	}
}
