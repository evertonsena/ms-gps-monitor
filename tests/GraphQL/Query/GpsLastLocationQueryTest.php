<?php
namespace Tests\GraphQL\Query;

use App\GraphQL\Query\GpsLastLocationQuery;
use Tests\TestCase;
use App\Models\Gps;

class GpsLastLocationQueryTest extends TestCase
{
    public function testResolveReturnLastLocationWhenItExists()
    {
        $imei = '791906758560305';
        $locationFirst = factory(Gps::class)->create([
            'imei' => $imei,
            'gps_time' => date('ymdhis', strtotime("-2 hours", time()))
        ]);
        $locationLast = factory(Gps::class)->create([
            'imei' => $imei
        ]);
        $query = new GpsLastLocationQuery();
        $result = $query->resolve(NULL, ['imei' => $imei ]);

        $this->assertInstanceOf(Gps::class, $result);
        $this->assertEquals($locationLast->getAttributes(), $result->getAttributes());
    }
}