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
class Customer {

    const RESOURCE = "/customer";

    public static function create($customerId) {

        $utility   = new Utility();
        $apiParams = $utility->getConfig("apiParameters");

        $body = array("customer_id" => $customerId);

        // $basic_auth_sting = 'Basic ' . base64_encode($your_email . ':' . $your_password); => see keepass file for password
        $basicAuthString = 'Basic ' . base64_encode($apiParams['accountEmail'] . ":" . $apiParams['accountPassword']);
        $response        = Request::post($apiParams['url'] . self::RESOURCE)
            ->addHeaders(
                array(
                    'Authorization' => $basicAuthString,
                    'Content-Type'  => 'application/vnd.listing.' . $apiParams['version'] . '+json',
                )
            )
            ->body(json_encode($body))
            ->send();
        var_dump($response);

        // TODO: set response values into fields and create getters/setters for them, then return $this (Customer)
        // TODO: handle unexptected response (logging?)
        return json_decode($response);
    }

    /**
     * @param $customerId
     * @param $username
     * @throws
     */
    public static function patch($customerId, $username) {
        throw new OperationNotImplementedException('not yet implemented');
    }
}