Essence interfaces
==================

A set of interfaces to use third-party libraries within Essence.

* [Usage](#usage)
* [Cache interfaces](#cache-interfaces)

Usage
-----

For example, here is how to use a Doctrine cache throughout the application:

```php
$Container = new Essence\Di\Container\Standard( );

$Container->set( 'Cache', Essence\Di\Container::unique( function( ) {
	return new Essence\Cache\Engine\Doctrine(
		new Doctrine\Common\Cache\FilesystemCache( 'path/to/directory' )
	);
}));

$Essence = $Container->get( 'Essence' );
```

Cache interfaces
----------------

### Doctrine cache

```php
$Cache = new Essence\Cache\Engine\Doctrine(
	new Doctrine\Common\Cache\FilesystemCache( 'path/to/directory' ),
	$ttl
);
```

### Zend cache

```php
$Cache = new Essence\Cache\Engine\Zend(
	Zend\Cache\StorageFactory::adapterFactory( 'apc' )
);
```
