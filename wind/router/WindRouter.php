<?php
Wind::import('WIND:router.AbstractWindRouter');
/**
 * the last known user to change this file in the repository  <$LastChangedBy$>
 * @author Qiong Wu <papa0924@gmail.com>
 * @version $Id$
 * @package 
 */
class WindRouter extends AbstractWindRouter {

	/* (non-PHPdoc)
	 * @see IWindRouter::route()
	 */
	public function route() {
		$this->setCallBack(array($this, 'defaultRoute'));
		$params = $this->getHandler()->handle();
		$this->setParams($params);
	}

	/* (non-PHPdoc)
	 * @see AbstractWindRouter::assemble()
	 */
	public function assemble($action, $args = array(), $route = null) {
		$route || $route = $this->defaultRoute;
		if ($route && (null !== $route = $this->getRoute($route))) {
			$_url = $route->build($this, $action, $args);
		} else {
			list($_a, $_c, $_m, $args) = WindUrlHelper::resolveAction($action, $args);
			$args[$this->moduleKey] = $_m ? $_m : $this->module;
			$args[$this->controllerKey] = $_c ? $_c : $this->controller;
			$args[$this->actionKey] = $_a ? $_a : $this->action;
			$_baseUrl = $this->getRequest()->getScript();
			$_url = $_baseUrl . '?' . WindUrlHelper::argsToUrl($args);
		}
		return $_url;
	}

	/**
	 * 默认路由规则
	 */
	public function defaultRoute() {
		$_pathInfo = $this->getRequest()->getPathInfo();
		return $_pathInfo ? WindUrlHelper::urlToArgs($_pathInfo) : array();
	}
}

?>