<?php

namespace App\Models\Concerns;

trait ChecksUserState
{
    /**
     * Determine if the user is an admin.
     */
    public function isAdmin(): bool
    {
        return $this->type == 'admin';
    }

    /**
     * Determine if the user is a customer.
     */
    public function isCustomer(): bool
    {
        return $this->type == 'customer';
    }
}
