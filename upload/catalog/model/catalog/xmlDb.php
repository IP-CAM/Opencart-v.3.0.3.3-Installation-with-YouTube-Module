<?php
class ModelCatalogXmlDb extends Model {
	
	public function getXmlDb() {

		$this->load->model('tool/image');

		function costFormat($x){
			$x = number_format($x, 2, '.', '');
			return $x;
		}

		// Atribute !!!!
		$params = $this->db->query("SELECT attribute_id,  product_id, text FROM " . DB_PREFIX . "product_attribute  " );
		$params = $params->rows;
		echo "<pre>";

		$attribute_description_names = $this->db->query("SELECT name, attribute_id FROM " . DB_PREFIX . "attribute_description");
		$attribute_description_names =$attribute_description_names ->rows;

		$attribute_group_ids = $this->db->query("SELECT attribute_group_id, attribute_id FROM " . DB_PREFIX . "attribute ");
		$attribute_group_ids = $attribute_group_ids->rows;

		$attribute_group_names = $this->db->query("SELECT name, attribute_group_id FROM " . DB_PREFIX . "attribute_group_description ");
		$attribute_group_names =$attribute_group_names ->rows;


		$newAttributes = array();
		foreach ($params as $param) {
			$param["attribute_name"]="";
			foreach ($attribute_description_names as $attribute_description_name) {
				if ($param["attribute_id"] == $attribute_description_name["attribute_id"]){
				$param["attribute_name"] = $attribute_description_name["name"];
			}}
			$param["attribute_group_id"]="";
			foreach ($attribute_group_ids as $attribute_group_id) {
				if ($param["attribute_id"] ==$attribute_group_id["attribute_id"]) {
					$param["attribute_group_id"] = $attribute_group_id["attribute_group_id"];
				}
			}
			$param["attribute_group_name"]="";
			foreach ($attribute_group_names as $attribute_group_name) {
				if ($param["attribute_group_id"] == $attribute_group_name["attribute_group_id"] ) {
					# code...
					$param["attribute_group_name"] = $attribute_group_name["name"];
				}
			}
			array_push($newAttributes, $param);
		 } 
		 //print_r($newAttributes);


		//Products: price, image, ean, manufacturer_id, cpc_h, quantity, pd.name, pd.meta_title,
		$queryProducts = $this->db->query("SELECT p.product_id, pd.name, pd.description, p.ean,   p.price, p.cpc_h , p.manufacturer_id,  p.image FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.status != 0 AND p.quantity > 0 AND p.price != 0 ");
		$productsArray = $queryProducts->rows;

		$imgAlternative = $this->db->query("SELECT product_id, image FROM " . DB_PREFIX . "product_image ");
		$imgAlternative = $imgAlternative->rows;

		$category_ids = $this->db->query("SELECT category_id, product_id FROM " . DB_PREFIX .
									 "product_to_category ");
		$category_ids = $category_ids->rows;			

		$categorytexts = $this->db->query("SELECT name, category_id FROM " . DB_PREFIX . "category_description ");
		$categorytexts = $categorytexts->rows;
							
		$manufacturers = $this->db->query("SELECT name, manufacturer_id FROM " . DB_PREFIX . "manufacturer ");
		$manufacturers = $manufacturers->rows;
			

		$productsAltImgs = array();
		foreach ($productsArray as $product) {
			$product["ITEM_ID"] = $product["product_id"];
			$product["price"]= costFormat($product["price"]);
			$product["price"] = $product["price"];
			 
			if ($product["cpc_h"] > 0){
				$product["cpc_h"] = costFormat($product["cpc_h"]);
			}
			else{ $product["cpc_h"] = "";}

			if ($product["image"] !== ""){$product["image"] = $this->model_tool_image->resize($product["image"], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height')); }
			$product["imgAlt"] = "";
			$productIdControl = $product["product_id"];
			$LastProductIdControl = "";
			foreach ($imgAlternative as $imgalt) {
					if ($LastProductIdControl != $imgalt["product_id"]){
						if ($imgalt["product_id"] == $product["product_id"]){
						//$product["imgAlt"] = $imgalt["image"];
							$product["imgAlt"] = $this->model_tool_image->resize($imgalt["image"], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height'));
					}
					$LastProductIdControl = $imgalt["product_id"];
			}}
			$LastProductIdControlCategory = "";
			$product["category_id"] = "";
			foreach ($category_ids as $category_id) {
					if ($LastProductIdControlCategory != $category_id["product_id"]) {
						if ($category_id["product_id"]== $product["product_id"]) {
							$product["category_id"] = $category_id["category_id"];
						}
					$LastProductIdControlCategory = $category_id["product_id"];
					}
			}
			$product["categoryTxt"] = "";
			foreach ($categorytexts as $categorytext) {
				if ($product["category_id"] == $categorytext["category_id"]){
						$product["categoryTxt"] = $categorytext["name"];
				}
			}
			$product["categoryTxt"] = str_replace("&amp;", "&", $product["categoryTxt"]);

			$product["description"] = (strip_tags(html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8')));
			$product["description"] = preg_replace('!\s+!',  ' ', ($product["description"]));
			$product["description"] = html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8');

			if (($product["category_id"]) == 0){
					$product["url"] = $this->url->link('product/product', 'path=' .  '&product_id=' . $product["product_id"]);

				}
				else{
					$product["url"] = $this->url->link('product/product', 'path=' . $product["category_id"] . '&product_id=' . $product["product_id"]);
			    }
			$product["url"] = str_replace("&amp;", "&", $product["url"]);

			$product["manufacturer"] = "";
			foreach ($manufacturers as $manufacturer) {
				if ($product["manufacturer_id"] == $manufacturer["manufacturer_id"]){
						$product["manufacturer"] = $manufacturer["name"];
				}
			}
			$paramsArray= array();
			foreach ($newAttributes as $newAttribute) {
				if ($newAttribute["product_id"] == $product["product_id"]) {
					if (strpos($newAttribute["attribute_name"], 'test' )!==false) {
						 // tu som skusal conatins a in
						$paramsArray[$newAttribute["attribute_group_name"]] = $newAttribute["text"];
					}
					else{
						$paramsArray[$newAttribute["attribute_name"]] = $newAttribute["text"];
					}
					//print_r( $paramsArray);
				}
			}
			$product["param"]=$paramsArray;

			$deliveryArray = array();
			if( $product["price"] >= 1000){
				$deliveryArray["DELIVERY_ID"] = "FREE_SHIPING";
				$deliveryArray["DELIVERY_PRICE"] = 0.00;
				}
			else
				{$deliveryArray["DELIVERY_ID"] ='SLOVENSKA_POSTA';
				$deliveryArray["DELIVERY_PRICE"] = $this->config->get('shipping_SP_cost');}

			$deliveryArray["DELIVERY_PRICE"] =number_format($deliveryArray["DELIVERY_PRICE"], 2, '.', '');		
			$deliveryArray["DELIVERY_PRICE_COD"]= $deliveryArray["DELIVERY_PRICE"] ; //cod pre heureku zahrna cenu dopravy vratane sposobu platby. // po dorobeni ceny platby treba dorobit COD
			$product["delivery"]= $deliveryArray;

		  //renames keys  and sorting
			 $product["ITEM_ID"] = $product["product_id"];
			 $product["PRODUCTNAME"] = $product["name"];
			 $product["PRODUCT"] = $product["name"];
			 $product["DESCRIPTION"] = $product["description"];
			 $product["URL"] = $product["url"];
			 $product["IMGURL"] = $product["image"];
			 $product["IMGURL_ALTERNATIVE"] = $product["imgAlt"];
			 $product["PRICE_VAT"] = $product["price"];
			 $product["HEUREKA_CPC"] = $product["cpc_h"];
			 $product["MANUFACTURER"] = $product["manufacturer"];
			 $product["CATEGORYTEXT"] = $product["categoryTxt"];
			 $product["PARAM"] = $product["param"];
			 $product["DELIVERY_DATE"]= "2";
			 $product["DELIVERY"] = $product["delivery"];

			unset($product["price"], $product["product_id"], $product["name"], $product["description"], $product["url"], $product["image"], $product["imgAlt"],$product["categoryTxt"],   $product["manufacturer"], $product["manufacturer_id"], $product["ean"], $product["category_id"], $product["cpc_h"], $product["param"], $product["delivery"] );
			

			array_push($productsAltImgs, $product);
		}
	//print_r($productsAltImgs);


$xml = new DOMDocument("1.0" ,"utf-8");
$xml ->formatOutput=true;

	$shop = $xml->createElement("SHOP");
	$xml->appendChild($shop);

	foreach ($productsAltImgs as $product){
				
		$shopItem1 = $xml->createElement("SHOPITEM");
		$shop->appendChild($shopItem1);

		foreach ($product as $key => $value) {
			if ($value != "" AND gettype($value) != "array" and $key !="PARAM"and $value !="DELIVERY" ){

				$InsideProductMainRow = $shopItem1->appendChild($xml->createElement($key));

				if (gettype($value)=="string") {
					if (strpos($value, "&") == true ) {
						$InsideProductMainRow->appendChild($xml->createCDATASection($value));
					}
					else{
						$InsideProductMainRow->appendChild(new DOMtext($value));
				} 	}	}

			elseif ($key == "PARAM" and gettype($value) =="array") {// ex status, manufacturer id..
				if (array_sum($value) !== 0) {
					foreach ($value as $keys => $values) {
						$paramsXml = $xml->createElement("PARAM");
						$shopItem1->appendChild($paramsXml);
						$PARAM_NAME = $xml->createElement("PARAM_NAME", $keys); //key = colour
						$paramsXml->appendChild($PARAM_NAME);
						$VAL = $xml->createElement("VAL", $values); //"black"
						$paramsXml->appendChild($VAL);
				}	}	}
			elseif ($key == "DELIVERY" and gettype($value)== "array" and array_sum($value) !== 0){
				$deliveryMain = $xml->createElement("DELIVERY");
				$shopItem1->appendChild($deliveryMain);
					foreach ($value as $keyD => $valueD) {
						$deliveryIDXml = $xml->createElement($keyD, $valueD);
						$deliveryMain->appendChild($deliveryIDXml);
				}	}
		}

	}
echo  "<xmp>". $xml->saveXML()."</xmp>";
}}

