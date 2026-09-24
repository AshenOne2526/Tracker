<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Manager = 'manager';
    case Employee = 'employee';

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Administrator',
            self::Manager => 'Manager',
            self::Employee => 'Employee',
        };
    }

    public function isAdmin():bool
    {
        return $this === self::Admin;
    }

    public function canCreateSpaces(): bool
    {
        return $this === self::Admin || $this === self::Manager;
    }
}
