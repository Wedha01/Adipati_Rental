<?php


class User extends Authenticatable
{
    // Other model methods and properties

    public function isAdmin()
    {
        return $this->is_admin;
    }
}