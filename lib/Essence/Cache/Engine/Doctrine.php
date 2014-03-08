<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Cache\Engine;

use Blunt\Cache\Engine;
use Doctrine\Common\Cache\Cache as DoctrineCache;



/**
 *	A bridge to use a Doctrine cache.
 *
 *	@package fg.Essence.Cache.Engine
 */

class Doctrine implements Engine {

	/**
	 *	The Doctrine cache instance.
	 *
	 *	@var Doctrine\Common\Cache
	 */

	protected $_Cache = null;



	/**
	 *	The lifeTime to be passed to the save( ) method.
	 *
	 *	@var int
	 */

	protected $_ttl = 0;



	/**
	 *	Constructor.
	 *
	 *	@param Doctrine\Common\Cache $Cache The Doctrine cache to use.
	 *	@param int $ttl The lifeTime to be passed to the save( ) method.
	 */

	public function __construct( DoctrineCache $Cache, $ttl = 0 ) {

		$this->_Cache = $Cache;
		$this->_ttl = $ttl;
	}



	/**
	 *	{@inheritDoc}
	 */

	public function has( $key ) {

		return $this->_Cache->contains( $key );
	}



	/**
	 *	{@inheritDoc}
	 */

	public function get( $key, $default = null ) {

		$data = $this->_Cache->fetch( $key );

		return ( $data === false )
			? $default
			: $data;
	}



	/**
	 *	{@inheritDoc}
	 */

	public function set( $key, $data ) {

		$this->_Cache->save( $key, $data, $this->_ttl );
	}
}
