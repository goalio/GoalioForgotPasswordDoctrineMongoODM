<?php

namespace GoalioForgotPasswordDoctrineMongoODM;

return array(
    'service_manager' => array(
        'aliases' => array(
            'goalioforgotpassword_doctrine_dm' => 'doctrine.documentmanager.odm_default',

        ),
        'factories' => array(
            'goalioforgotpassword_module_options' => Factory\Options\ModuleOptionsFactory::class,
            'goalioforgotpassword_password_mapper' => Factory\Mapper\PasswordMapperFactory::class,
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'goalioforgotpassword_document' => array(
                'class' => 'Doctrine\ODM\MongoDB\Mapping\Driver\XmlDriver',
                'paths' => __DIR__ . '/xml'
            ),

            'odm_default' => array(
                'drivers' => array(
                    'GoalioForgotPassword\Document'  => 'goalioforgotpassword_document'
                )
            )
        )
    ),
);
