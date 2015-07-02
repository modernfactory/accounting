<?php

/*
 * Agency Core Accounting API
 *
 * This trait wraps response from requests in a standard format
 *
 * Copyright (c) 2015 Agency Core.
 * Free to use under the MIT licence, for full details view the LICENCE file.
 *
 */

namespace Accounting\Traits;

trait StandardResponse
{
    /**
     * Instantiate Access
     *
     */
    public function response( $data, $status, $time = null )
    {
        $response = new \stdClass();
        $response->data   = $data;
        $response->status = $status;
        if ( $time ) $response->time   = $time;
        return $response;
    }
}