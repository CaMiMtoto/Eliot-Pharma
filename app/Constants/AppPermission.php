<?php

namespace App\Constants;

class AppPermission
{
    const MANAGE_USERS = 'MANAGE_USERS';
    const MANAGE_PRODUCTS = 'MANAGE_PRODUCTS';
    const MANAGE_CATEGORIES = 'MANAGE_CATEGORIES';
    const MANAGE_ORDERS = 'MANAGE_ORDERS';
    const MANAGE_ROLES = 'MANAGE_ROLES';
    const MANAGE_PERMISSIONS = 'MANAGE_PERMISSIONS';
    const MANAGE_WORKING_HOURS = 'MANAGE_WORKING_HOURS';

    public static function getPermissions(): array
    {
        return [
            self::MANAGE_USERS,
            self::MANAGE_PRODUCTS,
            self::MANAGE_CATEGORIES,
            self::MANAGE_ORDERS,
            self::MANAGE_ROLES,
            self::MANAGE_PERMISSIONS,
            self::MANAGE_WORKING_HOURS,
        ];
    }
}
