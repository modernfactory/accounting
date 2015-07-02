<?php

/*
 * Agency Core Accounting API
 *
 * This trait converts object types to namespace class paths
 * that can then be instantiated or used to access static classes
 *
 * Copyright (c) 2015 Agency Core.
 * Free to use under the MIT licence, for full details view the LICENCE file.
 *
 */

namespace Accounting\Traits;

trait Inflect
{
    /**
     * If debugging is on dump status, params and data
     *
     */
    public function inflect( $type )
    {
        if ( is_a($type, '\Accounting\Interfaces\Model') ) {
            // if we have a model, grab class name
            return '\\' . get_class( $type );
        } else {
            // if we just have a type string, then grab class name
            $namespace = $this->locate();
            return '\\' . $namespace . '\\' . ucfirst( $type );
        }
    }
}