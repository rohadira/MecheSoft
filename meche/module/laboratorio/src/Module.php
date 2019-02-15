<?php
namespace Laboratorio;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Db\AdapterInterface;
use Zend\Db\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__.'/../config/module.config.php';
    }


    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\OrdenTable::class => function($container) {
                    $tableGateway = $container->get(Model\OrdenTableGateway::class);
                    return new Model\OrdenTable($tableGateway);
                },
                Model\OrdenTableGateway::class => function($container){
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Orden());
                    return new TableGateway('orden', $dbAdapter, null, $resultSetPrototype);
                }
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\LaboratorioController::class => function($container){
                    return new Controller\LaboratorioController(
                        $container->get(Model\OrdenTable::class)
                    );
                }
            ],
        ];
    }
}
