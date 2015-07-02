<?php

/*
 * Agency Core Accounting API
 *
 * Abstracts, interfaces and traits to provide uniform access to Xero, FreeAgent and Kashflow APIs.
 *
 * Copyright (c) 2015 Agency Core.
 * Free to use under the MIT licence, for full details view the LICENCE file.
 *
 */

namespace Accounting\Abstracts;

use Accounting\Interfaces\Model;

abstract class Purchase implements Model
{
    /*
     * Standard variables
     *
     * Default properties used by all package models
     * of this type to ensure uniformity.
     *
     * Child class can augment these properties as required for API.
     *
     */
	public $id;
	public $number;
    public $issued;
	public $due;
	public $supplierId; // this MAY be a supplier id
	public $supplier; // this SHOULD be a supplier object
	public $currency = 'GBP';
	public $status;
	public $total;
	public $tax = '20';
	public $notes = '';
	public $items = [];
}