<?php

require 'TestWS.php';

$a = new TestWS();
$r1 = new RealClass1();
$r1->prop = "prop";
$r1->prop1 = "prop1";
$m = new TestMethod();
$m->testObj = $r1;
$a->TestMethod($m);

/*
Result OK, there is xsi:type for testObj 

<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://tempuri.org/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
<SOAP-ENV:Body>
<ns1:TestMethod>
<ns1:testObj xsi:type="ns1:RealClass1">
<ns1:prop>prop</ns1:prop>
<ns1:prop1>prop1</ns1:prop1>
</ns1:testObj>
</ns1:TestMethod>
</SOAP-ENV:Body>
</SOAP-ENV:Envelope>
 */