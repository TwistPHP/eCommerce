<?php

	Twist::framework()->package()->install();

    //Optional Line: Add this line if you are adding database tables
    Twist::framework()->package()->importSQL(sprintf('%s/Data/install.sql',dirname(__FILE__)));

    /**
     * Setup the page and menu items in the manager
     */
    \Twist::framework()->hooks()->register('TWIST_MANAGER_ROUTE','ecommerce-manager',dirname(__FILE__).'/Hooks/manager.php',true);
    \Twist::framework()->hooks()->register('TWIST_MANAGER_MENU','ecommerce-manager-menu',file_get_contents(dirname(__FILE__).'/Data/manager-menu.json'),true);