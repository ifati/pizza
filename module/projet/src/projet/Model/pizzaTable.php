<?php

namespace projet\Model;
use Zend\Db\TableGateway\TableGateway;
class PizzaTable {

	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function find_all(){
		return $this->tableGateway->select();

	}

	public function getPizza($id=0)
	{
		$id = (int)$id;
		$result = $this->tableGateway->select(array('id'=>$id));
		$row = $result->current();

		if($row){
			return $row;
		} 
		else {return null;;}
	}
	public function save(Pizza $pizza){
		$data = array('name' => $pizza->name,
					   'ingredients'=>$pizza->ingredients,
					   	'smallprice' => $pizza->smallprice,
					   	'bigprice' => $pizza->bigprice,
					   	'famillyprice' => $pizza->famillyprice,
					   	'partyprice' => $pizza->partyprice,
			);
		//var_dump($pizza);
		$id = (int)$pizza->id;
		//echo $id;die;
		if ($id == 0){
			$this->tableGateway->insert($data);
		}else{
			if($this->getPizza($id)){
				$this->tableGateway->update($data , array('id'=>$id));
			}
			else
			{
				throw new Exception("The Pizza with the id = ($id) could not be found in the database ");
				
			}
		}
	}

	public function deletePizza($id=0){
		$this->tableGateway->delete(array('id' => (int)$id));
	}

}