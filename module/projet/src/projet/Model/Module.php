<?php
namespace Pizza;

 // Add these import statements:
 use projet\Model\Pizza;
 use projet\Model\PizzaTable;
 use Zend\Db\ResultSet\ResultSet;
 use Zend\Db\TableGateway\TableGateway;

 class Module
 {
     // getAutoloaderConfig() and getConfig() methods here

     // Add this method:
     public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Pizza\Model\PizzaTable' =>  function($sm) {
                     $tableGateway = $sm->get('PizzaTableGateway');
                     $table = new PizzaTable($tableGateway);
                     return $table;
                 },
                 'PizzaTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Pizza());
                     return new TableGateway('Pizza', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }