<?php
class ControllerProductXml extends Controller {
	//// product/Xml
	public function index() {
		//echo "this";
		//$data =array();
		//$data["text_from_controler"]= " <div>data ___tht form controleer</div>";
		//$k = "premenna K";

		//$this->response->setOutput($this->load->view('product/xml',$data));
		$this->load->model('catalog/xml'); //nacitanie suboru 
			 $this->model_catalog_xml->getXml(); //spustenie funkcie z nacitaneho suboru + zobrazenie, len ak je dane prikazom.

			//toto odosiela $data na koniec.
			//$this->response->setOutput($this->load->view('product/xml', $data)); ////odoslanie $data na koniec stranky.

			//$results = $this->model_catalog_category->getCategories2(0);

	}

    // product/Xml/add
	public function add() {
		echo "this add ";
	}
}