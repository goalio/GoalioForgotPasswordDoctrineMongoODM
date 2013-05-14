<?php

namespace GoalioForgotPasswordDoctrineMongoODM\Mapper;

use Doctrine\ODM\MongoDB\DocumentManager;
use GoalioForgotPassword\Mapper\Password as GoalioPasswordMapper;
use GoalioForgotPassword\Options\ModuleOptions;

class Password extends GoalioPasswordMapper
{
    /**
     * @var \Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $dm;

    /**
     * @var \GoalioForgotPassword\Options\ModuleOptions
     */
    protected $options;

    public function __construct(DocumentManager $dm, ModuleOptions $options)
    {
        $this->dm      = $dm;
        $this->options = $options;
    }

    public function remove($passwordModel)
    {
        $this->dm->remove($passwordModel);
        $this->dm->flush();
    }

    public function findByUser($userId)
    {
        $er = $this->dm->getRepository($this->options->getPasswordEntityClass());

        return $er->findOneBy(array('user_id' => $userId));
    }

    public function findByUserIdRequestKey($userId, $key)
    {
        $er = $this->dm->getRepository($this->options->getPasswordEntityClass());
        return $er->findOneBy(array('user_id' => $userId, 'requestKey' => $key));
    }

    public function cleanExpiredForgotRequests($expiryTime=86400)
    {

    }

    public function cleanPriorForgotRequests($userId)
    {
        $qb = $this->dm->getRepository($this->options->getPasswordEntityClass())->createQueryBuilder();
        $qb->remove()->field('user_id')->equals($userId);
        $qb->getQuery()->execute();
    }

    public function persist($passwordModel)
    {
        $this->dm->persist($passwordModel);
        $this->dm->flush();

        return $passwordModel;
    }

}