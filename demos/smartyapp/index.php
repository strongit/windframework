<?php
/**
 * @author Qiong Wu <papa0924@gmail.com> 2010-11-6
 * @link http://www.phpwind.com
 * @copyright Copyright &copy; 2003-2110 phpwind.com
 * @license
 */
header("Content-type: text/html; charset=gbk");
define('R_P', dirname(__FILE__));
define('F_P', R_P . '/../../wind/');
define('C_P', R_P . '/wind/');

//require_once (R_P . '/data/config.php');
require_once (F_P . '/wind.php');

W::setApps('SMARTY', array('rootPath' => R_P), true);

WindFrontController::getInstance()->run();
