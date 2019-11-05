<?php

namespace Geometry;
use League\Geotools\Coordinate\Coordinate;

class PolygonHelper
{
    /** @var array */
    private $points = array();

    /**
     * PolygonHelper constructor.
     * @param array|string|Coordinate $data
     */
    public function __construct($data)
    {
        foreach ($data as $point) {
            $point = self::pointCoordinatesToString($point);
            $this->points[] = $point;
        }
    }

    /**
     * @param array|string|Coordinate $point
     * @param bool $pointOnVertex
     * @return string
     */
    public function contains($point, $pointOnVertex = true)
    {
        $point = self::pointCoordinatesToString($point);
        $pointLocation = new PointLocation();
        return $pointLocation->pointInPolygon($point, $this->points, $pointOnVertex);
    }

    /**
     * @param array|string|Coordinate $point
     * @return string
     */
    private static function pointCoordinatesToString($point)
    {
        if (is_array($point)) {
            $point = sprintf('%s %s', $point[0], $point[1]);
        } elseif ($point instanceof Coordinate) {
            $point = sprintf('%s %s', $point->getLatitude(), $point->getLongitude());
        }
        return $point;
    }
}
