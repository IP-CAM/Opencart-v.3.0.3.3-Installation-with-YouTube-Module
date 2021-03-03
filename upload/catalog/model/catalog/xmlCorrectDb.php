<?php
class ModelCatalogXmlCorrectDb extends Model {
	
	public function getXmlCorrectDb() {

		$this->load->model('tool/image');

		function costFormat($x) {
			return number_format($x, 2, '.', '');
		}

		$queryProducts = $this->db->query("SELECT prod.product_id, pd.name as productName, prod.ean, prod.price, prod.cpc_h ,pd.description, prod.manufacturer_id, manuf.name as manufName, (SELECT image FROM " . DB_PREFIX . "product_image prodImg WHERE prodImg.product_id = prod.product_id LIMIT 1) as imageSecond,
		prod.image, (SELECT category_id FROM " . DB_PREFIX . "product_to_category prodToCat WHERE prodToCat.product_id = prod.product_id LIMIT 1) as cat_id,(SELECT name FROM " . DB_PREFIX . "category_description catDesc WHERE catDesc.category_id = cat_id) as cat_name FROM " . DB_PREFIX . "product prod LEFT JOIN " . DB_PREFIX . "product_description pd ON (prod.product_id = pd.product_id AND pd.language_id =" . (int)$this->config->get('config_language_id') .") 
		LEFT JOIN " . DB_PREFIX . "manufacturer manuf ON (prod.manufacturer_id = manuf.manufacturer_id)WHERE prod.price !=0 AND prod.status !=0 ");
		$productsArray = $queryProducts->rows;
		//echo "<pre>";

		$params = $this->db->query("SELECT ad.name as atribute_description_name, ad.attribute_id, att.attribute_group_id, pa.attribute_id, pa.product_id, agd.name as atribute_group_description, pa.text FROM " . DB_PREFIX . "attribute_description ad LEFT JOIN " . DB_PREFIX . "attribute att ON (ad.attribute_id=att.attribute_id) LEFT JOIN " . DB_PREFIX . "product_attribute pa ON(pa.attribute_id=ad.attribute_id) LEFT JOIN " . DB_PREFIX . "attribute_group_description agd ON (agd.attribute_group_id=att.attribute_group_id) WHERE pa.product_id IS NOT NULL ");
		$params = $params->rows;

		$paramMap = array();
		foreach ($params as $param) {

			if (array_key_exists($param["product_id"], $paramMap) == false) {
				if (strpos($param["atribute_description_name"], "test") !== false) {
					$paramMap[$param["product_id"]]= array($param["atribute_group_description"]=>$param["text"]);
				} else {
					$paramMap[$param["product_id"]]= array($param["atribute_description_name"]=>$param["text"]);
				}

			} else {
				if (strpos($param["atribute_description_name"], "test") !==false) {
					$paramMap[$param["product_id"]] += [$param["atribute_group_description"] => $param["text"]];
				} else {
					$paramMap[$param["product_id"]] += [$param["atribute_description_name"] => $param["text"]];
				}
			}
		}

		$correctProductsArray = array();
		foreach ($productsArray as $productForEdit) {

			$productCorrected["ITEM_ID"] = $productForEdit["product_id"];
			$productCorrected["PRODUCTNAME"] = $productForEdit["productName"];
			$productCorrected["PRODUCT"] = $productForEdit["productName"];
			$productCorrected["DESCRIPTION"] = strip_tags(html_entity_decode($productForEdit['description'], ENT_QUOTES, 'UTF-8'));
			$productCorrected["DESCRIPTION"] = html_entity_decode($productCorrected["DESCRIPTION"], ENT_QUOTES, 'UTF-8'); //ak to tam nedam 2x tak v xml vypise don&rsquo;t u product_id=44 
			$productCorrected["DESCRIPTION"] = preg_replace('/\s+/',  ' ', ($productCorrected["DESCRIPTION"]));
			$productCorrected["EAN"] = $productForEdit["ean"];
			if (($productForEdit["cat_id"]) == 0) {
				$productCorrected["URL"] = $this->url->link('product/product', 'path=' .  '&product_id=' . $productForEdit["product_id"]);
			} else {
				$productCorrected["URL"] = $this->url->link('product/product', 'path=' . $productForEdit["cat_id"] . '&product_id=' . $productForEdit["product_id"]);
			}
			$productCorrected["URL"] = str_replace("&amp;", "&", $productCorrected["URL"]);
			if ($productForEdit["image"] !== "") {
				$productCorrected["IMGURL"] = $this->model_tool_image->resize($productForEdit["image"], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height'));
			}
			if ($productForEdit["imageSecond"] !== "") {
				$productCorrected["IMGURL_ALTERNATIVE"] = $this->model_tool_image->resize($productForEdit["imageSecond"], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height'));
			}
			$productCorrected["PRICE_VAT"] = costFormat($productForEdit["price"]);
			if ($productForEdit["cpc_h"] == 0) {
				$productCorrected["HEUREKA_CPC"] = "";
			} else {
				$productCorrected["HEUREKA_CPC"] = costFormat($productForEdit["cpc_h"]);
			}
			$productCorrected["MANUFACTURER"] = str_replace("&amp;", "&", $productForEdit["manufName"]); 
			$productCorrected["CATEGORYTEXT"] = str_replace("&amp;", "&", $productForEdit["cat_name"]);
			if (array_key_exists($productForEdit["product_id"], $paramMap)) {
				$productCorrected["PARAM"] = $paramMap[$productForEdit["product_id"]];
			} else {
				$productCorrected["PARAM"] = "";
			}
			$productCorrected["DELIVERY_DATE"]= "2";

			$deliveryArray = array();
			if ($productForEdit["price"] >= 1000) {
				$deliveryArray["DELIVERY_ID"] = "FREE_SHIPING";
				$deliveryArray["DELIVERY_PRICE"] = 0.00;
			} else {
				$deliveryArray["DELIVERY_ID"] ='SLOVENSKA_POSTA';
				$deliveryArray["DELIVERY_PRICE"] = $this->config->get('shipping_SP_cost');
			}
			$deliveryArray["DELIVERY_PRICE"] = costFormat($deliveryArray["DELIVERY_PRICE"]);
			$deliveryArray["DELIVERY_PRICE_COD"]= $deliveryArray["DELIVERY_PRICE"] ; //cod pre heureku zahrna cenu dopravy vratane sposobu platby. // po dorobeni ceny platby treba dorobit COD
			$productCorrected["delivery"] = $deliveryArray;

			$correctProductsArray[] = $productCorrected;
		}	

		$xml = new DOMDocument("1.0" ,"utf-8");
		$xml ->formatOutput=true;

			$shop = $xml->createElement("SHOP");
			$xml->appendChild($shop);

			foreach ($correctProductsArray as $product) {
						
				$shopItem1 = $xml->createElement("SHOPITEM");
				$shop->appendChild($shopItem1);

				foreach ($product as $key => $value) {

					if ($value != "" and is_array($value) == 0 and $key !="PARAM" and $key !="delivery" ) {
						$InsideProductMainRow = $shopItem1->appendChild($xml->createElement($key));
						if (is_string($value)== 1) {
							if (strpos($value, "&") == true ) {
								$InsideProductMainRow->appendChild($xml->createCDATASection($value));
							}
							else {
								$InsideProductMainRow->appendChild(new DOMtext($value));
					 		}
					 	} else {
								$InsideProductMainRow->appendChild(new DOMtext($value));
						}
					}

					elseif ($key == "PARAM" and is_array($value) == 1) {
						foreach ($value as $keys => $values) {
							$paramsXml = $xml->createElement("PARAM");
							$shopItem1->appendChild($paramsXml);
							$PARAM_NAME = $xml->createElement("PARAM_NAME", $keys); //key = colour
							$paramsXml->appendChild($PARAM_NAME);
							$VAL = $xml->createElement("VAL", $values); //"black"
							$paramsXml->appendChild($VAL);
						}
					}

					elseif ($key == "delivery" and is_array($value) == 1) {
						$deliveryMain = $xml->createElement("DELIVERY");
						$shopItem1->appendChild($deliveryMain);
						foreach ($value as $keyD => $valueD) {
							$deliveryIDXml = $xml->createElement($keyD, $valueD);
							$deliveryMain->appendChild($deliveryIDXml);
						}
					}
				}
			}
		echo  "<xmp>". $xml->saveXML()."</xmp>";
	}
}

