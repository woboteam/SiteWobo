<?php
include_once("database.php");
/**
* Sản phẩm (products): 
*/
class M_product extends database
{
	
	public function get_all_product($vt=-1,$limit=-1,$cate_id=-1){
		$query = "SELECT * FROM products INNER JOIN kind ON products.pro_kind = kind.kind_id WHERE pro_status=0";
		if ($cate_id!=-1){
			$query .= " AND cate_id=".$cate_id;
		}
		$query .= " ORDER BY pro_create DESC";
		if ($vt!=-1){
			$query .= " LIMIT $vt,$limit";
		}
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_all_product_by_list_cate_id($vt=-1,$limit=-1,$list_cate_id=-1){
		$query = "SELECT * FROM products INNER JOIN kind ON products.pro_kind=kind.kind_id WHERE pro_status=0";
		if ($list_cate_id!=-1){
			$query .= " AND cate_id IN (".$list_cate_id . ")";
		}
		$query .= " ORDER BY pro_create DESC";
		if ($vt!=-1){
			$query .= " LIMIT $vt,$limit";
		}
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_all_product_by_list_cate_id_order_view($vt=-1,$limit=-1,$list_cate_id=-1){
		$query = "SELECT * FROM products INNER JOIN kind ON products.pro_kind=kind.kind_id WHERE pro_status=0";
		if ($list_cate_id!=-1){
			$query .= " AND cate_id IN (".$list_cate_id . ")";
		}
		$query .= " ORDER BY pro_view DESC";
		if ($vt!=-1){
			$query .= " LIMIT $vt,$limit";
		}
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_all_product_order_view($vt=-1,$limit=-1){
		$query = "SELECT * FROM products INNER JOIN kind ON products.pro_kind=kind.kind_id WHERE pro_status=0";
		$query .= " ORDER BY pro_view DESC";
		if ($vt!=-1){
			$query .= " LIMIT $vt,$limit";
		}
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	
	public function get_all_product_by_list_cate_id_order_date($vt=-1,$limit=-1,$list_cate_id=-1){
		$query = "SELECT * FROM products INNER JOIN kind ON products.pro_kind=kind.kind_id WHERE pro_status=0";
		if ($list_cate_id!=-1){
			$query .= " AND cate_id IN (".$list_cate_id . ")";
		}
		$query .= " ORDER BY pro_create DESC";
		if ($vt!=-1){
			$query .= " LIMIT $vt,$limit";
		}
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_all_product_order_date($vt=-1,$limit=-1){
		$query = "SELECT * FROM products INNER JOIN kind ON products.pro_kind=kind.kind_id WHERE pro_status=0";
		$query .= " ORDER BY pro_create DESC";
		if ($vt!=-1){
			$query .= " LIMIT $vt,$limit";
		}
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_product_by_slug($pro_slug){
		$query = "SELECT * FROM products WHERE pro_slug=?";
		$this->setQuery($query);
		return $this->loadRow(array($pro_slug));
	}
	public function get_product_by_id($pro_id){
		$query = "SELECT * FROM products INNER JOIN kind ON products.pro_kind=kind.kind_id WHERE pro_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($pro_id));
	}
	public function get_random($vt=-1,$limit=-1,$cate_id=-1){
		$query = "SELECT * FROM (products INNER JOIN categories ON categories.cate_id = products.cate_id) INNER JOIN kind ON products.pro_kind=kind.kind_id WHERE pro_status=0";
		if ($cate_id!=-1){
			$query .= " AND products.cate_id=".$cate_id;
		}
		$query .= " ORDER BY RAND()";
		if ($vt!=-1){
			$query .= " LIMIT $vt,$limit";
		}
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_search($list_cate, $datego, $dateoff=0, $kind=0, $vt=-1,$limit=-1){
		$query = "SELECT * FROM products INNER JOIN kind ON products.pro_kind=kind.kind_id WHERE cate_id in (".$list_cate.") AND pro_id not in (SELECT pro_id FROM orderdetail WHERE 1 AND ";
		if ($dateoff!=0){
			$query .= " (datego>='".$datego."' and datego<='".$dateoff."') or (dateoff>='".$datego."' and dateoff<='".$dateoff."'))";
		} else {
			$query .= " (datego>'".$datego."' and datego<'".$datego."') or (dateoff>'".$datego."' and dateoff<'".$datego."'))";
		}
		if ($kind!=0){
			$query .= " AND pro_kind='".$kind."'";
		}
		if ($vt!=-1){
			$query .= " LIMIT $vt,$limit";
		}
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function addview($pro_id){
		$query = "UPDATE products SET pro_view=pro_view+1 WHERE pro_id=?";
		$this->setQuery($query);
		return $this->execute(array($pro_id));
	}
}
?>