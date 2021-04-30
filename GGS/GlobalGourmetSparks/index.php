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

$f3->route('GET /login',
    function ($f3) {
        $f3->set('html_title','Log In');
        $f3->set('content','login.html');
        echo Template::instance()->render('layout.html');
    }
);

$f3->route('GET /test',
    function ($f3) {
        header('Content-Type: application/json');
        $data = array('test_field' => 'test_val');
        echo json_encode($data);
    }
);

$f3->run();

?>

