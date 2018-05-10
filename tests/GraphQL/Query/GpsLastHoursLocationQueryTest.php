<?php
namespace Tests\GraphQL\Query;

use App\GraphQL\Query\GpsLastHoursLocationQuery;
use Tests\TestCase;
use App\Models\Gps;

class GpsLastHoursLocationQueryTest extends TestCase
{
    public function testResolveReturnLastHoursLocationWhenItExists()
    {
        $imei = '791906758560305';
        $locationNow = factory(Gps::class)->create([
            'imei' => $imei
        ]);
        $locationOneHourBefore = factory(Gps::class)->create([
            'imei' => $imei,
            'gps_time' => date('ymdhis', strtotime("-1 hours", time()))
        ]);
        $locationTwoHourBefore = factory(Gps::class)->create([
            'imei' => $imei,
            'gps_time' => date('ymdhis', strtotime("-2 hours", time()))
        ]);
        $locationTwoHourBefore = factory(Gps::class)->create([
            'imei' => $imei,
            'gps_time' => date('ymdhis', strtotime("-3 hours", time()))
        ]);
        $locationNowOtherImei = factory(Gps::class)->create();

        $query = new GpsLastHoursLocationQuery();
        $result = $query->resolve(NULL, ['imei' => $imei, 'hours' => 2 ]);

        $this->assertCount(3, $result);
        $this->assertEquals($locationNow->getAttributes(), $result[0]->getAttributes());
    }
}