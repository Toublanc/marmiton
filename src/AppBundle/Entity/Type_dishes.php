<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type_dishes
 *
 * @ORM\Table(name="type_dishes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Type_dishesRepository")
 */
class Type_dishes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Receipts", mappedBy="typeDishes")
     * @var Receipts[]
     */
    private $receipts;


}
