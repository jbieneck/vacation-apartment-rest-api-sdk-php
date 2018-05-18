<?php
namespace VacationApartments\Api;

use Httpful\Request;
use VacationApartments\Exception\OperationNotImplementedException;
use VacationApartments\Utility\Utility;

/**
 * Class Customer
 * creates and patches customers
 *
 * @package VacationApartments\API
 */
class Listing {

    const RESOURCE = "/listing/";

    private $maxPersons;
    private $accessibilityId;
    private $size;
    private $classificationExpireDate;
    private $classificationStarId;
    private $objectTypeId;


    function dashesToCamelCase($string, $capitalizeFirstCharacter = false)
    {

        $str = str_replace('_', '', ucwords($string, '_'));

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }

    /**
     * TODO: create ApiModel and move common stuff there
     * @param $data
     */
    protected function mapResponse($data){
        foreach($data as $key => $value){
            $property = $this->dashesToCamelCase($key);
            $this->$property = $value;
        }
    }

    public function get($listingId) {

        $utility   = new Utility();
        $apiParams = $utility->getConfig("apiParameters");

        // $basic_auth_sting = 'Basic ' . base64_encode($your_email . ':' . $your_password); => see keepass file for password
        $basicAuthString = 'Basic ' . base64_encode($apiParams['accountEmail'] . ":" . $apiParams['accountPassword']);
        $response        = Request::get($apiParams['url'] . self::RESOURCE . $listingId)
            ->addHeaders(
                array(
                    'Authorization' => $basicAuthString,
                    'Content-Type'  => 'application/vnd.listing.' . $apiParams['version'] . '+json',
                )
            )
            ->send();
        $this->mapResponse(json_decode($response));

        // TODO: set response values into fields and create getters/setters for them, then return $this (Customer)
        // TODO: handle unexptected response (logging?)
        return $this;
    }


    /**
     * @param $customerId
     * @param $username
     * @throws
     */
    public static function patch($customerId, $username) {
        throw new OperationNotImplementedException('not yet implemented');
    }

    /**
     * @return mixed
     */
    public function getMaxPersons(){
        return $this->maxPersons;
    }

    /**
     * @param mixed $maxPersons
     */
    public function setMaxPersons($maxPersons) {
        $this->maxPersons = $maxPersons;
    }

    /**
     * @return mixed
     */
    public function getAccessibilityId() {
        return $this->accessibilityId;
    }

    /**
     * @param mixed $accessibilityId
     */
    public function setAccessibilityId($accessibilityId) {
        $this->accessibilityId = $accessibilityId;
    }

    /**
     * @return mixed
     */
    public function getSize() {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size) {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getClassificationExpireDate() {
        return $this->classificationExpireDate;
    }

    /**
     * @param mixed $classificationExpireDate
     */
    public function setClassificationExpireDate($classificationExpireDate) {
        $this->classificationExpireDate = $classificationExpireDate;
    }

    /**
     * @return mixed
     */
    public function getClassificationStarId() {
        return $this->classificationStarId;
    }

    /**
     * @param mixed $classificationStarId
     */
    public function setClassificationStarId($classificationStarId) {
        $this->classificationStarId = $classificationStarId;
    }

    /**
     * @return mixed
     */
    public function getObjectTypeId() {
        return $this->objectTypeId;
    }

    /**
     * @param mixed $objectTypeId
     */
    public function setObjectTypeId($objectTypeId) {
        $this->objectTypeId = $objectTypeId;
    }
}