<?php

  /////////////////////////////////////
 // index.php for SimpleExample app //
/////////////////////////////////////

// Create f3 object then set various global properties of it
// These are available to the routing code below, but also to any 
// classes defined in autoloaded definitions

$f3 = require('../../../AboveWebRoot/fatfree-master-3.7/lib/base.php');

// autoload Controller class(es) and anything hidden above web root, e.g. DB stuff
$f3->set('AUTOLOAD','autoload/;../../../AboveWebRoot/autoload/');

$db = DatabaseConnection::connect();		// defined as autoloaded class in AboveWebRoot/autoload/
$f3->set('DB', $db);

$f3->set('DEBUG',3);		// set maximum debug level
$f3->set('UI','ui/');		// folder for View templates

// Create a session, using the SQL session storage option (for details see https://fatfreeframework.com/3.6/session#SQL)
new \DB\SQL\Session($f3->get('DB'));
// if the SESSION.username variable is not set, set it to 'UNSET'
if (!$f3->exists('SESSION.userName')) $f3->set('SESSION.userName', 'UNSET');

// If a session timeout is needed, see https://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
// and see https://fatfreeframework.com/3.6/session#stamp for the F3 session method stamp()

  /////////////////////////////////////////////
 // Simple Example URL application routings //
/////////////////////////////////////////////


$f3->route('GET /',  // GRC home page
  function ($f3) {
    $f3->set('html_title','Global Recipe Collection');
    $f3->set('content','index.html');
    echo Template::instance()->render('layout.html');
  }
);

$f3->route('GET /viewrecipe-navigate',
    function ($f3) {
        //$f3->set("dbData", $list);
        $f3->set('html_title','View Recipe');
        $f3->set('content','viewrecipe_navigate.html');
        echo Template::instance()->render('layout.html');
    }
);

$f3->route('GET /api/v1/navigation_data',
    function($f3) {
        $controller = new SimpleController;
        $list = $controller->getData();
        header('Content-Type: application/json');
        echo json_encode($list);
    }
);
//$f3->route('POST /viewrecipe-navigate',
//    function($f3) {
//        $f3->reroute('/viewrecipe-navigate');
//    }
//);


$f3->route('GET /viewrecipe-search',
    function ($f3) {
        $controller = new SimpleController;
        $alldata = $controller->getAllData();

        $f3->set("dbData", $alldata);

        $f3->set('html_title','View Recipe');
        $f3->set('content','viewrecipe_search.html');
        echo Template::instance()->render('layout.html');
    }
);

$f3->route('GET /share_recipe',
  function($f3) {
    switch ($f3->get('GET.step')) {		// PARAMS.msg is whatever was the last element of the URL
      case "1":
        $step = "1";
        $f3->set('content', 'share_recipe_1.html');		// the login form that will be shown to the user
        break;
      case "2":
        $step = "2";
        $f3->set('content', 'share_recipe_2.html');		// the login form that will be shown to the user
        break;
      case "3":
        $step = "3";
        $f3->set('content', 'share_recipe_3.html');		// the login form that will be shown to the user
        break;
      case "4":
        $step = "4";
        $f3->set('content', 'share_recipe_4.html');		// the login form that will be shown to the user
        break;
    }
    $f3->set('html_title', 'Share Recipe');
    $f3->set('step', $step);				// set message that will be shown to user in the login.html template
    // $f3->set('content', 'login.html');		// the login form that will be shown to the user
    echo template::instance()->render('layout.html');
  }

);

$f3->route('POST /share_recipe',
  function($f3) {
    switch ($f3->get('GET.step')) {		// PARAMS.msg is whatever was the last element of the URL
      case "1":
        $step = "1";
        $f3->set('content', 'share_recipe_1.html');		// the login form that will be shown to the user
        $formdata = array();			// array to pass on the entered data in
        $formdata["name"] = $f3->get('POST.name');			// whatever was called "name" on the form
        $formdata["photo"] = $f3->get('POST.photo');			// whatever was called "name" on the form
        $formdata["country"] = $f3->get('POST.country');		// whatever was called "colour" on the form
        $formdata["meal_type"] = $f3->get('POST.meal_type');		// whatever was called "colour" on the form
        $formdata["meal_time"] = $f3->get('POST.meal_time');		// whatever was called "colour" on the form
        $formdata["people_quantity"] = $f3->get('POST.people_quantity');		// whatever was called "colour" on the form
          $formdata["URL"] = $f3->get('POST.URL');		// whatever was called "colour" on the form


          $controller = new SimpleController;
          $controller->putIntoDatabase($formdata, $f3);
          
        $f3->set('formData',$formdata);		// set info in F3 variable for access in response template
          header("location:/fatfree/GlobalGourmetSparks/share_recipe?step=4");                  // will always go to simplepet after successful login

          break;
      case "2":
        $step = "2";
        $f3->set('content', 'share_recipe_2.html');		// the login form that will be shown to the user
        break;
      case "3":
        $step = "3";
        $f3->set('content', 'share_recipe_3.html');		// the login form that will be shown to the user
        break;
      case "4":
        $step = "4";
        $f3->set('content', 'share_recipe_4.html');		// the login form that will be shown to the user
        break;
    }

	
  $f3->set('html_title', 'Share Recipe');
  $f3->set('step', $step);				// set message that will be shown to user in the login.html template
  // $f3->set('content', 'login.html');		// the login form that will be shown to the user
  echo template::instance()->render('layout.html');

  }
);


$f3->route('GET /login',				// @msg is a parameter that tells us which message to give the user
  function($f3) {
    switch ($f3->get('GET.msg')) {		// PARAMS.msg is whatever was the last element of the URL
    	case "err":
    		$msg = "N";
    		break;
    	default:						// this is the case if neither of the above cases is matched
    		$msg = "Y";
    }
    $f3->set('html_title', 'Login In');
    $f3->set('message', $msg);				// set message that will be shown to user in the login.html template
	// $f3->set('thisIsLoginPage', 'true');	// set flag that will be tested in layout.html, to say this is login page
    $f3->set('content', 'login.html');		// the login form that will be shown to the user
    echo template::instance()->render('layout.html');
  }
);

// When using POST, do the login and session management
$f3->route('POST /login',
  function($f3) {
    $controller = new SimpleController;
    if ($controller->loginUser($f3->get('POST.uname'), $f3->get('POST.password'))) {		// user is recognised
		$f3->set('SESSION.userName', $f3->get('POST.uname'));			// note that this is a global that will be available elsewhere
        header("location:/fatfree/GlobalGourmetSparks/user_info");                  // will always go to simplepet after successful login
    }
    else{
    	// $f3->reroute('/login?msg=err');		// return to login page with the message that there was an error in the credentials
      header("location: /fatfree/GlobalGourmetSparks/login?msg=err");
    }
  });

  				// set message that will be shown to user in the login.html template

$f3->route('POST /logout',
  function($f3) {
		$f3->set('SESSION.userName', 'UNSET');
    	$f3->reroute('/login/lo');		// return to login page with the message that the user has been logged out
  }
);

$f3->route('GET /user_info',
    function ($f3) {
        $f3->set('html_title','User Info');
        $f3->set('content','user_info.html');
        echo Template::instance()->render('layout.html');
    }
);

$f3->route('POST /user_info',
  function($f3) {
		$f3->set('SESSION.userName', 'UNSET');
    header("location:/fatfree/GlobalGourmetSparks/login");                  // will always go to simplepet after successful login
  }
);

$f3->route('GET /report_video',  // GRC home page
    function ($f3) {
        $f3->set('html_title','Report & Video');
        $f3->set('content','report.html');
        echo Template::instance()->render('layout.html');
    }
);



$f3->route('GET /api/v1/recipe', 'RecipeController->get');
$f3->route('GET /api/v1/my-recipe', 'RecipeController->my_recipe');
$f3->route('POST /api/v1/upload', 'FileUpload->upload');

$f3->run();

?>

