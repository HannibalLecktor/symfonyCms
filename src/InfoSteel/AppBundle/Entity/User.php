<?php
/**
 * Created by PhpStorm.
 * User: Khadeev Fanis
 * Date: 21/05/15
 * Time: 09:34
 */

namespace InfoSteel\AppBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package InfoSteel\AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="vkontakte_id", type="string", length=225, nullable=true)
     */
    protected $vkontakte_id;

    /**
     * @ORM\Column(name="vkontakte_access_token", type="string", length=225, nullable=true)
     */
    protected $vkontakte_access_token;

    public function __construct()
    {
        parent::__construct();
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

}