<?php

/*
 * Agency Core Accounting API
 *
 * This trait provides methods to switch dates between API and database
 *
 * Copyright (c) 2015 Agency Core.
 * Free to use under the MIT licence, for full details view the LICENCE file.
 *
 */

namespace Accounting\Traits;

trait Dated
{
    /**
     * Format date for APIs
     *
     */
    static public function apiDate( $date )
    {
        return date('Y-m-d\TH:i:s', strtotime( $date ));
    }
    
    /**
     * Format date for DB
     *
     */
    static public function dbDate( $date )
    {
        return date('Y-m-d H:i:s', strtotime( $date ));
    }
}