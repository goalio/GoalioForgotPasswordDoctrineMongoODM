<?php

namespace GoalioForgotPasswordDoctrineMongoODM\Factory\Mapper;

use GoalioForgotPasswordDoctrineMongoODM\Mapper\Password;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class PasswordMapperFactory
 * @package GoalioForgotPasswordDoctrineMongoODM\Factory\Options
 * @author Marcel Djaman <marceldjaman@gmail.com>
 */
class PasswordMapperFactory implements FactoryInterface
{
    /**
     * Creates an instance of Password
     * @param ServiceLocatorInterface $sl
     * @return Password
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $om = $sl->get('goalioforgotpassword_doctrine_dm');
        $moduleOptions = $sl->get('goalioforgotpassword_module_options');
        return new Password($om, $moduleOptions);
    }
}