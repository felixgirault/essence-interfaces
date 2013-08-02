Essence interfaces
==================

A set of interfaces to use third-party libraries within Essence.

* [Usage](#usage)
* [Cache interfaces](#cache-interfaces)
* [Http interfaces](#http-interfaces)

Usage
-----

Here is how to use a Doctrine cache throughout the application:

```php
$Essence = Essence\Essence::instance( array(
	'Cache' => Essence\Di\Container::unique( function( ) {
		return new Essence\Cache\Engine\Doctrine(
			new Doctrine\Common\Cache\FilesystemCache( 'path/to/cache/directory' )
		);
	})
));
```

Cache interfaces
----------------

### CakePHP

```php
$Cache = new Essence\Cache\Engine\Cake( 'configuration' );
```

### Doctrine

```php
$Cache = new Essence\Cache\Engine\Doctrine(
	new Doctrine\Common\Cache\FilesystemCache( 'path/to/cache/directory' ),
	$ttl
);
```

### Zend

```php
$Cache = new Essence\Cache\Engine\Zend(
	Zend\Cache\StorageFactory::adapterFactory( 'apc' )
);
```

HTTP interfaces
---------------

### CakePHP

```php
$Http = new Essence\Http\Client\Cake( new HttpSocket( ));
```

Log interfaces
---------------

### PSR/Monolog

```php
$Log = new Essence\Log\Logger\Psr( new CustomPsrLogger( ));
```

```php
$Monolog = new Monolog\Logger( 'essence' );
$Monolog->pushHandler(
	new Monolog\Handler\StreamHandler( 'path/to/log/file' )
);

$Log = new Essence\Log\Logger\Psr( $Monolog );
```
