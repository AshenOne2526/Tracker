<?php

namespace App\Enums\Wiki;

enum SpaceRole: string
{
    case Viewer = 'viewer';
    case Editor = 'editor';
    case Admin = 'admin';

    public function label(): string
    {
        return match ($this) {
            self::Viewer => 'Viewer',
            self::Editor => 'Editor',
            self::Admin => 'Space admin',
        };
    }

    /**
     * Roles are ordered: viewer < editor < admin.
     */
    public function atLeast(self $role): bool
    {
        return $this->rank() >= $role->rank();
    }

    public function canEdit(): bool
    {
        return $this->atLeast(self::Editor);
    }

    private function rank(): int
    {
        return match ($this) {
            self::Viewer => 1,
            self::Editor => 2,
            self::Admin => 3,
        };
    }
}
