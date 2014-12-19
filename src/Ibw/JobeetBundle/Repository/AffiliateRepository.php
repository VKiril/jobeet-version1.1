<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 18.12.14
 * Time: 17:53
 */

namespace Ibw\JobeetBundle\Repository;
use Doctrine\ORM\EntityRepository;

class AffiliateRepository extends EntityRepository{
    public function getForToken($token)
    {
        $qb = $this->createQueryBuilder('a')
            ->where('a.is_active = :active')
            ->setParameter('active', 1)
            ->andWhere('a.token = :token')
            ->setParameter('token', $token)
            ->setMaxResults(1)
        ;

        try{
            $affiliate = $qb->getQuery()->getSingleResult();
        } catch(\Doctrine\Orm\NoResultException $e){
            $affiliate = null;
        }

        return $affiliate;
    }
} 