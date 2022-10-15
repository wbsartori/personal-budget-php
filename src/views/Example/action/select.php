<?php

require_once ('../../../vendor/autoload.php');

use Source\Modules\Person\Services\PersonService;

$Person = new PersonService();
$persons = $Person->read();