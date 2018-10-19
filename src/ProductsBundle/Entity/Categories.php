<?php

namespace ProductsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcategories", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategories;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=45, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=false)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="ProductsBundle\Entity\Products", mappedBy="idcategories")
     */
    private $idcategoriesProducts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcategoriesProducts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get toString
     *
     * @return string 
     */
    public function __toString() {
        return $this->name;
    }
    
    /**
     * Get idcategories
     *
     * @return integer
     */
    public function getIdcategories()
    {
        return $this->idcategories;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Categories
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Categories
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
     * Set description
     *
     * @param string $description
     *
     * @return Categories
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Categories
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Add idcategoriesProduct
     *
     * @param \ProductsBundle\Entity\Products $idcategoriesProduct
     *
     * @return Categories
     */
    public function addIdcategoriesProduct(\ProductsBundle\Entity\Products $idcategoriesProduct)
    {
        $this->idcategoriesProducts[] = $idcategoriesProduct;

        return $this;
    }

    /**
     * Remove idcategoriesProduct
     *
     * @param \ProductsBundle\Entity\Products $idcategoriesProduct
     */
    public function removeIdcategoriesProduct(\ProductsBundle\Entity\Products $idcategoriesProduct)
    {
        $this->idcategoriesProducts->removeElement($idcategoriesProduct);
    }

    /**
     * Get idcategoriesProducts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdcategoriesProducts()
    {
        return $this->idcategoriesProducts;
    }
}
