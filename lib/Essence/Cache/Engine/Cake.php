<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Cache\Engine;

use Essence\Cache\Engine;
use Cache;



/**
 *	A bridge to use a CakePHP cache.
 *
 *	@package fg.Essence.Cache.Engine
 */

class Cake implements Engine {

	/**
	 *	The cache config.
	 *
	 *	@var string
	 */

	protected $_config = '';



	/**
	 *	Sets the config to use.
	 *
	 *	@param string $config Config.
	 */

	public function __construct( $config = 'default' ) {

		$this->_config = $config;
	}



	/**
	 *	{@inheritDoc}
	 */

	public function has( $key ) {

		return ( Cache::read( $key, $this->_config ) !== false );
	}



	/**
	 *	{@inheritDoc}
	 */

	public function get( $key, $default = null ) {

		$data = Cache::read( $key, $this->_config );

		return ( $data === false )
			? $default
			: $data;
	}



	/**
	 *	{@inheritDoc}
	 */

	public function set( $key, $data ) {

		Cache::write( $key, $data, $this->_config );
	}
}
