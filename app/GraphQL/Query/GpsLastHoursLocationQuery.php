<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Models\Gps;


class GpsLastHoursLocationQuery extends Query
{
    protected $attributes = [
        'name' => 'GpsLastHoursLocation',
        'description' => 'Retorna as localizações com base no imei e intervalo ' .
                         'de horas informados.'
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
            'hours' => [
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $dateStart = date('ymdhis');
        $dateEnd = date("ymdhis", strtotime("-2 hours", time()));
        return Gps::where('imei', '=', $args['imei'])
            ->whereBetween('gps_time', [$dateEnd, $dateStart])
            ->orderBy('gps_time', 'desc')
            ->get();
    }
}