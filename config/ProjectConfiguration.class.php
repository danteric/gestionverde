<?php

define('ENV', 'local');
define('PROJECT_PATH', realpath(dirname(__FILE__).'/../'));

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();
require_once dirname(__FILE__).'/../lib/vendor/autoload.php';

class ProjectConfiguration extends sfProjectConfiguration
{
    public function setup()
    {
        $this->enableAllPluginsExcept('sfPropelPlugin');
        $configurations  =  sfYaml::load(__DIR__.'/config.yml');
		if(isset($_GET['verconexion'])){
		echo "<pre>";	var_dump($configurations);exit;
		}
        $config          = $configurations[ENV];
        foreach ($config as $key => $value) {
            sfConfig::set($key, $value);
        }
        //autoload PDF
        set_include_path(sprintf('%s%s%s%s%s%s%s', 
            get_include_path(), 
            PATH_SEPARATOR,
            realpath(__DIR__.'/../lib/vendor/fpdf'),
            PATH_SEPARATOR,
            realpath(__DIR__.'/../lib/vendor/fpdi'),
            PATH_SEPARATOR,
            realpath(__DIR__.'/../lib/vendor/html2pdf')
            ));
    }
}
