<?php

/*
 * Agency Core Accounting API
 *
 * This interface defines the methods required for getting access tokens.
 * Typically for OAuth APIs such as FreeAgent and Xero.
 *
 * Copyright (c) 2015 Agency Core.
 * Free to use under the MIT licence, for full details view the LICENCE file.
 *
 */

namespace Accounting\Interfaces;

interface Access
{
    /*
     * Instantiate access and grab API
     *
     */
    public function __construct( \Accounting\Abstracts\Api $api );

    /*
     * Get authentication link
     *
     * Provide redirect url, redirect url should handle auth $code with token() below
     *
     */
    public function link( $redirect, $echo = true );
    
    /*
     * Get refresh token (which can be traded for an access token)
     *
     * Provide auth $code (token) that is returned after redirection from link() above
     *
     */
    public function token( $code, array $options = array() );
    
    /*
     * Refresh the access token
     *
     * Provide the refresh $token and retrieve a new access token
     *
     */
    public function refresh( $token );
}