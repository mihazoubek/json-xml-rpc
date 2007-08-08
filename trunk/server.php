<?php
require_once('RPCServer.class.php');



//class Point2D {
//   var $x, $y;
//   var $label;
//
//   function Point2D($x, $y)
//   {
//       $this->x = $x;
//       $this->y = $y;
//	   
//   }
//
//   function setLabel($label)
//   {
//       $this->label = $label;
//   }
//
//   function getPoint()
//   {
//       return array("x" => $this->x,
//                    "y" => $this->y,
//                    "label" => $this->label);
//   }
//}
//
//// "$label" is declared but not defined
//$p1 = new Point2D(1.233, 3.445);
//
//$p1->setLabel("point #1");


$server = RPCServer::getInstance();
$server->name = "Test JSON/XML-RPC Server";
$server->id   = "urn:uuid:41544946-415a-495a-5645-454441534646";
$server->version = 1.0;

$server->convertISO8601Strings(true);
$server->preserveDefaultParameters(true);

#$server->useIncludedFunctions(true);
#require_once('miscFunctions.php');
#$server->addMethod('printBio', 'printBio');

function passThrough(/*...*/){
	#throw new Exception("You are an idiot");
	return func_get_args();
}
$server->addMethod("passThrough");

function getServerSource(){
	return fopen("server.php", 'r');
}
$server->addMethod("getServerSource");

#$server->setJSONDateFormat('ASP.NET');
#$server->setJSONDateFormat('classHinting');
#$server->setJSONDateFormat('@ticks@');
#$server->setJSONDateFormat('ISO8601');
#$server->setDBResultIndexType('ASSOC');
#$server->setDBResultIndexType('NUM');

#print json_decode('asdsd"\\s\td\nsd"');

$server->processRequest();

#print_r(json_decode('{"__jsonclass__":["Date", [455414400000]]}'));
#print_r(json_decode('["asd","455414400000"]', true));
#print 455414400000;

#print base64_encode("I am saying, Hello world");

?>