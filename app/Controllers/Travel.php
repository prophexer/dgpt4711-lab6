<?php

namespace App\Controllers;


 

class Travel extends BaseController

{

public function index()
{
$places = new \App\Models\Places();
$records = $places->findAll();
// get a template parser

$parser = \Config\Services::parser(); // tell it about the substitions

return $parser->setData(['records' => $records]) // and have it render the template with those

->render('placeslist');
}


public function showme($id)
{// connect to the model

$places = new \App\Models\Places();

// retrieve all the records

$record = $places->find($id);
// get a template parser

$parser = \Config\Services::parser(); 
return $parser->setData($record) -> render('oneplace');
}

}
