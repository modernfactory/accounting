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

abstract class Customer implements Model
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
    public $name;
    public $contact;
    public $email;
    public $phone;
    public $website;
    public $address;
    public $town;
    public $postcode;
    public $country;
    public $notes;
    public $source;
}