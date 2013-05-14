<?php
return array(
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
