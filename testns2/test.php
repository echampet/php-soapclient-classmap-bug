<?php

require 'TestWS.php';

$a = new \myNS\TestWS();
$r1 = new \myNS\RealClass1();
$r1->prop = "prop";
$r1->prop1 = "prop1";
$m = new \myNS\TestMethod();
$m->testObj = $r1;
$a->TestMethod($m);

/*
Result KO, testObj is downcasted to AbstractClass
classmap support 'myNS\RealClass1' but not '\myNS\RealClass1'

<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://tempuri.org/">
<SOAP-ENV:Body>
<ns1:TestMethod>
<ns1:testObj>
<ns1:prop>prop</ns1:prop>
</ns1:testObj>
</ns1:TestMethod>
</SOAP-ENV:Body>
</SOAP-ENV:Envelope>
 */