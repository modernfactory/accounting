<?php

/*
 * Agency Core Accounting API
 *
 * This trait provides a method for debugging our wrapper
 *
 * Copyright (c) 2015 Agency Core.
 * Free to use under the MIT licence, for full details view the LICENCE file.
 *
 */

namespace Accounting\Traits;

trait Debugger
{
    /**
     * If debugging is on dump status, params and data
     *
     */
    public function debugger( $endpoint, $status, $params, $data, $paramString = false, $paramStringFormat = true )
    {
        if ( $this->debug )
        {
            print_r( 'ENDPOINT: ' );
            var_dump( $endpoint );
            print_r( 'STATUS: ' );
            var_dump( $status );
            print_r( 'PARAMS: ' );
            if ( $paramString )
                echo $paramStringFormat ? '<br /><br />' . htmlentities($params) . '<br /><br />' : $params;
            else
                var_dump( $params );
            print_r( 'DATA: ' );
            var_dump( $data );
            exit;
        }
    }
}