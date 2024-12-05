<?php

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
        Schema::create('accomplishments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('country_id');
            $table->text('title');
            $table->string('month');
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('quarter')->nullable();
            $table->string('project_type')->nullable();
            $table->string('project_classification')->nullable();
            $table->string('foreign_policy_pillar')->nullable();
            $table->string('target_audience')->nullable();
            $table->string('strategic_plan')->nullable();
            $table->string('diplomacy')->nullable();
            $table->string('cultural_domains')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accomplishments');
    }
};
