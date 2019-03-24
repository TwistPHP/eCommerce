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