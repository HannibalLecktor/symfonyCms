<?php
/**
 * Created by PhpStorm.
 * User: Khadeev Fanis
 * Date: 18.05.15
 * Time: 22:11
 */

namespace InfoSteel\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="InfoSteel\UserBundle\Repository\UserRepository")
 * @ORM\Table(name="lcl_user")
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
}