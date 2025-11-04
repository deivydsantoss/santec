<?php

class StoreController extends Controller
{

    private $data = array();

    public function index()
    {
        $this->data['level-1'] = 'WebSite';

        $category = new Category(); // Model responsável pelo banco de dados

        // Listar Categorias
        $this->data['category_list'] = $category->getCategory();

        // $this->data['CSS'] = customCSS('style');
        $this->loadTemplateSite('Store/index', $this->data);
    }
}
