<?php
namespace projet\Form;
use Zend\Form\Form;
class AddPizzaForm extends Form{
	public function __construct(){
		parent::__construct('addpizzaform');
		$this->add(array(
			'name'  =>'name',
			'type'  => 'text',
			'options' => array('label'=> 'Nom Pizza')));

		$this->add(array(
			'name'  =>'ingredients',
			'type'  => 'textarea',
			'options' => array('label'=> 'Les ingredients')));

		$this->add(array(
			'name'  =>'smallpizza',
			'type'  => 'text',
			'options' => array('label'=> 'Petite Pizza')));

		$this->add(array(
			'name'  =>'bigpizza',
			'type'  => 'text',
			'options' => array('label'=> 'Grande Pizza')));

		$this->add(array(
			'name'  =>'famillypizza',
			'type'  => 'text',
			'options' => array('label'=> 'Familiale Pizza')));

		$this->add(array(
			'name'  =>'partyprice',
			'type'  => 'text',
			'options' => array('label'=> 'Prix')));

		$this->add(array(
			'name'  =>'famillyprice',
			'type'  => 'text',
			'options' => array('label'=> 'Prix')));


		$this->add(array(
			'name'  =>'smallprice',
			'type'  => 'text',
			'options' => array('label'=> 'smallprice')));

		$this->add(array(
			'name'  =>'bigprice',
			'type'  => 'text',
			'options' => array('label'=> 'bigprice')));

		$this->add(array(
			'name' => 'addpizza',
			'type' =>'submit',
			'attributes' => array(
				'value'=> 'Ajouter nouvelle Pizza',
				'id' =>'submitbutton' )));
	}

}
?>