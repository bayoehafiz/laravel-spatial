<?php

namespace Grimzy\LaravelMysqlSpatial\Eloquent;

use Illuminate\Database\Query\Expression;

/**
 * Removes the ST_GeomFromText 'axis-order=long-lat' argument that fails on MariaDB.
 */
class SpatialExpression extends Expression
{
    public function getValue()
    {
        return "ST_GeomFromText(?, ?)";
    }

    public function getSpatialValue()
    {
        return $this->value->toWkt();
    }

    public function getSrid()
    {
        return $this->value->getSrid();
    }
}
