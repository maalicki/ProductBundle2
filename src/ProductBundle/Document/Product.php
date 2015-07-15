<?php
/**
 * Description of Product
 *
 * @author lmalicki
 */
namespace ProductBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Product
{

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Float
     */
    private $price;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Category", inversedBy="products")
     *
     * @var Category
     */
    private $category;

    /**
     * @MongoDB\Date
     */
    private $created;

    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add category
     *
     * @param ProductBundle\Document\Category $category
     */
    public function addCategory(\ProductBundle\Document\Category $category)
    {
        $this->category[] = $category;
    }

    /**
     * Remove category
     *
     * @param ProductBundle\Document\Category $category
     */
    public function removeCategory(\ProductBundle\Document\Category $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set created
     *
     * @param date $created
     * @return self
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created
     *
     * @return date $created
     */
    public function getCreated()
    {
        return $this->created;
    }
}
