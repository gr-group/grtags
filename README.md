# grinc/grtags

Simple Hashtags package used in projects in Laravel of technology companies of GR Group

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

after run artisan vendor publish

```
artisan vendor:publish --provider="GRGroup\GRTags\GRTagsServiceProvider"
```

migrate tables

```
artisan migrate
```


## Methods

#### Retrieve all tags model polymorph

```
Model::find(1)->tags;
Model::find(1)->tags()->get();
Model::find(1)->tags()->paginate(10);
```

#### Add tag for source

```
Model::find(1)->addTag('#tagname');
```

#### Add multiple tags

```
Model::find(1)->addTags([
	'#tag1',
	'#tag2'
]);
```

#### Add multiple tags and detect such tags in a string

```
Model::find(1)->addTags('#hashtag #first signup test');
```

#### Get all tags from source

```
Model::find(1)->allTags()->get();
Model::find(1)->allTags()->paginate(10);
```

#### Delete all tags from source

```
Model::find(1)->deleteAllTags();
```

#### Delete tag by id from source

```
Model::find(1)->deleteTagById(10);