<?php

    \Twist::define('ECOMMERCE_VIEWS',dirname(__FILE__).'/../Views');

    $this -> controller( '/twist_ecommerce/%', 'Packages\ecommerce\Controllers\Manager' );
    $this -> controller( '/twist_ecommerce/orders/%', 'Packages\ecommerce\Controllers\Orders');
    $this -> controller( '/twist_ecommerce/products/%', 'Packages\ecommerce\Controllers\Products');
    $this -> controller( '/twist_ecommerce/settings/%', 'Packages\ecommerce\Controllers\Settings');