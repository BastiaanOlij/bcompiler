<?php
//--FILE--
/* NOTE! This file contains some names in Russian (encoding: koi8-r) */
//--CODE--
abstract class ����� {
  var $��� = "(base class)";
  function ����() { return $this->���; }
  abstract function show();
}
class ��������� extends ����� {
  var $sss;
  function ���������($v) {
    $this->sss[__CLASS__] = "(child class)"; 
    $this->sss[(binary)$v] = $v;
  }
  function ����() { return $this->sss["���������"].parent::����(); }
  function show() { echo $this->����(), "\n"; }
}

function ����($s) { return ucfirst($s); }

$name = "john doe";
$���  = &$name;
$���{5} = strtoupper($name{5});
$ref  = '���';
echo "Name: ".����($$ref)."\n";

$obj = new ���������($���);
$obj->show();
var_dump( strtolower($obj->sss[(binary)$name]) );

var_dump($obj->sss);
?>
--EXPECT--
