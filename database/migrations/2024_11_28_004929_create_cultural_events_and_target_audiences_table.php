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
        Schema::create('cultural_events_and_target_audiences', function (Blueprint $table) {
            $table->id();
            $table->string('host_communities')->nullable();
            $table->string('filipino_communities')->nullable();
            $table->string('other_stakeholders')->nullable();
            $table->text('title_of_the_event');
            $table->text('short_description')->nullable();
            $table->date('date_from');
            $table->date('date_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cultural_events_and_target_audiences');
    }
};
