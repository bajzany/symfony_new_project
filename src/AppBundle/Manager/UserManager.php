<?php
/**
 * Created by PhpStorm.
 * User: bajza
 * Date: 13.09.2018
 * Time: 20:40
 */

namespace AppBundle\Manager;

use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectRepository;

class UserManager extends BaseManager
{

    /**
     * @var ObjectRepository $repository
     */
    public $userRepository;

    public function __construct(ManagerRegistry $entityManager)
    {
        parent::__construct($entityManager);

        $this->userRepository = $this->em->getRepository(User::class);
    }




}