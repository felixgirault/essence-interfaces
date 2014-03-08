<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Http\Client;

use Blunt\Http\Client;
use Blunt\Http\Exception;
use HttpSocket;



/**
 *	A bridge to use a CakePHP HTTP socket.
 *
 *	@package fg.Essence.Http.Client
 */

class Cake implements Client {

	/**
	 *	The HttpSocket.
	 *
	 *	@var HttpSocket
	 */

	protected $_Socket = null;



	/**
	 *	Sets the socket to use.
	 *
	 *	@param HttpSocket $Socket Socket.
	 */

	public function __construct( HttpSocket $Socket ) {

		$this->_Socket = $Socket;
	}



	/**
	 *	{@inheritDoc}
	 */

	public function get( $url ) {

		$Response = $this->_Socket->get( $url );

		if ( !$Response->isOk( )) {
			throw new Exception( $url, $Response->code );
		}

		return $Response->body( );
	}
}
