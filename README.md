Essence interfaces
==================

* [Doctrine cache](#doctrine-cache)
* [Zend cache](#zend-cache)

Doctrine cache
--------------

```php
$Cache = new Essence\Cache\Engine\Doctrine(
	new Doctrine\Common\Cache\FilesystemCache( 'path/to/directory' ),
	$ttl
);
```

Zend cache
----------

```php
$Cache = new Essence\Cache\Engine\Zend(
	Zend\Cache\StorageFactory::adapterFactory( 'apc' )
);
```
