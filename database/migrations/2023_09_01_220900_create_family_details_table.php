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
        Schema::create('family_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name_of_head_of_family', 144)->index();
            $table->string('address_line_1');
            $table->string('taluk')->index();
            $table->string('area')->index();
            $table->string('phone_number', 30)->index();
            $table->string('email_address')->nullable();
            $table->string('occupation')->nullable();
            $table->string('category')->default('advaita');
            $table->string('sub_category')->default('smartha');
            $table->string('gotra')->index();
            $table->string('veda')->index()->default('yajur');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_details');
    }
};
