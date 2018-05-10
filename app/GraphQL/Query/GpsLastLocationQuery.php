<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Models\Gps;

class GpsLastLocationQuery extends Query
{
    protected $attributes = [
        'name' => 'GpsLastLocation',
        'description' => 'Retorna a ultima localização com base no imei informado'
    ];

    public function type()
    {
        return GraphQL::type('Gps');
    }

    public function args()
    {
        return [
            'imei' => [
                'type' => Type::nonNull(Type::string())
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Gps::where('imei', '=', $args['imei'])
               ->orderBy('gps_time', 'desc')
               ->first();
    }
}