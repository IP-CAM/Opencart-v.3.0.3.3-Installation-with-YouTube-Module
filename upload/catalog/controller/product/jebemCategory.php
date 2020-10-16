<?php
class ControllerProductJebemCategory extends Model {
	// http://localhost/opencart-3.0.3.3/upload/index.php?route=product/jebemCategory
	public function index(){
    	echo "this is index page call from cpc /jebemCategory controller";
    	$this->load->language("product/jebemcategory");
    	$data = array();
    	$data["text_from_controller"] = "44this is text form controller";

    	$data['categories'][] = array();

		$this->load->model('catalog/category');
		$results = $this->model_catalog_category->getCategories2(0);



echo "<pre>";
print_r($results);
		
		//$data["column_left"]= $this->load->controller("common/column_left");
		//$data["header"]= $this->load->controller("common/header");

	$this->response->setOutput($this->load->view("product/jebemcategory", $data));
}
	//http://localhost/opencart-3.0.3.3/upload/index.php?route=product/jebemCategory/add
	public function add(){
		echo "this is add methodd call from cpc"; 

	}
}