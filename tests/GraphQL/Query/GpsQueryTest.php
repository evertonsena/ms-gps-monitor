<?php
namespace Tests\GraphQL\Query;

use App\GraphQL\Query\GpsQuery;
use Tests\TestCase;
use App\Models\Gps;

class GpsQueryTest extends TestCase
{
    public function testResolveReturnGpsWhenItExists()
    {
        $gpsData = factory(Gps::class)->create();
        $query = new GpsQuery();
        $result = $query->resolve(NULL, ['id' => $gpsData->id]);

        $this->assertInstanceOf(Gps::class, $result);
        $this->assertEquals($gpsData->getAttributes(), $result->getAttributes());
    }
}