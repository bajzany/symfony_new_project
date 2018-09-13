<?php
/**
 * Created by PhpStorm.
 * User: bajza
 * Date: 13.09.2018
 * Time: 20:41
 */

namespace AppBundle\Manager;


use Doctrine\Common\Persistence\ManagerRegistry;

class BaseManager
{
    /**
     * @var ManagerRegistry $entityManager
     */
    protected $em;

    public function __construct(ManagerRegistry $entityManager)
    {
        $this->em = $entityManager->getManager();
    }

    public function flush()
    {
        $this->em->flush();
    }

    public function remove($object)
    {
        $this->em->remove($object);
    }

    public function persist($object)
    {
        $this->em->persist($object);
    }
}