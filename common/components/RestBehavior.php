<?php 

class RestBehavior extends CActiveRecordBehavior{

	public function Fields($fields){
		$result = array();
		foreach($fields as $field){
			if($this->owner->hasAttribute($field)){
				$result[$field] = $this->owner->$field;
			}
		}
		return $result;
	}

	public function AssocFields($fields){
		$result = array();
		foreach($fields as $field=>$attr){
			if($this->owner->hasAttribute($attr)){
				$result[$field] = $this->owner->$attr;
			}
		}
		return $result;
	}
}