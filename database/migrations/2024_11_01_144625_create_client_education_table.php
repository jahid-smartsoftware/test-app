<?php

use App\Models\Client;
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
        Schema::create('client_education', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class, 'client_id')->constrained('clients')->onDelete('cascade');
            $table->text('degree')->nullable();
            $table->text('institute')->nullable();
            $table->text('result')->nullable();
            $table->text('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_education');
    }
};
