<?php

$pluginRoot = dirname( dirname(__FILE__) );

App::uses('DataSource', 'Model/Datasource');
App::uses('HttpSocket', 'Network/Http');


require_once $pluginRoot.DS.'Config'.DS.'PaypalIpnConfig.php';
require_once $pluginRoot.DS.'Model'.DS.'Datasource'.DS.'PaypalIpnSource.php';