<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Cache\Engine;

use Essence\Cache\Engine;
use Zend\Cache\Storage\StorageInterface as ZendCache;



/**
 *	A bridge to use a Zend cache.
 *
 *	@package fg.Essence.Cache.Engine
 */

class Zend implements Engine {

	/**
	 *	The Zend cache instance.
	 *
	 *	@var Zend\Cache\Storage\StorageInterface
	 */

	protected $_Cache = null;



	/**
	 *	Constructor.
	 *
	 *	@param Zend\Cache\Storage\StorageInterface $Cache The Zend cache to use.
	 */

	public function __construct( ZendCache $Cache ) {

		$this->_Cache = $Cache;
	}



	/**
	 *	{@inheritDoc}
	 */

	public function has( $key ) {

		return $this->_Cache->hasItem( $key );
	}



	/**
	 *	{@inheritDoc}
	 */

	public function get( $key, $default = null ) {

		$data = $this->_Cache->getItem( $key, $success );

		return $success
			? $data
			: $default;
	}



	/**
	 *	{@inheritDoc}
	 */

	public function set( $key, $data ) {

		$this->_Cache->setItem( $key, $data );
	}
}
