<?php


	Twist::framework()->package()->uninstall();

    //Optional Line: Add this line if you are uninstalling database tables
    Twist::framework()->package()->importSQL(sprintf('%s/Data/uninstall.sql',dirname(__FILE__)));

	//Optional Line: Add this line if you are removing all package settings
	Twist::framework()->package()->removeSettings();

    /**
     * Remove all User Package Hooks for the system
     */
    \Twist::framework()->hooks()->cancel('TWIST_MANAGER_CSS','ecommerce-manager',true);
    \Twist::framework()->hooks()->cancel('TWIST_MANAGER_JS','ecommerce-manager',true);
    \Twist::framework()->hooks()->cancel('TWIST_MANAGER_ROUTE','ecommerce-manager',true);
    \Twist::framework()->hooks()->cancel('TWIST_MANAGER_MENU','ecommerce-manager-menu',true);
    \Twist::framework()->hooks()->cancel('TWIST_VIEW_TAG','ecommerce',true);
