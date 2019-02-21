<?php

namespace WebDollar\Client\Model;

/**
 * Class AbstractModel
 * @package WebDollar\Client\Model
 */
abstract class AbstractModel
{
    /**
     * @param array $values
     *
     * @return static
     */
    public static function constructFrom(array $values)
    {
        $sClassName = static::class;

        $fCreateModel = \Closure::bind(
            function (array $values) use ($sClassName) {
                $oModel = new $sClassName();

                $oReflectionClass = new \ReflectionClass($oModel);

                foreach ($values as $sKey => $mValue)
                {
                    if ($oReflectionClass->hasProperty($sKey) === FALSE)
                    {
                        continue;
                    }

                    $oModel->{$sKey} = $mValue;
                }

                return $oModel;
            },
            NULL,
            $sClassName
        );

        return $fCreateModel($values);
    }
}
