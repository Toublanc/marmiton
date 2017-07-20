<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Receipts
 *
 * @ORM\Table(name="receipts")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReceiptsRepository")
 */
class Receipts
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
     * @ORM\ManyToOne(targetEntity="Type_dishes", inversedBy="receipts")
     * @var Type_dishes
     */
    public $typeDishes;

    /**
     * @ORM\ManyToOne(targetEntity="Type_cooking", inversedBy="receipts")
     * @var Type_cooking
     */
    private $typeCooking;

    /**
     * @ORM\OneToMany(targetEntity="Stage", mappedBy="receipts", cascade={"persist"})
     * @var Stage[]
     */
    private $stage;

    /**
     * @ORM\OneToMany(targetEntity="Ingredients", mappedBy="receipts", cascade={"persist"})
     * @var Ingredients[]
     */
    private $ingredients;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="receipts")
     * @var User
     */
    protected $user;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_veg", type="boolean")
     */
    private $isVeg;

    /**
     * @var int
     *
     * @ORM\Column(name="level_id", type="integer")
     */
    private $levelId;

    /**
     * @var int
     *
     * @ORM\Column(name="price_type_id", type="integer")
     */
    private $priceTypeId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="prepare_time", type="integer")
     */
    private $prepareTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cooking_time", type="integer")
     */
    private $cookingTime;

    /**
     * @var int
     *
     * @ORM\Column(name="qte", type="integer")
     */
    private $qte;

    /**
     * @var string
     *
     * @ORM\Column(name="drink", type="string", length=255)
     */
    private $drink;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="string", length=255, nullable=true)
     */
    private $details;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_at", type="datetime")
     */
    private $createAt;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stage = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ingredients = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Receipts
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set isVeg
     *
     * @param boolean $isVeg
     *
     * @return Receipts
     */
    public function setIsVeg($isVeg)
    {
        $this->isVeg = $isVeg;

        return $this;
    }

    /**
     * Get isVeg
     *
     * @return boolean
     */
    public function getIsVeg()
    {
        return $this->isVeg;
    }

    /**
     * Set levelId
     *
     * @param integer $levelId
     *
     * @return Receipts
     */
    public function setLevelId($levelId)
    {
        $this->levelId = $levelId;

        return $this;
    }

    /**
     * Get levelId
     *
     * @return integer
     */
    public function getLevelId()
    {
        return $this->levelId;
    }

    /**
     * Set priceTypeId
     *
     * @param integer $priceTypeId
     *
     * @return Receipts
     */
    public function setPriceTypeId($priceTypeId)
    {
        $this->priceTypeId = $priceTypeId;

        return $this;
    }

    /**
     * Get priceTypeId
     *
     * @return integer
     */
    public function getPriceTypeId()
    {
        return $this->priceTypeId;
    }

    /**
     * Set prepareTime
     *
     * @param integer $prepareTime
     *
     * @return Receipts
     */
    public function setPrepareTime($prepareTime)
    {
        $this->prepareTime = $prepareTime;

        return $this;
    }

    /**
     * Get prepareTime
     *
     * @return integer
     */
    public function getPrepareTime()
    {
        return $this->prepareTime;
    }

    /**
     * Set cookingTime
     *
     * @param integer $cookingTime
     *
     * @return Receipts
     */
    public function setCookingTime($cookingTime)
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    /**
     * Get cookingTime
     *
     * @return integer
     */
    public function getCookingTime()
    {
        return $this->cookingTime;
    }

    /**
     * Set qte
     *
     * @param integer $qte
     *
     * @return Receipts
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return integer
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Set drink
     *
     * @param string $drink
     *
     * @return Receipts
     */
    public function setDrink($drink)
    {
        $this->drink = $drink;

        return $this;
    }

    /**
     * Get drink
     *
     * @return string
     */
    public function getDrink()
    {
        return $this->drink;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return Receipts
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Receipts
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return Receipts
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set typeDishes
     *
     * @param \AppBundle\Entity\Type_dishes $typeDishes
     *
     * @return Receipts
     */
    public function setTypeDishes(\AppBundle\Entity\Type_dishes $typeDishes = null)
    {
        $this->typeDishes = $typeDishes;

        return $this;
    }

    /**
     * Get typeDishes
     *
     * @return \AppBundle\Entity\Type_dishes
     */
    public function getTypeDishes()
    {
        return $this->typeDishes;
    }

    /**
     * Set typeCooking
     *
     * @param \AppBundle\Entity\Type_cooking $typeCooking
     *
     * @return Receipts
     */
    public function setTypeCooking(\AppBundle\Entity\Type_cooking $typeCooking = null)
    {
        $this->typeCooking = $typeCooking;

        return $this;
    }

    /**
     * Get typeCooking
     *
     * @return \AppBundle\Entity\Type_cooking
     */
    public function getTypeCooking()
    {
        return $this->typeCooking;
    }

    /**
     * Add stage
     *
     * @param \AppBundle\Entity\Stage $stage
     *
     * @return Receipts
     */
    public function addStage(\AppBundle\Entity\Stage $stage)
    {
        $this->stage[] = $stage;

        return $this;
    }

    /**
     * Remove stage
     *
     * @param \AppBundle\Entity\Stage $stage
     */
    public function removeStage(\AppBundle\Entity\Stage $stage)
    {
        $this->stage->removeElement($stage);
    }

    /**
     * Get stage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Add ingredient
     *
     * @param \AppBundle\Entity\Ingredients $ingredient
     *
     * @return Receipts
     */
    public function addIngredient(\AppBundle\Entity\Ingredients $ingredient)
    {
        $this->ingredients[] = $ingredient;

        return $this;
    }

    /**
     * Remove ingredient
     *
     * @param \AppBundle\Entity\Ingredients $ingredient
     */
    public function removeIngredient(\AppBundle\Entity\Ingredients $ingredient)
    {
        $this->ingredients->removeElement($ingredient);
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Receipts
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
