<?php

/*
 * Agency Core Accounting API
 *
 * This interface defines the methods required for all models.
 *
 * Copyright (c) 2015 Agency Core.
 * Free to use under the MIT licence, for full details view the LICENCE file.
 *
 */

namespace Accounting\Interfaces;

interface Model
{
    /*
     * Convert model to API compatible format
     *
     */
    public function encode();
    
    /*
     * Convert API response back to model
     *
     * Static function that creates a model $object,
     * which could later be encoded again with encode()
     *
     */
    public static function decode( $data );
    
    /*
     * Get unique id after object creationg
     *
     * Static function that grabs a UID for object from API response
     *
     */
    public static function uid( \Accounting\Interfaces\Model $model, $data );
}