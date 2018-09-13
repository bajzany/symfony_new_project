<?php
/**
 * Created by PhpStorm.
 * User: bajza
 * Date: 13.09.2018
 * Time: 20:26
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMSSerializer;

/**
 * AgileBoard
 *
 * @ORM\Table(name="web_users")
 * @ORM\Entity()
 */
class User
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
     * @var \DateTime
     * @ORM\Column(name="`date_completed`", type="datetime", nullable=true)
     */
    private $dateActivated;


    /**
     * @var string
     * @ORM\Column(name="`username`", type="string", nullable=false)
     * @Assert\Length(
     *     min=3,
     *     max=16,
     *     minMessage="Username je příliš krátký.",
     *     maxMessage="Username je příliš dlouhý."
     * )
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z_0-9]+$/",
     *     message="Username nemůže obsahovat nevhodné znaky"
     * )
     * @JMSSerializer\Expose
     * @JMSSerializer\Type("string")
     * @JMSSerializer\Groups({"user_base"})
     */
    private $username;


    public function __construct()
    {
        $this->dateActivated = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getDateActivated()
    {
        return $this->dateActivated;
    }

    /**
     * @param \DateTime $dateActivated
     */
    public function setDateActivated($dateActivated)
    {
        $this->dateActivated = $dateActivated;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

}