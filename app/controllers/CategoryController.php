<?php

class CategoryController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {	
   		//TITLE
    	$data = array();

    	$category_id = $_GET['id'];

    	$title = '';

    	$model_categories = new Categories();

    	$category_rows = $model_categories->find(array('columns' => 'id, name'));

    	foreach ($category_rows as $row) {
    	 	if($row['id'] == $category_id){
    	 		$title = $row['name'];
    	 	}
    	 }

    	//PRODUCTS 

    	$products = array();

    	$model_product_to_category = new ProductToCategory();

    	$product_to_category_rows = $model_product_to_category->find(array('columns' => 'product_id, category_id'));

    	foreach ($product_to_category_rows as $row) {
    		if($row['category_id'] == $category_id){
    			$products_id[] = $row['product_id'];
    		}
    	}

    	$model_products = new Products();

    	$products_rows = $model_products->find(array('conditions' => 'id in('.implode(',', $products_id).')'));

    	foreach ($products_rows as $row) {

    			$products[] = $row['name'];
    	}

    	//OUTPUT
    	
    	$data['title'] = $title;

    	$data['products'] = $products;

    	$this->view->setVar('data', $data);
    }

}
