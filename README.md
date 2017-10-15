# grinc/grtags

Hashtags package used in projects in Laravel of technology companies of GR Group

# Installation

Execute the following composer command.

```
composer require gr-group/grtags
```


Register the service provider in config/app.php file.  
If you are in L5.5+ you don't need the 

```php
'providers' => [
	...
	GRGroup\GRTags\GRTagsServiceProvider::class,
]
```