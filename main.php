<?php
namespace xeki_modules\config;
require_once dirname(__FILE__) . "/core/core.php";

class main
{
    public static $objectModule = null;
    public $config = array();

    function init($config)
    {
        $this->config = $config;
        return true;
    }

    function getObject()
    {
        if (self::$objectModule == null) {
            self::$objectModule = new config( $this->config);
        }
        return self::$objectModule;
    }

    function check()
    {
        return true;
    }
}