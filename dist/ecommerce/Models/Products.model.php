<?php

	namespace Packages\ecommerce\Models;

	class Products{

		public static function getTags(){

		}

		public static function getCategoryByName($strCategoryName){
			return \Twist::Database()->records('twist_product_cat')->get($strCategoryName,'cat_name',true);
		}

		public static function getCategories(){
			return \Twist::Database()->records('twist_product_cat')->all();
		}

		public static function addCategory($strCategoryName){
			$resCat = \Twist::Database()->records('twist_product_cat')->create();
			$resCat->set('cat_name',$strCategoryName);
			return $resCat->commit();
		}

		public static function deleteCategory($intCategoryID){
			return \Twist::Database()->records('twist_product_cat')->delete($intCategoryID,'id');
		}
	}