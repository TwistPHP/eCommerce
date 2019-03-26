<?php

	Twist::framework()->package()->install();

    //Optional Line: Add this line if you are adding database tables
    Twist::framework()->package()->importSQL(sprintf('%s/Data/install.sql',dirname(__FILE__)));

    /**
     * Include Package CSS & JS Files
     */
    \Twist::framework()->hooks()->register('TWIST_MANAGER_CSS','ecommerce-manager',array('/packages/ecommerce/Resources/css/ecommerce.css'),true);
    \Twist::framework()->hooks()->register('TWIST_MANAGER_JS','ecommerce-manager',array('/packages/ecommerce/Resources/js/ecommerce.js'),true);

    /**
     * Setup the page and menu items in the manager
     */
    \Twist::framework()->hooks()->register('TWIST_MANAGER_ROUTE','ecommerce-manager',dirname(__FILE__).'/Hooks/manager.php',true);
    \Twist::framework()->hooks()->register('TWIST_MANAGER_MENU','ecommerce-manager-menu',file_get_contents(dirname(__FILE__).'/Data/manager-menu.json'),true);

    \Twist::framework()->hooks()->register('TWIST_VIEW_TAG','ecommerce',array(
        'class' => 'Packages\ecommerce\Models\Tags',
        'function' => 'process'
    ),true);
