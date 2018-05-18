<?php

namespace VacationApartments\Api;

use Httpful\Request;
use VacationApartments\Exception\OperationNotImplementedException;
use VacationApartments\Utility\Utility;

abstract class Model {

    /** @var null|int */
    private $resourceId;

    /**
     * @param null|int $resourceId
     * @return mixed
     */
    public function create($resourceId = null) {

        $this->resourceId = $resourceId;
        $body = $this->toJson();
        return $this->post($body);
    }

    /**
     * @param null|int $resourceId
     * @return Model
     */
    public function get($resourceId = null) {
        $this->resourceId = $resourceId;
        return $this->execute();
    }

    /**
     * @param null|int $resourceId
     * @return Model
     */
    public function update($resourceId = null) {
        $this->resourceId = $resourceId;
        return $this->patch();
    }

    /**
     * @param $body
     * @return mixed
     */
    private function post($body){
        $utility   = new Utility();
        $apiParams = $utility->getConfig("apiParameters");

        $basicAuthString = 'Basic ' . base64_encode($apiParams['username'] . ":" . $apiParams['password']);
        $response        = Request::post($apiParams['endpoint'] . '/' . $this->getResourceName())
            ->addHeaders(
                array(
                    'Authorization' => $basicAuthString,
                    'Content-Type'  => 'application/vnd.listing.' . $apiParams['version'] . '+json',
                )
            )
            ->body(json_encode($body))
            ->send();

        // TODO: handle unexptected response (logging?)
        return json_decode($response);
    }

    /**
     * @return string
     * @throws
     */
    private function patch() {
        throw new OperationNotImplementedException('not yet implemented');
    }

    /**
     * @return Model $this
     */
    private function execute(){
        $utility   = new Utility();
        $apiParams = $utility->getConfig("apiParameters");

        $basicAuthString = 'Basic ' . base64_encode($apiParams['username'] . ":" . $apiParams['password']);
        $uri = $apiParams['endpoint'] . '/'. $this->getResourceName();
        if (!is_null($this->resourceId)) {
            $uri = $uri .'/'. $this->resourceId;
        }
        var_dump($uri);
        $response        = Request::get($uri)
            ->addHeaders(
                array(
                    'Authorization' => $basicAuthString,
                    'Content-Type'  => 'application/vnd.listing.' . $apiParams['version'] . '+json',
                )
            )
            ->send();

        if($response->hasErrors()) {
            var_dump($response->raw_body);
            die('found errors');
        }
        $this->fromJson(json_decode($response));

        // TODO: handle unexpected response (logging?)
        return $this;

    }

    /**
     * @return string resource name of the API
     */
    protected abstract function getResourceName();

    /**
     * @param \stdClass $data
     */
    private function fromJson($data) {

        var_dump($data);
        $vars = get_object_vars($data);
        // TODO: map whole depth of the object
        foreach ($vars as $key => $value) {
            $property        = Utility::underscoreToCamelCase($key);
            $this->$property = $value;
        }
    }

    /**
     * @return string $body
     */
    private function toJson() {
        $vars = get_object_vars($this);
        $props = array();
        foreach ($vars as $key => $value) {
            $property        = Utility::camelCaseToUnderscore($key);
            $props[$property] = $value;
        }
        return $props;
    }

}