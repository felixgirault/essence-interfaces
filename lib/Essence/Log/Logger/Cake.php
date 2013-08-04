<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Log\Logger;

use Essence\Log\Logger;
use CakeLog;



/**
 *	A bridge to use a CakePHP logger.
 *
 *	@package fg.Essence.Log.Logger
 */

class Cake implements Logger {

	/**
	 *	Scope(s) for log message.
	 *
	 *	@var string|array
	 */

	protected $_scope = array( );



	/**
	 *	Sets the scope to use.
	 *
	 *	@param string|array $scope The scope a log message is being created in.
	 */

	public function __construct( $scope = array( )) {

		$this->_scope = $scope;
	}



	/**
	 *	{@inheritDoc}
	 */

	public function log( $level, $message, array $context = array( )) {

		CakeLog::write( $level, $message, $this->_scope );
	}
}
