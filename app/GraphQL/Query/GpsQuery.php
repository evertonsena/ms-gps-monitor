<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Models\Gps;

class GpsQuery extends Query
{
    protected $attributes = [
        'name' => 'Gps',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::type('Gps');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return Gps::find($args['id']);
    }
}
