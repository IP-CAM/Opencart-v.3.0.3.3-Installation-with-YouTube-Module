<?php
class ModelCatalogCategory extends Model {
	public function getCategory($category_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.category_id = '" . (int)$category_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1'");
//my code 
//$results = $query->row;
//echo "<pre>";
//print_r($results);

		return $query->row;
	}

	public function getCategories($parent_id = 0) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . 
			"category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "'  AND c.status = '1' ORDER BY c.sort_order, LCASE(cd.name)");

		return $query->rows;
	}


//my code
	public function getCategories2($parent_id = 0) {
		$query = $this->db->query("SELECT p.price, p.product_id,  ptc.category_id FROM " . DB_PREFIX .
		 "product p LEFT JOIN " . DB_PREFIX . 
		"product_to_category ptc ON (p.product_id = ptc.product_id)");

		//	tu zistujes cat_id_list
		$query2 = $this->db->query("SELECT DISTINCT ptc.category_id FROM " . DB_PREFIX .
		 "product p LEFT JOIN " . DB_PREFIX . 
		"product_to_category ptc ON (p.product_id = ptc.product_id)");
		
		$rows = $query2->rows;
		$cat_id_list = array();
		foreach ($rows as $riadok){
			$cat_id = $riadok["category_id"];
			array_push($cat_id_list, $cat_id);
		}; 
		//return all product in category 
		$all_products = $query->rows;
		$all_low_price_products = array();
		$all_low_price_products_id = array();
		foreach ($cat_id_list as $cat_id2){
			$all_cat_products = array();
			$price_list = array();
			foreach ($all_products as $product2){
					if($product2["category_id"]== $cat_id2)
					{
					array_push($all_cat_products,$product2);
					array_push($price_list, $product2["price"]);
					}
					else{}
			};
			foreach ($all_cat_products as $product3){
				if ($product3["price"] == min($price_list)){
					array_push($all_low_price_products, $product3);
					array_push($all_low_price_products_id, $product3["product_id"]);
					break;
				}
			};
		};
		//return $all_low_price_products_id;
		$all_low_price_products1 = array();
		foreach ($all_low_price_products_id as $product_id3){
				$query3 = $this->db->query("SELECT * FROM " . DB_PREFIX . "product WHERE (product_id = $product_id3)");
				array_push($all_low_price_products1, $query3->rows);
		}
		
		$id_list= array();
		foreach ($all_low_price_products_id as $id){
			if (in_array($id, $id_list)){}
			else{array_push($id_list, $id);}
		}

		//echo "<pre>";
		//print_r($id_list);

		//tu ti to vyjebe id v zozname $id_list

		$query5 = $this->db->query("SELECT * FROM " . DB_PREFIX .
				 "product p LEFT JOIN " . DB_PREFIX . 
				"product_to_category ptc ON (p.product_id = ptc.product_id) WHERE p.product_id = 28");

		//$results = $query5->row;


		$results = array();
		foreach ($id_list as $product_id){
				$query6 = $this->db->query("SELECT * FROM " . DB_PREFIX .
						 "product p LEFT JOIN " . DB_PREFIX . 
						"product_to_category ptc ON (p.product_id = ptc.product_id) WHERE p.product_id =  '" . (int)$product_id . "'");
				$query6s = $query6->row;
				// najdi dalsie parametre ktore potrebujes.. 
				$query7 = $this->db->query("SELECT * FROM " . DB_PREFIX .
						 "product_description WHERE product_id =  '" . (int)$product_id . "'");
				$query7s = $query7->row;
				// for special 
				$spec = $this->db->query("SELECT price FROM " . DB_PREFIX .
						 "product_special WHERE product_id =  '" . (int)$product_id . "'");
				$special = $spec->row;
				if ((float)$special == 0){$special = false;}
				else {$special = $special['price'];}

				//$selected = array("a"=>"purple","b"=>"orange");
				$selected = array("product_id"=>$query6s["product_id"],"image"=>$query6s["image"],"name"=>$query7s["name"],"description"=>$query7s["description"],"price"=>$query6s["price"], "special"=>$special, "tax_class_id"=>$query6s["tax_class_id"], "minimum"=>$query6s["minimum"],"rating"=>"0",);
				array_push($results, $selected);
			}


		//echo "<pre>";
		//print_r( $selected);
		//print_r( $results);
		//print_r( $query6s);
		//id list 
		//print_r( $id_list);
		//print_r($query6s["product_id"]);


		//print_r($data);
		return($results);

	}

	public function getCategoryFilters($category_id) {
		$implode = array();

		$query = $this->db->query("SELECT filter_id FROM " . DB_PREFIX . "category_filter WHERE category_id = '" . (int)$category_id . "'");

		foreach ($query->rows as $result) {
			$implode[] = (int)$result['filter_id'];
		}

		$filter_group_data = array();

		if ($implode) {
			$filter_group_query = $this->db->query("SELECT DISTINCT f.filter_group_id, fgd.name, fg.sort_order FROM " . DB_PREFIX . "filter f LEFT JOIN " . DB_PREFIX . "filter_group fg ON (f.filter_group_id = fg.filter_group_id) LEFT JOIN " . DB_PREFIX . "filter_group_description fgd ON (fg.filter_group_id = fgd.filter_group_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND fgd.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY f.filter_group_id ORDER BY fg.sort_order, LCASE(fgd.name)");

			foreach ($filter_group_query->rows as $filter_group) {
				$filter_data = array();

				$filter_query = $this->db->query("SELECT DISTINCT f.filter_id, fd.name FROM " . DB_PREFIX . "filter f LEFT JOIN " . DB_PREFIX . "filter_description fd ON (f.filter_id = fd.filter_id) WHERE f.filter_id IN (" . implode(',', $implode) . ") AND f.filter_group_id = '" . (int)$filter_group['filter_group_id'] . "' AND fd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY f.sort_order, LCASE(fd.name)");

				foreach ($filter_query->rows as $filter) {
					$filter_data[] = array(
						'filter_id' => $filter['filter_id'],
						'name'      => $filter['name']
					);
				}

				if ($filter_data) {
					$filter_group_data[] = array(
						'filter_group_id' => $filter_group['filter_group_id'],
						'name'            => $filter_group['name'],
						'filter'          => $filter_data
					);
				}
			}
		}

		return $filter_group_data;
	}

	public function getCategoryLayoutId($category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category_to_layout WHERE category_id = '" . (int)$category_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return (int)$query->row['layout_id'];
		} else {
			return 0;
		}
	}

	public function getTotalCategoriesByCategoryId($parent_id = 0) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1'");

		return $query->row['total'];
	}
}