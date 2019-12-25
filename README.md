`````__`````# Laravel CRUD Generator

[![Build Status](https://travis-ci.org/duke/crud-generator.svg)](https://travis-ci.org/duke/crud-generator.svg)
[![Total Downloads](https://poser.pugx.org/duke/crud-generator/d/total.svg)](https://packagist.org/packages/duke/crud-generator)
[![Latest Stable Version](https://poser.pugx.org/duke/crud-generator/v/stable.svg)](https://packagist.org/packages/duke/crud-generator)
[![License](https://poser.pugx.org/duke/crud-generator/license.svg)](https://packagist.org/packages/duke/crud-generator)

This Generator package provides various generators like CRUD, API, Controller, Model, Migration, View for your painless development of your applications.

## Requirements
    Laravel >= 5.3
    PHP >= 5.6.4

## Installation
```
composer require duke/crud-generator --dev
```
```
php artisan vendor:publish --provider="Duke\CrudGenerator\CrudGeneratorServiceProvider"
```

```

'aliases' => [
    ...
    'Excel' => Duke\CrudGenerator\Facades\Excel::class,
]
```
## Usage

CRUD fields from a JSON file:

```json
{
    "fields": [
        {
            "name": "title",
            "type": "string"
        },
        {
            "name": "content",
            "type": "text"
        },
        {
            "name": "category",
            "type": "select",
            "options": {
                "technology": "Technology",
                "tips": "Tips",
                "health": "Health"
            }
        },
        {
            "name": "user_id",
            "type": "integer#unsigned"
        }
    ],
    "foreign_keys": [
        {
            "column": "user_id",
            "references": "id",
            "on": "users",
            "onDelete": "cascade"
        }
    ],
    "relationships": [
        {
            "name": "user",
            "type": "belongsTo",
            "class": "App\\User"
        }
    ],
    "validations": [
        {
            "field": "title",
            "rules": "required|max:10"
        }
    ]
}
```
```
php artisan crud:generate Posts --fields_from_file="/path/to/fields.json" --view-path=admin --controller-namespace=Admin --route-group=admin --form-helper=html
```
"# duke" 
