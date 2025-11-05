<?php

class StoreController extends Controller
{

    private $data = array();



    public function index($id_category = null)
    {
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

}
