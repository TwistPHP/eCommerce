<?php

	namespace Packages\ecommerce\Models;

	class Products{

		public static function getProducts(){
			return \Twist::Database()->records('twist_products')->all();
		}

		public static function create($strSKU, $stName, $strDescription, $strShortDescription, $intAssetID, $fltPrice, $intQuantity, $intStockAvailability,$intLength,$intWidth,$intHeight,$fltShippingCost){

			$resProducts = \Twist::Database()->records('twist_products')->create();

			$resProducts->set('sku',$strSKU);
			$resProducts->set('name',$stName);
			$resProducts->set('description',$strDescription);
			$resProducts->set('short_description',$strShortDescription);
			$resProducts->set('image',$intAssetID);
			$resProducts->set('price',$fltPrice);
			$resProducts->set('quantity',$intQuantity);
			$resProducts->set('availability',$intStockAvailability);
			$resProducts->set('length',$intLength);
			$resProducts->set('width',$intWidth);
			$resProducts->set('height',$intHeight);
			$resProducts->set('shipping_cost',$fltShippingCost);

			$intProductID = $resProducts->commit();
			return $intProductID;
		}

		public static function linkCategory($intProductID,$intCategoryID){
			$resLink = \Twist::Database()->records('twist_product_cat_link')->create();
			$resLink->set('product_id',$intProductID);
			$resLink->set('cat_id',$intCategoryID);
			return $resLink->commit();
		}

		public static function linkedCategories($intProductID){
			return \Twist::Database()->records('twist_product_cat_link')->find($intProductID,'product_id');
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

		public static function linkTag($intProductID,$intTagID){
			$resLink = \Twist::Database()->records('twist_product_tag_link')->create();
			$resLink->set('product_id',$intProductID);
			$resLink->set('tag_id',$intTagID);
			return $resLink->commit();
		}

		public static function linkedTags($intProductID){
			return \Twist::Database()->records('twist_product_tag_link')->find($intProductID,'product_id');
		}

		public static function getTagByName($strTagName){
			return \Twist::Database()->records('twist_product_tag')->get($strTagName,'tag_name',true);
		}

		public static function getTags(){
			return \Twist::Database()->records('twist_product_tag')->all();
		}

		public static function addTag($strTagName){
			$resTag = \Twist::Database()->records('twist_product_tag')->create();
			$resTag->set('tag_name',$strTagName);
			return $resTag->commit();
		}

		public static function deleteTag($intTagID){
			return \Twist::Database()->records('twist_product_tag')->delete($intTagID,'id');
		}
	}