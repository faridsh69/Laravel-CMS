<?php

namespace App\Enums;

Trait CastsEnums
{
    /**
     * Get a plain attribute (not a relationship).
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttributeValue($key)
    {
        $value = parent::getAttributeValue($key);
        if ($this->hasEnumCast($key)) {
            $value = $this->castToEnum($key, $value);
        }
        return $value;
    }

    /**
     * Set a given attribute on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return $this
     */
    // public function setAttribute($key, $value)
    // {
    //     if ($value !== null && $this->hasEnumCast($key)) {
    //         if ($this->hasCast($key)) {
    //             $value = $this->castAttribute($key, $value);
    //         }
    //         $enum = $this->enumCasts[$key];
    //         if ($value instanceOf $enum) {
    //             $this->attributes[$key] = $value->value;
    //         } else {
    //             $this->attributes[$key] = $enum::getInstance($value)->value;
    //         }
    //         return $this;
    //     }
    //     parent::setAttribute($key, $value);
    // }

    /**
     * Determine whether an attribute should be cast to a enum.
     *
     * @param  string  $key
     * @return bool
     */
    public function hasEnumCast($key): bool
    {
        return array_key_exists($key, $this->enumCasts);
    }

    protected function castToEnum($key, $value)
    {
        /** @var \BenSampo\Enum\Enum $enum */
        $enum = $this->enumCasts[$key];
        if ($value === null || $value instanceOf Enum) {
            return $value;
        }
        return $enum::getInstance($value);
    }
}
