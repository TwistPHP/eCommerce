<?php

    \Twist::define('ECOMMERCE_VIEWS',dirname(__FILE__).'/../Views');

    $this -> controller( '/twist_ecommerce/%', 'Packages\ecommerce\Controllers\Manager' );