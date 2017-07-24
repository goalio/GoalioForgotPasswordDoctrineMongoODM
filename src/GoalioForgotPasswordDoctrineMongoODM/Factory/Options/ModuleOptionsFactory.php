<?php

namespace GoalioForgotPasswordDoctrineMongoODM\Factory\Options;

use GoalioForgotPasswordDoctrineMongoODM\Options\ModuleOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ModuleOptionsFactory
 * @package GoalioForgotPasswordDoctrineMongoODM\Factory\Options
 * @author Marcel Djaman <marceldjaman@gmail.com>
 */
class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * Creates an instance of ModuleOptions
     * @param ServiceLocatorInterface $sl
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $config = $sl->get('Config');
        return new ModuleOptions(isset($config['goalioforgotpassword']) ? $config['goalioforgotpassword'] : []);
    }
}