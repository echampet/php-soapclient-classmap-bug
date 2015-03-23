<?php
class AbstractClass {
	/** @var string */	public $prop;
}

class RealClass2 extends AbstractClass {
	/** @var string */	public $prop2;
}

class RealClass1 extends AbstractClass {
	/** @var string */	public $prop1;
}

class TestMethod {
	/** @var AbstractClass */	public $testObj;
}

class TestMethodResponse {
	/** @var string */	public $TestMethodResult;
}

class TestWS extends \SoapClient {

	private $classmap = array(
			'AbstractClass' => 'AbstractClass',
			'RealClass2' => 'RealClass2',
			'RealClass1' => 'RealClass1',
			'TestMethod' => 'TestMethod',
			'TestMethodResponse' => 'TestMethodResponse',
			);

	public function __construct($wsdl = null, $options = array()) {
		foreach($this->classmap as $key => $value) {
			if(!isset($options['classmap'][$key])) {
				$options['classmap'][$key] = $value;
			}
		}
		parent::__construct('../testws.wsdl', $options);
		if(isset($options['headers'])) {
			$this->__setSoapHeaders($options['headers']);
		}
	}

	public function TestMethod(TestMethod $parameters) {
		return $this->__soapCall('TestMethod', array($parameters), array(
						'uri' => 'http://tempuri.org/',
						'soapaction' => ''
					)
			);
	}

}


