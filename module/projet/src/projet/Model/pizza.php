<?php

namespace projet\Model;
//use Zend\InputFilter\InputFilter;
//use Zend\InputFilter\InputFilterAwareInterface;
class Pizza 
{
	public $id; 
	public $name;
	public	$ingredients;
	public $smallprice;
	public $bigprice;
	public $famillyprice;
	public $partyprice;

	protected $InputFilter;

public function __construct()
{

}

public function exchangeArray($data)
{
	$this->id=(!empty($data['id']))? $data['id'] :null;
	$this->name=(!empty($data['name']))? $data['name'] :null;
	$this->ingredients=(!empty($data['ingredients']))? $data['ingredients'] :null;
	$this->smallprice=(!empty($data['smallprice']))? $data['smallprice'] :null;
	$this->bigprice=(!empty($data['bigprice']))? $data['bigprice'] :null;
	$this->famillyprice=(!empty($data['famillyprice']))? $data['famillyprice'] :null;
	$this->partyprice=(!empty($data['partyprice']))? $data['partyprice'] :null;
}

public function getArrayCopy()
{
	return get_object_vars($this);
}

public function setInputFilter(InputFilterInterface $InputFilter)
{
throw new \Exception("not used");
}

public function getInputFilter(){
		if(!$this->InputFilter)
		{
			$InputFilter = new InputFilter();
			$InputFilter->add(
				array('name'=>'name',
				'required'=>true,
				'filters'=>array(
					array('name'=>'StringTrim'),
					array('name'=>'strip_tags')
					),
				'validators' =>array(
					array('name' => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min' => 5,
						'max' => 30)
					)
				)
			));

			$InputFilter = new InputFilter();
			$InputFilter->add(array('name'=>'ingredients',
				'required'=>true,
				'filters'=>array(
					array('name'=>'StringTrim'),
					array('name'=>'strip_tags')),
				'validators' =>array(
					array('name' => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min' => 5,
						'max' => 255,) )
					)
				)
			);

			$InputFilter = new InputFilter();
			$InputFilter->add(array('name'=>'smallprice',
				'required'=>false,
				'filters'=>array(
					array('name'=>'StringTrim'),
					array('name'=>'strip_tags')),
				array('validators' =>array(
					'name' => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min' => 1,
						'max' => 5, ),),
					array('name'=> 'float',
						'options' => array('locale' => 'en_us'))
					)
				));
			$InputFilter = new InputFilter();
			$InputFilter->add(array('name'=>'bigprice',
				'required'=>false,
				'filters'=>array(
					array('name'=>'StringTrim'),
					array('name'=>'strip_tags')),
				array('validators' =>array(
					'name' => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min' => 1,
						'max' => 5, ),),
					array('name'=> 'float',
						'options' => array('locale' => 'en_us'))
					)
				));

			$InputFilter = new InputFilter();
			$InputFilter->add(array('name'=>'famillyprice',
				'required'=>false,
				'filters'=>array(
					array('name'=>'StringTrim'),
					array('name'=>'strip_tags')),
				array('validators' =>array(
					'name' => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min' => 1,
						'max' => 5, ),),
					array('name'=> 'float',
						'options' => array('locale' => 'en_us'))
					)
				));

		$InputFilter = new InputFilter();
			$InputFilter->add(array('name'=>'partyprice',
				'required'=>false,
				'filters'=>array(
					array('name'=>'StringTrim'),
					array('name'=>'strip_tags')),
				array('validators' =>array(
					'name' => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min' => 1,
						'max' => 5, ),),
					array('name'=> 'float',
						'options' => array('locale' => 'en_us'))
					)
				));
			$this->InputFilter=$InputFilter;
		}
		return $this->InputFilter;
			

	}
	
} 