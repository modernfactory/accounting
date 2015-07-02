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

abstract class Credit implements Model
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
	public $customerId; // MAY be an uid
	public $customer; // SHOULD be a Customer object
	public $invoiceId; // MAY be an uid
	public $invoice; // SHOULD be a Invoice (the one being credit) object
	public $currency = 'GBP';
	public $status;
	public $total;
	public $tax = '20';
	public $notes = ''; // MAY be number of invoice that is being credited
	public $items = [];
}