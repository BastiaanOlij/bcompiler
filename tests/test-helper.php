<?php

function _make_bytecode($sname, $tname) {
  $s = join('', file($sname));
  if (!preg_match("|--FILE--\r?\n.*//--CODE--\r?\n(.*)--EXPECT--|s", $s, $res)) echo "no\n";


  $f = fopen($tname.".in", "w");
  fwrite($f, "<?php\n".trim($res[1]));
  fclose($f);

  $f = fopen($tname, "w");
  bcompiler_write_header($f);
  $rc = bcompiler_write_file($f, $tname.".in");
  bcompiler_write_footer($f);
  fclose($f);

  @unlink($tname.".in");
}

function make_phpcode($sname, $tname) {
  $s = join('', file($sname));
  preg_match("|--FILE--\r?\n.*?/?/?--CODE--\r?\n(.*)--EXPECT|s", $s, $res) or die("skip missing CODE section at $sname");

  $f = fopen($tname, "w");
  fwrite($f, "<?php\n".trim($res[1]));
  fclose($f);
}

function make_bytecode($sname, $tname) {
  check_bcompiler();

  make_phpcode($sname, $tname.".in");

  $f = fopen($tname, "w");
  bcompiler_write_header($f);
  $rc = bcompiler_write_file($f, $tname.".in");
  bcompiler_write_footer($f);
  fclose($f);

  @unlink($tname.".in");
}

function check_bcompiler() {
  if (!extension_loaded("bcompiler")) die("skip bcompiler isn't loaded");
}

?>
