<?php

use League\Geotools\Polygon\Polygon;
use Geometry\PolygonHelper;

class PolygonHelperTest extends PHPUnit_Framework_TestCase
{

    public function testContains()
    {
        $lat = 53.5237864;
        $lng = -2.3935961;
        $points = array(
            array('53.52645417204351', '-2.409935266839625'),
            array('53.52941335555512', '-2.3825123618713633'),
            array('53.52002488849128', '-2.3825123618713633'),
            array('53.52002488849128', '-2.379122049676539'),
            array('53.519387009536516', '-2.3947432349792734'),
        );
        $polygon = new Polygon($points);
        $polygonHelper = new PolygonHelper($polygon->getCoordinates());
        $polygonHelper->contains(new \League\Geotools\Coordinate\Coordinate(array($lat, $lng)));
    }
}
