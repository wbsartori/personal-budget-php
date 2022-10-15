<?php

require_once ('../../../vendor/autoload.php');

use Source\Modules\Person\Services\PersonService;

$Person = new PersonService();

$id = addslashes($_GET['id']);

if($id){
    $persons = $Person->read($id);
}
