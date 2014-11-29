<?php

use paslandau\JsonUtility\JsonPathWrapper;
use Peekmo\JsonPath\JsonStore;

class JsonPathWrapperTest extends PHPUnit_Framework_TestCase {

    private $wellformed;
    private $malformed;
    /** @var  JsonPathWrapper */
    private $jsonPath;

    public function setUp(){
        $path = __DIR__."/resources/wellformed.json";
        $this->wellformed = file_get_contents($path);
        $path = __DIR__."/resources/malformed.json";
        $this->malformed = file_get_contents($path);
        // TODO: Use Mock. Currently not done 'cause I'm not convinced by the JsonStore functionality...
        $this->jsonPath = new JsonPathWrapper(new JsonStore());
    }

    public function testTrue()
    {
        $tests = array(
            "$..header" => [1, "Straßenschäden"],
            "$..ul[1]" => [1, "bar"],
            "$..ul[*]" => [4, "foo\nbar\nbaz\n"]
        );
        foreach($tests as $expression => $vals){
            $count = $vals[0];
            $expected = $vals[1];
            $actual = $this->jsonPath->query(json_decode($this->wellformed,true),$expression);
            $msg = "Expected Count: ".count($actual)." == $count using $expression";
            $this->assertCount($count, $actual, $msg);
            $str = implode("\n",$actual);
            $msg = "Expected: $str == $expected using $expression";
            $this->assertEquals($expected, $str, $msg);
        }
    }

    public function testFalse()
    {
        $tests = array(
            "$..header" => [2, "wrong"],
            "$..ul[1]" => [2, "wrong"],
            "$..ul[*]" => [3, "wrong\nwrong\nwrong\nwrong"]
        );
        foreach($tests as $expression => $vals){
            $count = $vals[0];
            $expected = $vals[1];
            $actual = $this->jsonPath->query(json_decode($this->wellformed,true),$expression);
            $msg = "Expected Count: ".count($actual)." == $count using $expression";
            $this->assertNotCount($count, $actual, $msg);
            $str = implode("\n",$actual);
            $msg = "Expected: $str == $expected using $expression";
            $this->assertNotEquals($expected, $str, $msg);
        }
    }
    public function testMalformedJson() {
        $this->setExpectedException ( InvalidArgumentException::class );
        $this->jsonPath->query($this->malformed,"");
    }
}
 