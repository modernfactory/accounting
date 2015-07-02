<?php

/*
 * Agency Core Accounting API
 *
 * This trait provides methods for fetching OAuth tokens.
 *
 * Copyright (c) 2015 Agency Core.
 * Free to use under the MIT licence, for full details view the LICENCE file.
 *
 */

namespace Accounting\Traits;

trait AccessTokens
{
    /**
     * Instantiate Access class
     *
     */
    public function access()
    {
        $access = $this->locate() . '\Access';
        return new $access( $this );
    }
    
    /**
     * Refresh access token
     *
     * Provide refresh token to retrieve new access token
     *
     */
    public function refresh( $token )
    {
        $access = $this->access();
        return $access->refresh( $token );
    }
}