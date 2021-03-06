<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use FOS\UserBundle\Document\User as BaseUser;

/**
 * This file has been generated by the EasyExtends bundle ( http://sonata-project.org/bundles/easy-extends )
 *
 * References :
 *   working with object : http://www.doctrine-project.org/docs/mongodb_odm/1.0/en/reference/working-with-objects.html
 *
 * @author <yourname> <youremail>
 * @MongoDB\Document()
 * @MongoDB\MappedSuperclass()
 */
class User extends BaseUser
{
    /**
     * @MongoDB\Id()
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

	/**
	 * @MongoDB\ReferenceOne(targetDocument="Group")
	 */
	protected  $groups;

	public function setGroups(Group $groups)
	{
		$this->groups = $groups;

		return $this;
	}
}
