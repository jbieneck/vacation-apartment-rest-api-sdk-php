<?php
require_once "bootstrap.php";

use VacationApartments\Api\Details;

/**
 * @return mixed
 */
function getDetails() {

    $details = new Details();
    $details = $details->get();

    return $details;
}


$data = getDetails();
var_dump($data);
