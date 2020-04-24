<?php

	/**
	 * TwistPHP - An open source PHP MVC framework built from the ground up.
	 * Shadow Technologies Ltd.
	 *
	 * This program is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 *
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
	 *
	 * @author     Shadow Technologies Ltd. <contact@shadow-technologies.co.uk>
	 * @license    https://www.gnu.org/licenses/gpl.html GPL License
	 * @link       https://twistphp.com
	 */

	namespace Packages\ecommerce\Controllers;

	use Twist\Core\Controllers\BaseAJAX;

	class AjaxProducts extends BaseAJAX{

		public function addCategory(){

			$blNewTag = false;
			$arrCategory = \Packages\ecommerce\Models\Products::getCategoryByName($_POST['category']);

			if(count($arrCategory)){
				$intCategoryID = $arrCategory['id'];
			}else{
				$intCategoryID = \Packages\ecommerce\Models\Products::addCategory($_POST['category']);
				$blNewTag = true;
			}

			$arrTagData = array(
				'cat_name' => $_POST['category'],
				'id' => $intCategoryID,
				'new' => $blNewTag
			);

			$arrOut = array(
				'cat_id' => $intCategoryID,
				'cats' => \Packages\ecommerce\Models\Products::getCategories(),
				'html' => $this->_view('ecommerce-manager/products/product_cat.tpl',$arrTagData)
			);

			return $this->_ajaxRespond($arrOut);
		}

		public function deleteCategory(){

			//use POST DATA and delete tag
			\Packages\ecommerce\Models\Products::deleteCategory($_POST['category_id']);

			$arrOut = array(
				'cats' => \Packages\ecommerce\Models\Products::getCategories()
			);

			return $this->_ajaxRespond($arrOut);
		}

		public function addTag(){
			$blNewTag = false;
			$arrTag = \Packages\ecommerce\Models\Products::getTagByName($_POST['tag']);
			if(count($arrTag)){
				$intTagID = $arrTag['id'];
			} else {
				$intTagID = \Packages\ecommerce\Models\Products::addTag($_POST['tag']);
				$blNewTag = true;
			}

			//use POST DATA and store tag
			$arrPTagData = array(
				'tag_name' => $_POST['tag'],
				'id' => $intTagID,
				'new' => $blNewTag
			);

			$arrOut = array(
				'tag_id' => $intTagID,
				'tags' => \Packages\ecommerce\Models\Products::getTags(),
				'html' => $this->_view('ecommerce-manager/products/product_tag.tpl',$arrPTagData)
			);

			return $this->_ajaxRespond($arrOut);
		}

		public function deleteTag(){

			//use POST DATA and delete tag
			\Packages\ecommerce\Models\Products::deleteTag($_POST['tag_id']);

			$arrOut = array(
				'tags' => \Packages\ecommerce\Models\Products::getTags()
			);

			return $this->_ajaxRespond($arrOut);
		}

		/**
		 * Override the default view function to append the users view path when required
		 * We do this rather than reset the view path as it has to work alongside the Manager which already has a view path set
		 * @param $dirView
		 * @param null $arrViewTags
		 * @param bool $blRemoveUnusedTags
		 * @return string
		 */
		protected function _view($dirView,$arrViewTags = null,$blRemoveUnusedTags = false){

			if(!file_exists($dirView) && substr($dirView,0,1) != '/' && substr($dirView,0,2) != './' && substr($dirView,0,3) != '../'){
				$dirView = ECOMMERCE_VIEWS.'/'.$dirView;
			}

			return parent::_view($dirView,$arrViewTags,$blRemoveUnusedTags);
		}

	}