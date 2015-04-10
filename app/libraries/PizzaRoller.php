<?php

class PizzaRoller{
    public static function RollJSON($success, $message, $data){
	$output = new PizzaRoll;
	$output->success = $success;
	
	$output->message = $message;
	$output->data = $data;
        
        return Response::JSON($output);
    }
    
    public static function ArrayToObject($array)
    {
	if(!is_array($array)) {
	    return $array;
	}

	$object = new stdClass();
	if (is_array($array) && count($array) > 0) {
	  foreach ($array as $name=>$value) {
	     $name = strtolower(trim($name));
	     if (!empty($name)) {
		$object->$name = PizzaRoller::ArrayToObject($value);
	     }
	  }
	  return $object;
	}
	else {
	  return false;
	}
    }
    
    public static function GetPizzaRollPrice(){
        /*
        * === ULTRA IMPORTANT VARIABLE, KEEP SAFE ===
        */
       return 0.087;
       /*
        * === ULTRA IMPORTANT VARIABLE ABOVE ===
        */
    }
}

