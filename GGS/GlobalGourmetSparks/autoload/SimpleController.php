<?php
// Class that provides methods for working with the form data.
// There should be NOTHING in this file except this class definition.

class SimpleController {
	private $recipe;


	public function __construct() { // __PHP内置函数，对象被创建时，function run
		global $f3;						// needed for $f3->get()
		// $this表示this object
		$this->recipe = new DB\SQL\Mapper($f3->get('DB'),"recipe");	// create DB query mapper object
		$this->loginMapper = new DB\SQL\Mapper($f3->get('DB'),"user");	// create DB query mapper object

		// for the "simpleModel" table
	}

	public function getData() {
		$this->recipe->load('');

		$img_array = array();
		$name_array = array();
		$country_array = array();
		$type_array = array();
		$time_array = array();
		$people_array = array();
 		while(!$this->recipe->dry()) {
			$img = $this->recipe->photo;//db mapper
			$name = $this->recipe->name;
			$country = $this->recipe->country;
			$type = $this->recipe->meal_type;
			$time = $this->recipe->meal_time;
			$people = $this->recipe->people_quantity;

			array_push($img_array, $img);
			array_push($name_array, $name);
			array_push($country_array, $country);
			array_push($type_array, $type);
			array_push($time_array, $time);
			array_push($people_array, $people);

			$this->recipe->next();
		}
		$index = array_rand($img_array, 1);
		$path = 'static/img/recipe/';

		$list = array();
		$imgpath  = $path . $img_array[$index];
		$recipe_name = $name_array[$index];
		$recipe_country = $country_array[$index];
		$recipe_type = $type_array[$index];
		$recipe_time = $time_array[$index];
		$recipe_people = $people_array[$index];
		array_push($list, $imgpath, $recipe_name, $recipe_country, $recipe_type, $recipe_time, $recipe_people);

		return $list;
	}

	public function getAllData() {
		$list = $this->recipe->find();
		return $list;
	}

	public function putIntoDatabase($data) {	
		$this->recipe->name = $data["name"];					// set value for "name" field
		$this->recipe->photo = $data["photo"];				// set value for "colour" field
		$this->recipe->country = $data["country"];				// set value for "colour" field
		$this->recipe->meal_type = $data["meal_type"];				// set value for "colour" field
		$this->recipe->meal_time = $data["meal_time"];				// set value for "colour" field
		$this->recipe->people_quantity = $data["people_quantity"];				// set value for "colour" field

		$this->recipe->save();									// save new record with these fields
	}

	public function loginUser($user, $pwd) {		// very simple login -- no use of encryption, hashing etc.
		$auth = new \Auth($this->loginMapper, array('id'=>'username', 'pw'=>'password'));	// fields in table
		return $auth->login($user, $pwd); 			// returns true on successful login
	}




}


?>
