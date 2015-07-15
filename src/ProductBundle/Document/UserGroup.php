<?php

namespace ProductBundle\Document;

use FOS\UserBundle\Document\Group;


use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class UserGroup extends Group
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId( $id )
    {
        $this->id = $id;
    }

}
