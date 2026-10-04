<?php

namespace App\Models\Wiki;

use App\Enums\Wiki\SpaceRole;
use App\Enums\Wiki\SpaceVisibility;
use App\Models\User;
use App\Policies\Wiki\SpacePolicy;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string $icon
 * @property SpaceVisibility $visibility
 * @property int $created_by
 * @property CarbonImmutable $created_at
 * @property CarbonImmutable $updated_at
 * @property CarbonImmutable $deleted_at
 */
#[Table('wiki_spaces')]
#[UsePolicy(SpacePolicy::class)]
class Space extends Model
{
    /** use HasFactory<SpaceFactory> */
    use HasFactory, SoftDeletes;

    /** @var List<string> */
    protected $fillable = ['name', 'slug', 'description', 'icon', 'visibility', 'created_by'];

    protected function casts(): array
    {
        return [
            'visibility' => SpaceVisibility::class,
        ];
    }

    /**
     * @return HasMany<SpaceMember, $this>
     */
    public function members(): HasMany
    {
        return $this->hasMany(SpaceMember::class, 'space_id');
    }

    /**
     * The role the given user holds in this space, or null when they are not a member.
     */
    public function roleFor(User $user): ?SpaceRole
    {
        $member = $this->relationLoaded('members')
            ? $this->members->firstWhere('user_id', $user->id)
            : $this->members()->where('user_id', $user->id)->first();

        return $member?->role;
    }
}
