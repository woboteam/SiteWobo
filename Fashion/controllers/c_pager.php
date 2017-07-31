<?php
class pager
{
	function findStart($limit)
	{
		if ((!isset($_GET['page'])) || ($_GET['page'] == "1"))
		{
			$start = 0;
			$_GET['page'] = 1;
		}
		else
		{
			$start = ($_GET['page']-1) * $limit;
		}
		
		return $start;
	}
	function findPages($count, $limit)
	{
		$pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;
		return $pages;
	}
	function pageList($pathweb, $curpage, $pages, $url)
	{
		$page_list="<ul class='cd-pagination no-space animated-buttons custom-icons'>";
			
		$vtdau=max($curpage-2,1);
		$vtcuoi=min($curpage+1,$pages);
		if(($curpage-1)>0){
			$page_list.="<li class=\"button btn-prev\"><a href =\"".$pathweb.$url."/page-".($curpage-1)."\" title=\"Về trang trước\"><i>Prev</i></a></li>";
		}
		for($i=$vtdau;$i<=$vtcuoi;$i++)
		{
			if($i==$curpage)
			{
				$page_list.='<li class="current"><a>'.$i."</a></li>";
			}
			else
			{
				$page_list.='<li>'."<a href ='".$pathweb.$url."/page-".$i."' title='Trang ".$i."'>".$i."</a></li>";
			}
		}
		
		if(($curpage+1)<=$pages)
		{
			$page_list.="<li class=\"button btn-next\"><a href =\"".$pathweb.$url."/page-".($curpage+1)."\" title=\"Đến trang sau\"><i>Next</i></a></li>";
			
		}
		$page_list .="</ul>";
		return $page_list;
	}
	
	function pageListPara($pathweb,$curpage, $pages, $dk1, $dk2)
	{
		$page_list="<ul class='cd-pagination no-space animated-buttons custom-icons'>";
			
		$vtdau=max($curpage-2,1);
		$vtcuoi=min($curpage+1,$pages);
		if(($curpage-1)>0){
			$page_list.="<li class=\"button btn-prev\"><a href =\"".$pathweb."categories/".$dk1."-".$dk2."/page-".($curpage-1)."\" title=\"Về trang trước\"><i>Prev</i></a></li>";
		}
		for($i=$vtdau;$i<=$vtcuoi;$i++)
		{
			if($i==$curpage)
			{
				$page_list.='<li class="current"><a>'.$i."</a></li>";
			}
			else
			{
				$page_list.='<li>'."<a href ='".$pathweb."categories/".$dk1."-".$dk2."/page-".$i."' title='Trang ".$i."'>".$i."</a></li>";
			}
		}
		
		
		if(($curpage+1)<=$pages)
		{
			$page_list.="<li class=\"button btn-next\"><a href =\"".$pathweb."categories/".$dk1."-".$dk2."/page-".($curpage+1)."\" title=\"Đến trang sau\"><i>Next</i></a></li>";
		}
		$page_list .="</ul>";
		return $page_list;
	}

	function nextPrev($curpage,$pages)//chỉ hiển thị 2 nút Truoc và Sau
		{
			$next_prev="";
			if(($curpage-1)<=0)
			{
				$next_prev.="Về trang trước";
			}
			else
			{
				$next_prev.="<a href =\"".$pathweb."?page=".($curpage-1)."\">Về trang trước</a>";
			}
			$next_prev.=" | ";
			if(($curpage+1)>$pages)
			{
				$next_prev.="Đến trang sau";
			}
			else
			{
				$next_prev.="<a href =\"".$pathweb."?page=".($curpage+1)."\">Đến trang sau</a>";
			}
			return $next_prev;
		}
		function nextPrevCo($curpage,$pages,$field,$condition)//chỉ hiển thị 2 nút Truoc và Sau
		{
			$next_prev="";
			if(($curpage-1)<=0)
			{
				$next_prev.="Về trang trước";
			}
			else
			{
				$next_prev.="<a href =\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."&".$field."=".$condition."\">Về trang trước</a>";
			}
			$next_prev.=" | ";
			if(($curpage+1)>$pages)
			{
				$next_prev.="Đến trang sau";
			}
			else
			{
				$next_prev.="<a href =\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."&".$field."=".$condition."\">Đến trang sau</a>";
			}
			return $next_prev;
		}
}
?>