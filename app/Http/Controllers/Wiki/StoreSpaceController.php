<?php

namespace App\Http\Controllers\Wiki;

use App\Enums\Wiki\SpaceRole;
use App\Http\Controllers\Controller;
use App\Models\Wiki\Space;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class StoreSpaceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        Gate::authorize('create', Space::class);

        $name = $request->string('name')->toString();
        $author = $request->user();

        $space = DB::transaction(function () use ($request, $name, $author): Space {
            $space = Space::create([
                'name'        => $name,
                'slug'        => Str::slug($name),
                'description' => $request->input('description'),
                'visibility'  => $request->input('visibility'),
                'created_by'  => $author->id,
            ]);

            $space->members()->create([
                'user_id' => $author->id,
                'role'    => SpaceRole::Admin,
            ]);

            return $space;
        });

        return redirect()->route('wiki.spaces.show', $space);
    }
}
