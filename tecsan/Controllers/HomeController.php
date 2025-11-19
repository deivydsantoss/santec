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
		$items = new Items();
		$products = $items->getListChart();

		$this->data['products_list_names'] = array_column($products,'name_products');
		$this->data['products_list_qtds'] = array_column($products,'quantity');

		// var_dump( array_column($this->data['products_list'],'name_products'));
		// exit;

		$categ = $items->getListChartCateg();
		$this->data['products_list_categ'] = array_column($categ,'name_category');
		$this->data['products_list_qtds_categ'] = array_column($categ,'quantity');

		$this->data['today_revenue'] = $items->getTodayRevenue();

		$this->data['total_revenue'] = $items->getTotalRevenue();

		$this->data['nivel-1'] = 'Dashboard';

		$this->loadTemplateAdmin('Admin/blank', $this->data);
	}
}
