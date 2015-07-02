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

use Accounting\Interfaces\SubModel;

abstract class Item implements SubModel
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
	public $description;
	public $quantity;
	public $price;
}