<?php
namespace paslandau\JsonUtility;

use Peekmo\JsonPath\JsonStore;

class JsonPathWrapper implements JsonPathInterface{

    /**
     * @var JsonStore
     */
	private $store;
	
	public function __construct($store){
		$this->store = new JsonStore();
	}

    /**
     * @param \string[]|string $json
     * @param string $jsonPathExpression
     * @return array|\string[]
     */
	public function query($json, $jsonPathExpression){
        $obj = $json;
        if(is_string($json)){
            $obj = json_decode($json,true);
            if (!$json) {
                throw new \InvalidArgumentException("Invalid JSON input:\n$json");
            }
        }
        if(!is_array($obj)){
            throw new \InvalidArgumentException("json should ne an array");
        }
		return $this->store->get($obj, $jsonPathExpression);
	}
}