<?php

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class OrdenTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway;
    }

    public function getAlbum($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id'=> $id]);
        $row = $rowset->current();
        if(! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d'. $id
            ));
        }

        return $row;
    }

    public function saveOrden(Orden $orden)
    {
        $data = [
            'id' => $orden->id,
            'cuenta' => $orden->cuenta,
            'historia' => $orden->historia,
            'paciente' => $orden->paciente,
            'estado' => $orden->estado,
            'medico' => $orden->medico,
            'fRegistro' => $orden->fRegistro,
            'fNacimiento' => $orden->fNacimiento,
            'sexo' => $orden->sexo,
        ];

        $id = (int) $orden->id;

        if($id === 0)
        {
            $this->tableGateway->insert($data);
            return;
        }

        try{
            $this->getOrden($id);
        }catch(RuntimeException $e){
            throw new RuntimeException(sprintf(
                'Cannot update orden with identifier %d; does not exit', $id
            ));
        }

        $this->tableGateway->update($data, ['id'=> $id]);
    }

    public function deleteOrden($id)
    {
        $this->tableGateway->delete(['id' => $id]);
    }
}