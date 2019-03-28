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
        return $this->_view('ecommerce-manager/products/create.tpl');
    }
    public function POSTcreate(){

        $this->_required('product-name','string');
        $this->_required('product-description','string');
        $this->_required('product-price','integer');
        $this->_required('product-quantity','string');
        $this->_required('stock-availability','string');
        $this->_required('shipping-cost', 'integer');

        if ($this->_check()){

            $intAssetID = array_pop(json_decode($_POST['product_image'],true));

            $resProducts = \Twist::Database()->records('twist_products')->create();
            $resProducts->set('sku',$_POST['product-sku']);
            $resProducts->set('name',$_POST['product-name']);
            $resProducts->set('description',$_POST['product-description']);
            $resProducts->set('short_description',$_POST['product-description']);
            $resProducts->set('category',$_POST['product-category']);
            $resProducts->set('tag',$_POST['product-tags']);
            $resProducts->set('image',$intAssetID);
            $resProducts->set('price',$_POST['product-price']);
            //$resProducts->set('attributes','');
            $resProducts->set('quantity',$_POST['product-quantity']);
            $resProducts->set('availability',$_POST['stock-availability']);
            $resProducts->set('length',$_POST['product-length']);
            $resProducts->set('width',$_POST['product-width']);
            $resProducts->set('height',$_POST['product-height']);
            $resProducts->set('shipping_cost',$_POST['shipping-cost']);

            $resProductsRecord = $resProducts->commit();

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