<?php

namespace firstspace\BlogBundle\Services;

class Roles{
	
	private $roles;
	
	public function __construct($hierarchy = array()) {
		$this->roles = $this->setRoles($hierarchy);
	}
	public function setRoles($hierarchy = array()){
		$roles = array();
		foreach ($hierarchy as $key => $row){
			foreach ($row as $key => $haystack){
				$name = '';
				$roleName = explode('_', $haystack);
				array_shift($roleName);
				foreach ($roleName as $part){
					$name .= $part . ' ';
				}
				array_push($roles, array($haystack => $name));
			}
		}
		return $roles;	
	}
	public function getRoles(){
		return $this->roles;
	}

}

?>