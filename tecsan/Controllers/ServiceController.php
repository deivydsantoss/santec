<?php

class ServiceController extends Controller
{

    private $data = array();

    public function index(){

        $this->loadTemplateSite('Service/index', $this->data);
    }
}