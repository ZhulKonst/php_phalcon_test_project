<?php

class ProductController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$products = new Products;

    	$products_list = $products->find(array('columns' => 'name'));

    	$this->view->setVar("products_list", $products_list);
    }

}

