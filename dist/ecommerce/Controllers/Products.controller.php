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

    	$arrTags = array('products' => '');
    	$arrProducts = \Packages\ecommerce\Models\Products::getProducts();
    	rsort($arrProducts);

    	foreach($arrProducts as $arrProduct){
    		$arrFeatured = \Twist::Asset()->get($arrProduct['image']);
    		$arrPublishDate = date('d F Y H:i:s',strtotime($arrProduct['created']));

		    $arrProduct['featured_asset'] = $arrFeatured['support']['thumb-64'];
		    $arrProduct['published_t_d'] = $arrPublishDate;

    		$arrTags['products'] .= $this->_view('ecommerce-manager/products/product_view_each.tpl',$arrProduct);
	    }

        return $this->_view('ecommerce-manager/products/view.tpl', $arrTags);
    }
    public function create(){
        $arrTags = array('categories' => '' , 'tags' => '');

        $arrProductCats = \Packages\ecommerce\Models\Products::getCategories();
		$arrTags['categories_json'] = json_encode($arrProductCats);

		$arrProductTags = \Packages\ecommerce\Models\Products::getTags();
		$arrTags['tags_json'] = json_encode($arrProductTags);

        $arrProductTags = \Twist::Database()->records('twist_product_tag')->all();

        foreach ($arrProductCats as $arrEachProductCats){
            $arrTags['categories'] .= $this->_view('ecommerce-manager/products/product_cat_suggest.tpl', $arrEachProductCats);
        }
        foreach ($arrProductTags as $arrEachProductTags){
            $arrTags['tags'] .= $this->_view('ecommerce-manager/products/product_tag_suggest.tpl',$arrEachProductTags);
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

            $intAssetID = array_pop(json_decode($_POST['product_image'],true));
	        $arrCats = json_encode($_POST['category']);
	        $arrTags = json_encode($_POST['tag']);

            $resProducts = \Twist::Database()->records('twist_products')->create();
            $resProducts->set('sku',$_POST['product-sku']);
            $resProducts->set('name',$_POST['product-name']);
            $resProducts->set('description',$_POST['product-description']);
            $resProducts->set('short_description',$_POST['product-short']);
            $resProducts->set('category',$arrCats);
            $resProducts->set('tag',$arrTags);
            $resProducts->set('image',$intAssetID);
            $resProducts->set('gallery',$_POST['product_gallery']);
            $resProducts->set('price',$_POST['product-price']);
            //$resProducts->set('attributes','');
            $resProducts->set('quantity',$_POST['product-quantity']);
            $resProducts->set('availability',$_POST['stock-availability']);
            $resProducts->set('depth',$_POST['product-depth']);
            $resProducts->set('width',$_POST['product-width']);
            $resProducts->set('height',$_POST['product-height']);
            $resProducts->set('shipping_cost',$_POST['shipping-cost']);
            $resProducts->set('created',\Twist::DateTime()->date('Y-m-d H:i:s'));

            $resProductsRecord = $resProducts->commit();

	        \Twist::redirect("/manager/twist_ecommerce/products/");
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