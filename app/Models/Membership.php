<?php

namespace App\Models;

use Laravel\Jetstream\Membership as JetstreamMembership;
use Stancl\Tenancy\Database\Concerns\UsesTenantConnection;
class Membership extends JetstreamMembership
{
    use UsesTenantConnection;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}
