<?php
namespace VacationApartments\Api;

/**
 * Class Listing
 * retrieves, creates and patches listings
 *
 * @package VacationApartments\API
 */
class Listing extends Model {

    /** @var int */
    protected $maxPersons;
    /** @var int */
    protected $accessibilityId;
    /** @var int */
    protected $size;
    /** @var string (Format: Y-m-d) */
    protected $classificationExpireDate;
    /** @var int */
    protected $classificationStarId;
    /** @var int */
    protected $objectTypeId;


    protected function getResourceName() {
        return "listing";
    }

    /**
     * @return int
     */
    public function getMaxPersons() {
        return $this->maxPersons;
    }

    /**
     * @param int $maxPersons
     */
    public function setMaxPersons($maxPersons) {
        $this->maxPersons = $maxPersons;
    }

    /**
     * @return int
     */
    public function getAccessibilityId() {
        return $this->accessibilityId;
    }

    /**
     * @param int $accessibilityId
     */
    public function setAccessibilityId($accessibilityId) {
        $this->accessibilityId = $accessibilityId;
    }

    /**
     * @return int
     */
    public function getSize() {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize($size) {
        $this->size = $size;
    }

    /**
     * @return string (Format: Y-m-d)
     */
    public function getClassificationExpireDate() {
        return $this->classificationExpireDate;
    }

    /**
     * (Format: Y-m-d)
     * @param string $classificationExpireDate
     */
    public function setClassificationExpireDate($classificationExpireDate) {
        $this->classificationExpireDate = $classificationExpireDate;
    }

    /**
     * @return int
     */
    public function getClassificationStarId() {
        return $this->classificationStarId;
    }

    /**
     * @param int $classificationStarId
     */
    public function setClassificationStarId($classificationStarId) {
        $this->classificationStarId = $classificationStarId;
    }

    /**
     * @return int
     */
    public function getObjectTypeId() {
        return $this->objectTypeId;
    }

    /**
     * @param int $objectTypeId
     */
    public function setObjectTypeId($objectTypeId) {
        $this->objectTypeId = $objectTypeId;
    }
}
