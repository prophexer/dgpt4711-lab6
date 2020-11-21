<?php
namespace App\Models;
use App\Models\Simple\XMLModel;
/*
 * Mock travel destination data.
 * Note that we don't have to extend CodeIgniter's model for now
 */

class Places extends XMLModel{
    protected $origin = WRITEPATH . 'data/placesData.xml';
    protected $keyField = 'id';
    protected $validationRules = [];
    //mock data : an array of records
}
