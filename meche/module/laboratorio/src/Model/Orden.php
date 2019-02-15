<?php
namespace Laboratorio\Model;

class Orden
{
    public $id;
    public $cuenta;
    public $historia;
    public $paciente;
    public $estado;
    public $medico;
    public $fRegistro;
    public $fNacimiento;
    public $sexo;

    public function exchageArray(array $data)
    {
        $this->id = !empty($data['IdOrden']) ? $data['IdOrden'] :null;
        $this->cuenta = !empty($data['IdMovimiento']) ? $data['IdMovimiento'] :null;
        $this->historia = !empty($data['NroHistoriaClinica']) ? $data['NroHistoriaClinica'] :null;
        $this->paciente = !empty($data['Paciente']) ? $data['Paciente'] :null;
        $this->estado = !empty($data['IdEstadoFacturacion']) ? $data['IdEstadoFacturacion'] :null;
        $this->fRegistro = !empty($data['FechaCrearcion']) ? $data['FechaCrearcion'] :null;
        $this->medico = !empty($data['OrdenPrueba']) ? $data['OrdenPrueba'] :null;
        $this->fNacimiento = !empty($data['FechaNacimiento']) ? $data['FechaNacimiento'] :null;
        $this->sexo = !empty($data['idTipoSexo']) ? $data['idTipoSexo'] :null;
    }

}