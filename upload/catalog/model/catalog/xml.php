<?php
class ModelCatalogXml extends Model {
	
	public function getXml() {

		$this->load->model('tool/image');

		$query = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "product" );
		$rows = $query->rows;
		$product_id_list = array();
		foreach ($rows as $riadok){
			$product_id = $riadok["product_id"];
			array_push($product_id_list, $product_id);
		}; 
		
		foreach ($product_id_list as $product_id_number ){
 
			$data = $this->db->query("SELECT price, image, ean, manufacturer_id, cpc_h, quantity FROM " . DB_PREFIX . "product WHERE product_id =  '" . (int)$product_id_number . "'");
			$data1 = $data->row;
			$price2 = number_format($data1["price"], 2, '.', '');
			$ean = ($data1["ean"]);
			$cpc_h = number_format($data1["cpc_h"], 2, '.', '');
			$quantity = ($data1["quantity"]);
			$img = ($data1["image"]);
			$img2 = $this->db->query("SELECT image FROM " . DB_PREFIX . "product_image WHERE product_id =  '" . (int)$product_id_number . "'");
			$img2 = $img2->row;
			if (array_key_exists("image", $img2)== true){
				$img2 = $img2["image"];
				}
			else {$img2 = "";}

		
			$descript = $this->db->query("SELECT name,meta_title, description FROM " . DB_PREFIX . "product_description WHERE product_id =  '" . (int)$product_id_number . "'");
			$descript = $descript->row;

			$productname = $descript['meta_title'];
			$productname = preg_replace('!\s+!', ' ', $productname);
			if ($productname[0]==" ") {
				$productname = substr($productname, 1);}
			$product = $descript['name'];

			
			$descript10 = (strip_tags(html_entity_decode($descript['description'], ENT_QUOTES, 'UTF-8')));
			$descript10 = preg_replace('!\s+!',  ' ', ($descript10));
			$firstDotPlace = (strpos($descript10, ".")) + 1 ;
			$descript11 = substr($descript10, 0, $firstDotPlace);
			$descript11 = substr($descript11, 1);
			$descript =  $descript11;

	    
			$category_id = $this->db->query("SELECT category_id FROM " . DB_PREFIX .
							 "product_to_category WHERE product_id =  '" . (int)$product_id_number . "'");
			$category_id = $category_id->row;
			
		
			$video_url = "";
		
		
			$manufacturer_id = $data1['manufacturer_id'];
			$manufacturer = $this->db->query("SELECT name FROM " . DB_PREFIX . "manufacturer WHERE manufacturer_id =  '" . (int)$manufacturer_id . "'");
			$manufacturer = $manufacturer->row;
			if (array_key_exists("name", $manufacturer)== true){
				$data11['manufacturer'] = $manufacturer['name'];
			}
			else {$data11['manufacturer'] = "";}


			if (array_sum($category_id) !== 0){
					$categorytext = $this->db->query("SELECT name FROM " . DB_PREFIX . "category_description WHERE category_id =  '" . (int)$category_id['category_id'] . "'");
					$categorytext2 = $categorytext->row;
					$data11['categorytext'] = $categorytext2['name'];
			}
			

			$param = $this->db->query("SELECT attribute_id, text FROM " . DB_PREFIX . "product_attribute WHERE product_id =  '" . (int)$product_id_number . "'");
			$paramArray = array();
			if (array_sum($param->row) !== 0) {
				foreach (($param->rows) as $i) {
					$itext = ($i['text']); //corect size/colour of one param
					//($i); == //Array([attribute_id] => 4 [text] => 8gb )
					//($i['attribute_id']); == // [attribute_id] => 4
					$attribute_id = $i['attribute_id'];
					$attribute_group_id = $this->db->query("SELECT attribute_group_id FROM " . DB_PREFIX . "attribute WHERE attribute_id =  '" . (int)$attribute_id . "'");
					$attribute_group_id = $attribute_group_id->row;
					$attribute_group_id = ($attribute_group_id["attribute_group_id"]);
					$attribute_group_name = $this->db->query("SELECT name FROM " . DB_PREFIX . "attribute_group_description WHERE attribute_group_id =  '" . (int)$attribute_group_id . "'");
					$attribute_group_name = $attribute_group_name->row;
					$attribute_group_name = $attribute_group_name["name"];

					$attribute_description_name = $this->db->query("SELECT name FROM " . DB_PREFIX . "attribute_description WHERE attribute_id =  '" . (int)$attribute_id . "'");
					$attribute_description_name = $attribute_description_name->row;
					$attribute_description_name = $attribute_description_name["name"];
					//vynimka ak je preddefinovy nazov parametra = "test" !!!
					if (strpos($attribute_description_name, 'test') !== false) {
		   					 $attribute_description_name = "";
		   					 $paramArray[ $attribute_group_name ] = $itext; 
							}
						else{
							$paramArray[ $attribute_description_name ] = $itext; 
						}
					}
				} 

	   
			if( $price2 >= 1000){$delivery_ID ="FREE_SHIPING"; $delivery_price = 0.00;}
				else
					{$delivery_ID ='SLOVENSKA_POSTA'; $delivery_price = $this->config->get('shipping_SP_cost');}
				$data11["delivery_ID"] = $delivery_ID;
				$data11["delivery_price"] =number_format($delivery_price, 2, '.', ''); $delivery_price;
				$delivery_price_COD = $delivery_price; //cod pre heureku zahrna cenu dopravy vratane sposobu platby. 
				// po dorobeni ceny platby treba dorobit COD
				$data11["delivery_price_COD"] = number_format($delivery_price_COD, 2, '.', '');

		//itemgroup_ID
		//accesory
		//gift

			
		$data11["produc_id"] = $product_id_number;
		$data11["ean"]= $ean;
		$data11["cpc_h"]= $cpc_h;
		$data11["video_url"]= $video_url;
		$data11["productname"] = $productname;
		$data11["product"] = $product;
		$data11["descript"] = $descript;
		if (array_sum($category_id) == 0){
			$data11["url"] = $this->url->link('product/product', 'path=' .  '&product_id=' . $data11["produc_id"]);}
		else{
			$data11["url"] = $this->url->link('product/product', 'path=' . $category_id['category_id'] . '&product_id=' . $data11["produc_id"]);
	    }
		$data11["url"] = str_replace("&amp;", "&", $data11["url"]);
		$data11["imgurl"] = $this->model_tool_image->resize($img, 800, 800);
		$data11["imgurl_alternative"] = $this->model_tool_image->resize($img2, 800, 800);
					//$this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_height'));
		$data11['price_vat'] = $price2;
		if (array_sum($paramArray) !== 0){
			$data11["param"]= $paramArray;
			}
			else{$data11["param"]= $paramArray = array();}

		 foreach ($data11 as $key => $value) {
		 	if (gettype($value)=="string") {
		 		if (strpos($value,"&amp;" )== true) {
		 			$newValue = str_replace("&amp;", "&", $value);
		 			$data11[$key]=$newValue;
		 		}
		 	}
		 	else{
		 	$data11[$key]=$value;}
		 	}

		if ($quantity !== "0" and $price2 !== "0.00" ){
			$allProductsInData[] = $data11;
			}
		}
		//echo "<pre>";
		//print_r($allProductsInData); //to view all  $data11 in $allProductsInData.

	 

		$xml = new DOMDocument("1.0" ,"utf-8");
		$xml ->formatOutput=true;

		$shop = $xml->createElement("SHOP");
		$xml->appendChild($shop);

		foreach ($allProductsInData as $product){
			
			$shopitem1 = $xml->createElement("SHOPITEM");
			$shop->appendChild($shopitem1);
				
				$item_id = $xml->createElement("ITEM_ID", $product["produc_id"]);
				$shopitem1->appendChild($item_id);

				if (strlen($product["productname"]) !== 0){
					$PRODUCTNAME = $xml->createElement("PRODUCTNAME", $product["productname"]);
					$shopitem1->appendChild($PRODUCTNAME);
				}

				$PRODUCT = $xml->createElement("PRODUCT", $product["product"]);
				$shopitem1->appendChild($PRODUCT);


				if (strlen($product["descript"]) !== 0){
					$descriptione = $shopitem1->appendChild(new DomElement('DESCRIPTION'));
					if (strpos($product["descript"], "&")){
						$text = $descriptione->appendChild(new DOMCdataSection($product["descript"]));}
					else {
						$text = $descriptione->appendChild(new DOMtext($product["descript"]));
					}}

				if (strlen($product["url"]) !== 0){
					$url = $shopitem1->appendChild(new DomElement('URL'));
					$text = $url->appendChild(new DOMCdataSection($product["url"]));
					}

				if (strlen($product["imgurl"]) !== 0){
					$imgurl = $shopitem1->appendChild(new DomElement('IMGURL'));
					if (strpos($product["imgurl"], "&")){
					$text = $imgurl->appendChild(new DOMCdataSection($product["imgurl"]));
					}
					else{
						$text = $imgurl->appendChild(new DOMtext($product["imgurl"]));
					}}	

				if (strlen($product["imgurl_alternative"]) !== 0){
					$IMGURL_ALTERNATIVE = $xml->createElement("IMGURL_ALTERNATIVE", $product["imgurl_alternative"]);
					$shopitem1->appendChild($IMGURL_ALTERNATIVE);}

				if (strlen($product['video_url'])!== 0){
					$VIDEO_URL = $xml->createElement("VIDEO_URL", $product['video_url']);
					$shopitem1->appendChild($VIDEO_URL);
					}

				$PRICE_VAT = $xml->createElement("PRICE_VAT", $product["price_vat"]);
				$shopitem1->appendChild($PRICE_VAT);

				if (((int)$product["cpc_h"])!== 0){
					$HEUREKA_CPC = $xml->createElement("HEUREKA_CPC",$product["cpc_h"]);
					$shopitem1->appendChild($HEUREKA_CPC);
					}

				if (strlen($product["manufacturer"]) !== 0){
					$MANUFACTURER = $shopitem1->appendChild(new DomElement('MANUFACTURER'));
					if (strpos($product["manufacturer"], "&")){
						$text = $MANUFACTURER->appendChild(new DOMCdataSection($product["manufacturer"]));}
					else {
						$text = $MANUFACTURER->appendChild(new DOMtext($product["manufacturer"]));
					}}

				if (strlen($product["categorytext"]) !== 0){
					$CATEGORYTEXT = $shopitem1->appendChild(new DomElement('CATEGORYTEXT'));
					if (strpos($product["categorytext"], "&")){
						$text = $CATEGORYTEXT->appendChild(new DOMCdataSection($product["categorytext"]));}
					else {
						$text = $CATEGORYTEXT->appendChild(new DOMtext($product["categorytext"]));
					}}

				if (strlen($product["ean"]) !== 0){
					$EAN = $xml->createElement("EAN", $product["ean"]);
					$shopitem1->appendChild($EAN);
					}
			
				//$PRODUCTNO = $xml->createElement("PRODUCTNO", 'RM-559394');
				//$shopitem1->appendChild($PRODUCTNO);

				if (array_sum($product['param']) !== 0){
					foreach ($product['param'] as $key => $value) {
						$PARAM = $xml->createElement("PARAM");
						$shopitem1->appendChild($PARAM);

							$PARAM_NAME = $xml->createElement("PARAM_NAME", $key); //key = colour
							$PARAM->appendChild($PARAM_NAME);

							$VAL = $xml->createElement("VAL", $value); //"black"
							$PARAM->appendChild($VAL);
					}
				}

			
				$DELIVERY_DATE = $xml->createElement("DELIVERY_DATE", '2');
				$shopitem1->appendChild($DELIVERY_DATE);

				$DELIVERY = $xml->createElement("DELIVERY");
				$shopitem1->appendChild($DELIVERY);

					$DELIVERY_ID = $xml->createElement("DELIVERY_ID", $product["delivery_ID"]); //'SLOVENSKA_POSTA'
					$DELIVERY->appendChild($DELIVERY_ID);

					$DELIVERY_PRICE = $xml->createElement("DELIVERY_PRICE", $product["delivery_price"]);
					$DELIVERY->appendChild($DELIVERY_PRICE);

					$DELIVERY_PRICE_COD = $xml->createElement("DELIVERY_PRICE_COD", $product["delivery_price_COD"]);
					$DELIVERY->appendChild($DELIVERY_PRICE_COD);


				//$ITEMGROUP_ID = $xml->createElement("ITEMGROUP_ID", 'EF789');
				//$shopitem1->appendChild($ITEMGROUP_ID);

				//$ACCESSORY = $xml->createElement("ACCESSORY", 'CD456');
				//$shopitem1->appendChild($ACCESSORY);

				//$GIFT = $xml->createElement("GIFT", 'Púzdro zadarmo');
				//$shopitem1->appendChild($GIFT);


				//$IMGURL = $xml->createElement("IMGURL", $img);
				//$shopitem1->appendChild($IMGURL);
		}
		echo  "<xmp>". $xml->saveXML()."</xmp>";
	}

}
		


				
		

