<?php
$_includePaths = array_unique(explode(PATH_SEPARATOR, get_include_path()));
if (($pos = array_search('.', $_includePaths, true)) !== false) unset($_includePaths[$pos]);
array_unshift($_includePaths, dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'wind');
array_unshift($_includePaths, dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . '_tests');
if (set_include_path('.' . PATH_SEPARATOR . implode(PATH_SEPARATOR, $_includePaths)) === false) {
	throw new Exception('set include path error.');
}
require_once ('BaseTestCase.php');
?>