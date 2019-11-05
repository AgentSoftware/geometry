<?php

use Geometry\PointLocation;

class PointLocationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider data
     * @param string $point
     * @param string $expected
     */
    public function test_pointLocation($point, $expected)
    {
        $pointLocation = new PointLocation();
        $polygon = array("-50 30", "50 70", "100 50", "80 10", "110 -10", "110 -30", "-20 -50", "-30 -40", "10 -10", "-10 10", "-30 -20", "-50 30");
        $result = $pointLocation->pointInPolygon($point, $polygon);
        $this->assertEquals($result, $expected);
    }

    public function data()
    {
        return array(
            array('50 70', 'vertex'),
            array('70 40', 'inside'),
            array('-20 30', 'inside'),
            array('100 10', 'outside'),
            array('-10 -10', 'outside'),
            array('40 -20', 'inside'),
            array('110 -20', 'boundary'),
        );
    }
}