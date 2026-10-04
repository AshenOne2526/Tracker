<?php

use App\Enums\Wiki\SpaceRole;
use App\Enums\Wiki\SpaceVisibility;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wiki_spaces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description', 500)->nullable();
            $table->string('icon', 60)->default('icon-book');
            $table->string('visibility', 20)->default(SpaceVisibility::Open->value)->index();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('wiki_space_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('space_id')->constrained('wiki_spaces')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('role', 20)->default(SpaceRole::Viewer->value);
            $table->timestamps();
            $table->unique(['space_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiki_space_members');
        Schema::dropIfExists('wiki_spaces');
    }
};
