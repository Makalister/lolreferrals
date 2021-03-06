<?php

namespace MGD\BasicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contacto
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Contacto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="Pedido", fetch="EAGER")
	 * @ORM\JoinColumn(name="estado_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
	 */
	private $pedido;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\Email()
     * @Assert\NotBlank()
     */
    private $email;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="nombre", type="string", length=255)
	 * @Assert\NotBlank()
	 */
	private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="mensaje", type="text")
     * @Assert\NotBlank()
     */
    private $mensaje;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=39)
     */
    private $ip;

	function __construct()
	{
		if (isset($_SERVER['REMOTE_ADDR'])) {
			$this->ip = $_SERVER['REMOTE_ADDR'];
		}else{
            $this->ip = "CLI";
        }
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
     * Set email
     *
     * @param string $email
     * @return Contacto
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set mensaje
     *
     * @param string $mensaje
     * @return Contacto
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    
        return $this;
    }

    /**
     * Get mensaje
     *
     * @return string 
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Contacto
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Contacto
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set pedido
     *
     * @param \MGD\BasicBundle\Entity\Pedido $pedido
     * @return Contacto
     */
    public function setPedido(\MGD\BasicBundle\Entity\Pedido $pedido = null)
    {
        $this->pedido = $pedido;
    
        return $this;
    }

    /**
     * Get pedido
     *
     * @return \MGD\BasicBundle\Entity\Pedido 
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Contacto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}