<?php
/**
 * @namespace
 */
namespace ReverseUniForm;

use Zend\Module\Manager,
    Zend\Config\Config,
    Zend\Loader\AutoloaderFactory;

use ReverseUniForm\UniForm;

class Module
{
    /**
     * Initiate the module.
     * 
     * @param  Manager $moduleManager 
     * @return void
     */
    public function init(Manager $moduleManager)
    {
        $this->initAutoloader();
		
		$cf = $this->getConfig();
		
		UniForm::$_config = $cf->uniform;
		
		
    }

    /**
     * Initiate the autoloder.
     * 
     * @return void
     */
    protected function initAutoloader()
    {
        AutoloaderFactory::factory(array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        ));
    }
	
	public function getConfig($env = null)
    {
        return new Config(include __DIR__ . '/configs/module.config.php');
    }
	
}