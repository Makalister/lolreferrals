<?php

namespace MGD\BasicBundle\Entity;

use Doctrine\ORM\EntityRepository;
use MGD\BasicBundle\Entity\Pedido;

/**
 * PedidoBots
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PedidoBotsRepository extends EntityRepository
{
    public function isCompletedByPedido(Pedido $pedido)
    {
        $result = $this->getEntityManager()
            ->createQuery('
            SELECT count(p.nombre)
            FROM MGDBasicBundle:PedidoBots p
            WHERE
                p.lvl < :lvl
                AND p.pedido = :pedido

            ')
            ->setParameters(array('lvl' => 10, 'pedido' => $pedido))
            ->getSingleScalarResult();

        return $result> 0 ? false: true;
    }

    public function isFirstLvlByPedido(Pedido $pedido)
    {
        $result = $this->getEntityManager()
            ->createQuery('
            SELECT count(p.nombre)
            FROM MGDBasicBundle:PedidoBots p
            WHERE
                p.lvl > :lvl
                AND p.pedido = :pedido

            ')
            ->setParameters(array('lvl' => 0, 'pedido' => $pedido))
            ->getSingleScalarResult();

        return $result == 1 ? true : false;
    }

    public function countMayorLvlByPedido(Pedido $pedido,$lvl =0)
    {
        return $this->getEntityManager()
            ->createQuery('
            SELECT count(p.nombre)
            FROM MGDBasicBundle:PedidoBots p
            WHERE
                p.lvl > :lvl
                AND p.pedido = :pedido

            ')
            ->setParameters(array('lvl' => $lvl, 'pedido' => $pedido))
            ->getSingleScalarResult();

    }

    public function updateAllLvlsByPedido($pedido_id, $lvl)
    {
        return $this->getEntityManager()
            ->createQuery('
            UPDATE MGDBasicBundle:PedidoBots p
            SET p.lvl = :lvl
            WHERE
               p.pedido = :pedido
            ')
            ->setParameters(array('lvl' => $lvl, 'pedido' => $pedido_id))
            ->execute();
    }
}
