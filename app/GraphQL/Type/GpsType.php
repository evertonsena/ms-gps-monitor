<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class GpsType extends BaseType
{
    protected $attributes = [
        'name' => 'Gps',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],

            'latitude' => [
                'type' => Type::string()
            ],

            'longitude' => [
                'type' => Type::string()
            ],

            'imei' => [
                'type' => Type::string()
            ],

            'speed' => [
                'type' => Type::string()
            ],

            'direction' => [
                'type' => Type::string()
            ],

            'gps_time' => [
                'type' => Type::string()
            ],

            'created_at' => [
                'type' => Type::string()
            ],

            'updated_at' => [
                'type' => Type::string()
            ]
        ];
    }
}
