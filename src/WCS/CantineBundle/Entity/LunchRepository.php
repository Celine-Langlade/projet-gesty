<?php

namespace WCS\CantineBundle\Entity;

/**
 * LunchRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LunchRepository extends \Doctrine\ORM\EntityRepository
{
    public function getTodayList($school)
    {
        // Format the date
        $date = new \DateTime('');
        $day = $date->format('Y-m-d');

        // Request pupils to the database from a certain date
        // lien : http://symfony.com/doc/current/book/doctrine.html (src/AppBundle/Entity/ProductRepository.php)
        return $this->getEntityManager()
            ->createQuery(
                'SELECT l FROM WCSCantineBundle:Lunch l JOIN l.eleve e JOIN e.division d WHERE l.date = :day AND d.school = :place ORDER BY e.nom'
            )
            ->setParameter(':day', "%".$day."%")
            ->setParameter(':place', $school)
            ->getResult();
    }
}
