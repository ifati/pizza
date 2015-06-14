<?php

namespace projet\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use projet\Form\AddPizzaForm;
use projet\Model\Pizza;
class projetController extends AbstractActionController {

protected $pizzaTable;

public function indexAction()
{
	$pizzas = $this->getPizzaTable()->find_all();
	/*
	echo 'Projects of type PHP: ';
	
	var_dump($pizza->current());
	var_dump($pizza);die;
	*/
	return array('pizzas' => $pizzas );
}

public function addAction(){
$add_form = new AddPizzaForm();
$request = $this->getRequest();
if($request->isPost()){
	$pizza = new Pizza();
	//$add_form->setInputFilter($pizza->getInputFilter());
	$add_form->setData($request->getPost());
	if ($add_form->isValid()){
		$pizza->exchangeArray($add_form->getData());
		$this->getPizzaTable()->save($pizza);
	}else{
		# code...
	}
	return $this->redirect()->toRoute('Projet');
}
return array('form' => $add_form );
}

     public function editAction()
     {
         $id = (int) $this->params()->fromRoute('id', 0);

         if (!$id) {
             return $this->redirect()->toRoute('pizza', array(
                 'action' => 'add'
             ));
         }
         try {
             $pizza = $this->getPizzaTable()->getPizza($id);

         }
         catch (\Exception $ex) {
         	// 
             return $this->redirect()->toRoute('Projet');
         }

      //  var_dump($pizza);//die;
         $form  = new AddPizzaForm();
         $form->bind($pizza);
         $form->get('addpizza')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setData($request->getPost());

             if ($form->isValid()) {
             	 $pizza->id = $id;
                 $this->getPizzaTable()->save($pizza);

                 return $this->redirect()->toRoute('Projet');
             }
         }

         return array(
             'id' => $id,
             'form' => $form,
         );
     }

public function deleteAction()
{
	$id = (int) $this->params()->fromRoute('id', 0);

         if (!$id) {
             return $this->redirect()->toRoute('pizza', array(
                 'action' => 'add'
             ));
         }
         try {
             $pizza = $this->getPizzaTable()->getPizza($id);
             $this->getPizzaTable()->deletePizza($id);
			return $this->redirect()->toRoute('Projet');
         }
         catch (\Exception $ex) {
         	// 
             return $this->redirect()->toRoute('Projet');
         }
         
	
}
public function getPizzaTable(){

	if(!$this->pizzaTable)
	{

		$sm = $this->getServiceLocator();
		//print_r($sm);die();
		$this->pizzaTable = $sm->get('projet\Model\pizzaTable');
		//
		 
	}

	return $this->pizzaTable;
}

}