<?php
namespace VacationApartments\Api;

use Httpful\Request;
use VacationApartments\Exception\OperationNotImplementedException;
use VacationApartments\Utility\Utility;

/**
 * Class Details
 * retrieve and update your user account details.
 * Because every account has only one set of details it is not possible to send DELETE/POST requests,
 * also there are no collection methods. You can only PATCH and GET the resource entity.
 *
 * @package VacationApartments\API
 */
class Details extends Model{

    /** @var string */
    protected $username;
    /** @var string */
    protected $firstName;
    /** @var string */
    protected $lastName;
    /** @var string */
    protected $company;
    /** @var int */
    protected $salutationId;
    /** @var string */
    protected $password;

    /**
     * @return string resource name of the API
     */
    protected function getResourceName(){
        return "details";
    }

    /**
     * @return string $username
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @return string $firstName
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    /**
     * @return string $lastName
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    /**
     * @return string $company
     */
    public function getCompany() {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company) {
        $this->company = $company;
    }

    /**
     * The salutation of the contact person
     * Allowed values: 2 => Mr., 3 => Ms., 4 => family, 8 => company
     *
     * @return int $salutationId
     */
    public function getSalutationId() {
        return $this->salutationId;
    }

    /**
     * @param int $salutationId
     */
    public function setSalutationId($salutationId) {
        $this->salutationId = $salutationId;
    }

    /**
     * @return string $password
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }
}
