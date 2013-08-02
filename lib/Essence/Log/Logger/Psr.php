<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Log\Logger;

use Essence\Log\Logger;
use Psr\Log\LoggerInterface;



/**
 *	A bridge to use a PSR logger.
 *
 *	@note This can be used to integrate Monolog (https://github.com/Seldaek/monolog),
 *		which implements the PSR logger interface.
 *	@package fg.Essence.Log.Logger
 */

class Psr implements Logger {

	/**
	 *	The PSR logger.
	 *
	 *	@var Psr\Log\LoggerInterface
	 */

	protected $_Logger = null;



	/**
	 *	Sets the logger to use.
	 *
	 *	@param Psr\Log\LoggerInterface $Logger Logger.
	 */

	public function __construct( LoggerInterface $Logger ) {

		$this->_Logger = $Logger;
	}



	/**
	 *	{@inheritDoc}
	 */

	public function log( $level, $message, array $context = array( )) {

		$this->_Logger->log( $level, $message, $context );
	}
}
