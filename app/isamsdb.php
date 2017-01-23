<?php

namespace App;

use \GuzzleHttp\Client;

class Isamsdb
{
    /**
     * A new instance of \GuzzleHttp\Client;
     */
    protected $client;

    /**
     * The API request
     */
    protected $response;

    /**
     * The object returned by the API request
     */
    protected $body;

    /**
     * The HTTP method to make the request
     */
    private $httpMethod;

    /**
     * The desired content type to be returned. iSAMS currently allow XML or JSON. Defaults to JSON
     */
    private $contentType;

    /**
     * The base URI
     */
    private $uri;

    /**
     * A new instance of Isams
     * @return void
     */
    public function __construct($httpMethod = 'GET',$contentType = 'json')
    {
        $this->client = new Client();
        $this->setHttpMethod($httpMethod);
        $this->setContentType($contentType);
        $this->setUri();
        $this->request();
        $this->setBody();
    }

    /**
     * Send a request to the API
     * @return void
     */
    private function request()
    {
        $this->response = $this->client->request($this->httpMethod,$this->uri);
    }

    /**
     * Get the body returned by the API request (Guzzle getBody())
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the $body variable
     * @return void
     */
    private function setBody()
    {
        $this->body = json_decode($this->response->getBody());
    }

    /**
     * Set the $httpMethod variable
     */
    public function setHttpMethod($method)
    {
        $this->httpMethod = $method;
    }

    /**
     * Set the $contentType variable
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * Set the $uri variable
     */
    private function setUri()
    {
        $this->uri = "https://isamsweb.cranleigh.org/api/batch/1.0/".$this->contentType.".ashx?apiKey={".env('CS_ISAMS_API_KEY', 'secret')."}";
    }

    /**
     * Return the array of Pupils
     * @return array
     */
    public function pupils()
    {
        return $this->body->iSAMS->PupilManager->CurrentPupils->Pupil;  
    }

    /**
     * Return the array of Staff
     * @return array
     */
    public function staff()
    {
        return $this->body->iSAMS->HRManager->CurrentStaff->StaffMember;  
    }

    /**
     * Return the array of pupils flagged as NTC / Off Games
     * @return array
     */
    public function offGames()
    {
        return $this->body->iSAMS->OffGamesList->OffGames;  
    }

    /**
     * Return the array of pupils on the SEN Register
     * @return array
     */
    public function senRegister()
    {
        return $this->body->iSAMS->SENManager->SEN->Register;
    }

    /**
     * Return the array of Teaching Manager Departments
     * @return array
     */
    public function teachingManagerDepartments()
    {
        return $this->body->iSAMS->TeachingManager->Departments->Department;
    }
 
	/**
	 * Return the object just for that username search
	 * @return object
	 */
    public function findUserFromUsername($array,$username) 
    {
		return array_values(array_filter($array, function($arrayValue) use($username) { 
			return strtolower($arrayValue->Initials) == strtolower($username); 
		}))[0];
	}
}