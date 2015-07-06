#Agency Core Accounting Interface
[![Latest Stable Version](https://poser.pugx.org/agencycore/accounting/v/stable)](https://packagist.org/packages/agencycore/accounting) [![Total Downloads](https://poser.pugx.org/agencycore/accounting/downloads)](https://packagist.org/packages/agencycore/accounting) [![Latest Unstable Version](https://poser.pugx.org/agencycore/accounting/v/unstable)](https://packagist.org/packages/agencycore/accounting) [![License](https://poser.pugx.org/agencycore/accounting/license)](https://packagist.org/packages/agencycore/accounting)

Simple PHP abstracts, interfaces and traits that ensure each of our accounting API wrappers (for Xero, FreeAgent and Kashflow) all follow the same format.

##Installation

    composer require agencycore/accounting

##Usage

The abstractions and interfaces developed here allow us to create wrappers for every major accounting package that have the same find, create, update and delete interface.

Here are our wrappers:

* [Xero](https://github.com/agencycore/xero)
* [FreeAgent](https://github.com/agencycore/freeagent)
* [Kashflow](https://github.com/agencycore/kashflow)

##Copyright and licence

Copyright (c) 2015 Agency Core

Free to use under the MIT licence, for full details view the LICENCE file.