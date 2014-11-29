<?php
namespace paslandau\JsonUtility;

interface JsonPathInterface
{

    /**
     * @param string[] $jsonObj - associative JSON object
     * @param string $jsonPathExpression
     * @return string[]
     */
    public function query($jsonObj, $jsonPathExpression);

}