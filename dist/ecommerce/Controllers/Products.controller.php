<?php

namespace Packages\ecommerce\Controllers;

/**
 * Class Manager Controller
 * @package Packages\ecommerce\Controllers
 */
class Products extends \Twist\Core\Controllers\Base{

    /**
     * Display Ecommerce Products
     * @return bool|string
     */
    public function _index(){
        return $this->_view('ecommerce-manager/products/view.tpl');
    }
    public function create(){
        $arrTags = array('categories' => '' , 'tags' => '');

        $arrProductCats = \Packages\ecommerce\Models\Products::getCategories();
		$arrTags['categories_json'] = json_encode($arrProductCats);

		//Output all the currently linked categories, this will be needed on the edit page
		//$arrProductLinkedCats = \Packages\ecommerce\Models\Products::linkedCategories($intProductID);

        $arrProductTags = \Twist::Database()->records('twist_product_tag')->all();

        foreach ($arrProductCats as $arrEachProductCats){
            $arrTags['categories'] .= $this->_view('ecommerce-manager/products/product_cat.tpl', $arrEachProductCats);
        }
        foreach ($arrProductTags as $arrEachProductTags){
            $arrTags['tags'] .= $this->_view('ecommerce-manager/products/product_tag.tpl',$arrEachProductTags);
            $jsonTagResults = json_encode($arrEachProductTags);
        }

        if (array_key_exists('delete-cat', $_GET)){
            \Packages\ecommerce\Models\Products::deleteCategory($_GET['delete-cat']);
            \Twist::redirect('/manager/twist_ecommerce/products/create');
        }
        if (array_key_exists('delete-tag', $_GET)){
            \Twist::Database()->records('twist_product_tag')->delete($_GET['delete-tag'],'id');
            \Twist::redirect('/manager/twist_ecommerce/products/create');
        }

        return $this->_view('ecommerce-manager/products/create.tpl',$arrTags);
    }
    public function POSTcreate(){

    	print_r($_POST);
    	die();

        $this->_required('product-name','string');
        $this->_required('product-description','string');
        $this->_required('product-price','integer');
        $this->_required('product-quantity','string');
        $this->_required('stock-availability','string');
        $this->_required('shipping-cost', 'integer');

        if ($this->_check()){

        	$intProductID = \Packages\ecommerce\Models\Products::create(
        		$_POST['product-sku'],
				$_POST['product-name'],
				$_POST['product-description'],
				$_POST['product-description'],
				$intAssetID,
				$_POST['product-price'],
				$_POST['product-quantity'],
				$_POST['stock-availability'],
				$_POST['product-length'],
				$_POST['product-width'],
				$_POST['product-height'],
				$_POST['shipping-cost']
				);

        	foreach($_POST['category'] as $intCategoryID){
				\Packages\ecommerce\Models\Products::linkCategory($intProductID,$intCategoryID);
			}

        } else {
            return $this->create();
        }
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