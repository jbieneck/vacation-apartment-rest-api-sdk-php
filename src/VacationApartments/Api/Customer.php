<?php
namespace VacationApartments\Api;

use Httpful\Request;
use VacationApartments\Exception\OperationNotImplementedException;
use VacationApartments\Utility\Utility;

/**
 * Class Customer
 * retrieves, creates and patches customers
 * retrieve all customers currently linked to your user account
 *
 * @package VacationApartments\API
 */
class Customer {

    /** @var int */
    protected $customerId;

    /**
     * @return string resource name of the API
     */
    protected function getResourceName(){
        return "customer";
    }

    /**
     * @return int
     */
    public function getCustomerId() {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     */
    public function setCustomerId($customerId) {
        $this->customerId = $customerId;
    }
}
