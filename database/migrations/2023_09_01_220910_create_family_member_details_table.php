<?php

use App\Models\FamilyDetail;
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
        Schema::create('family_member_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('member_name')->index();
            $table->string('email_address')->nullable();
            $table->string('phone_number', 30)->index();
            $table->string('related_as')->default('Father');
            $table->boolean('is_married')->default(false);
            $table->integer('age')->max(145)->default(10);
            $table->string('education_occupation_details')->nullable();
            $table->foreignIdFor(FamilyDetail::class)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_member_details');
    }
};
