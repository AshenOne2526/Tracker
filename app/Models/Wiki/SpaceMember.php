<?php

namespace App\Models\Wiki;

use App\Enums\Wiki\SpaceRole;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $space_id
 * @property int $user_id
 * @property SpaceRole $role
 * @property CarbonImmutable $created_at
 * @property CarbonImmutable $updated_at
 */
#[Table('wiki_space_members')]
class SpaceMember extends Model
{
    /** @use HasFactory<SpaceMemberFactory> */
    use HasFactory;

    /** @var list<string> */
    protected $fillable = ['space_id', 'user_id', 'role'];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'role' => SpaceRole::class,
        ];
    }

    /**
     * @return BelongsTo<Space, $this>
     */
    public function space(): BelongsTo
    {
        return $this->belongsTo(Space::class, 'space_id');
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
