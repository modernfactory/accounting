<?php

/*
 * Agency Core Accounting API
 *
 * Abstracts, interfaces and traits to provide a unified access to key Xero, FreeAgent and Kashflow APIs.
 *
 * Copyright (c) 2015 Agency Core.
 * Free to use under the MIT licence, for full details view the LICENCE file.
 *
 */

namespace Accounting\Abstracts;

use Accounting\Exceptions\ClientException;
use Accounting\Exceptions\ServerException;
use Accounting\Exceptions\UnknownException;

abstract class Api
{
    /*
     * Default variables
     *
     */
    protected $sandbox = false;
    protected $debug = false;

    /*
     * Default endpoints (can and should be overwritten by child class)
     *
     */
    public $endpoints = [
        'customer' => 'customers',
        'supplier' => 'suppliers',
        'purchase' => 'purchases',
        'invoice'  => 'invoices',
        'credit'   => 'credits',
    ];

    /**
     * Fetch the API
     *
     * Mainly for facade integration, should handle refresh token if provided
     *
     */
    abstract public function fetch( $refresh = null );
    
    /**
     * Instatiate the API
     *
     * Provide any required tokens and prepare the wrapper for useage
     *
     */
    abstract public function setup( array $tokens = array() );

    /**
     * Configure the API
     *
     * Provide any auxiliary configuration, not all APIs will require this
     *
     */
    abstract public function auxiliary( array $params = array() );

    /**
     * Make an API request
     *
     * Make a request to the server
     *
     * NB: call() is often supplemented with request() which can have any definition
     *
     */
    abstract public function call( $endpoint, $verb, array $data = array() );

    /**
     * Find one or more models
     *
     * Should return single model object or array of objects
     *
     * $type - provide a type of object to find
     * $id   - optional, return all if $id is not provided
     *
     */
    abstract public function find( $type, $id = null );

    /**
     * Find one model and return qualified resource location
     *
     * $type - provide model to lookup
     *
     */
    abstract public function resource( \Accounting\Interfaces\Model $model );

    /**
     * Search for models
     *
     * Use search API if provider offers it, otherwise use find()
     * to get all records and then search with regex
     *
     * $type - provide a type of object to find
     * $name - name to search for
     *
     */
    abstract public function search( $type, $name );

    /**
     * Save a model
     *
     * Class should make use of type detector() to determine which endpoint to use
     *
     */
    abstract public function save( \Accounting\Interfaces\Model $model );

    /**
     * Delete a model
     *
     * Class should make use of type detector() to determine which endpoint to use
     *
     */
    abstract public function delete( \Accounting\Interfaces\Model $model );
    
    /**
     * Return the active namespace
     *
     * e.g. if we're building a wrapper for Xero
     * we want this to return the Xero namespace
     *
     */
    abstract protected function locate();

    /**
     * Detect which type of model we're dealing with and return correct endpoint
     *
     */
    public function detector( \Accounting\Interfaces\Model $model )
    {
        if ( is_a($model, 'Accounting\Abstracts\Customer') )
            return $this->endpoints['customer'];
        if ( is_a($model, 'Accounting\Abstracts\Supplier') )
            return $this->endpoints['supplier'];
        if ( is_a($model, 'Accounting\Abstracts\Purchase') )
            return $this->endpoints['purchase'];
        if ( is_a($model, 'Accounting\Abstracts\Invoice') )
            return $this->endpoints['invoice'];
        if ( is_a($model, 'Accounting\Abstracts\Credit') )
            return $this->endpoints['credit'];
    }
    
    /**
     * Toggle sandbox mode on & off
     *
     */
    public function sandbox( $toggle = false )
    {
        $this->sandbox = $toggle;
    }

    /**
     * Toggle debug mode on & off
     *
     */
    public function debug( $toggle = false )
    {
        $this->debug = $toggle;
    }
    
    /**
     * Handle API errors
     *
     */
	protected function error( $message, $code )
	{
    	if ( $code >= 400 && $code < 500 )
            throw new ClientException( $message, $code );
        else if ( $code >= 500 && $code < 600 )
    	    throw new ServerException( $message, $code );
        else
        	throw new UnknownException( $message, $code );
	}
}