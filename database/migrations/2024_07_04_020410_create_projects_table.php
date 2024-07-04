<?php

use App\Enums\Status;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->float('value');
            $table->enum('status', array_column(Status::cases(), 'name'));
            $table->unsignedBigInteger('creator');
            $table->foreign('creator')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
