<?php
namespace Laboratorio\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Model\OrdenTable;

class LaboratorioController extends AbstractActionController
{
    private $table;

    public function __construct(OrdenTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'albums' => $this->table->fetchAll()
        ]);
    }

    public function addAction()
    {
        
    }

    public function editAction()
    {

    }

    public function deleteAction()
    {
        
    }
}