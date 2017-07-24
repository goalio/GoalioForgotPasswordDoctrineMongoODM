<?php

namespace GoalioForgotPasswordDoctrineMongoODM;

use Doctrine\ODM\MongoDB\Mapping\Driver\XmlDriver;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Class Module
 * @package GoalioForgotPasswordDoctrineMongoODM
 * @author Marcel Djaman <marceldjaman@gmail.com>
 */
class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    BootstrapListenerInterface
{
    /**
     * @param EventInterface $e
     */
    public function onBootstrap(EventInterface $e)
    {
        $app     = $e->getParam('application');
        $sm      = $app->getServiceManager();
        $options = $sm->get('goalioforgotpassword_module_options');

        // Add the default entity driver only if specified in configuration
        if ($options->getEnableDefaultEntities()) {
            $chain = $sm->get('doctrine.driver.odm_default');
            $chain->addDriver(new XmlDriver(__DIR__ . '/config/xml'), 'GoalioForgotPasswordDoctrineMongoODM\Document');
        }
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
