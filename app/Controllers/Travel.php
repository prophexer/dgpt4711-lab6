<?php
 namespace App\Controllers;
 class Travel extends BaseController {
 public function index(){
 // connect to the model
 $places = new \App\Models\Places();
 // retrieve all the records
 $records = $places->findAll();
 // get a template parser
 $parser = \Config\Services::parser();
 // tell it about the substitions
$table = new \CodeIgniter\View\Table();

$headings = $places->fields;
$displayHeadings = array_slice($headings, 1, 2);
$table->setHeading(array_map('ucfirst', $displayHeadings));

foreach ($records as $record) {
    $nameLink = anchor("travel/showme/$record->id",$record->name);
    $image = '<img src="/image/'.$record->image.'"/>';
    $table->addRow($nameLink,$image,$record->description);
}
$template = [
          'table_open' => '<table cellpadding="3px">',
          'cell_start' => '<td style="border: 2px solid #AAAAAA;">', 
          'row_alt_start' => '<tr style="background-color:#CCCCFF">',
          ];
      $table->setTemplate($template);
return $table->generate();
 return $parser->setData($fields)
         ->render('templates\top') .
      $table->generate() .
      $parser->setData($fields)
         ->render('templates\bottom');

 return $parser->setData(['records' => $records])
 // and have it render the template with those
 ->render('placeslist');
}

 public function showme($id){
 // connect to the model
 $places = new \App\Models\Places();
 // retrieve all the records
 $record = $places->find($id);
// get a template parser
 $parser = \Config\Services::parser();
 // tell it about the substitions
$table = new \CodeIgniter\View\Table();
      $headings = $places->fields;

      $table->addRow($record['id']);
      $table->addRow($record['name']);
      $table->addRow($record['description']);
      $table->addRow($record['country']);
      $table->addRow($record['Maxweight']);
      $table->addRow($record['HairColor']);
      $table->addRow('<img src="/image/'.$record['image'].'"/>');

      $template = [
          'table_open' => '<table cellpadding="5px">',
          'cell_start' => '<td style="border:2px solid #FF3333;">', 
          'row_alt_start' => '<tr style="background-color:#FFFFBB">',
          ];

      $fields = [
        'title' => 'This place',
        'heading' => 'This place', 
        'footer' => 'Copyright RongJie Cai'
        ];

      $table->setTemplate($template);
      return $parser->setData($fields)
         ->render('templates\top') .
      $table->generate() .
      $parser->setData($fields)
         ->render('templates\bottom');
      // and have it render the template with those
   }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
