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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->enum('designation', ['Intern', 'Associate', 'Senior', 'Manager']);
            $table->decimal('monthly_salary_package', 10, 2);
            $table->decimal('monthly_tax_value', 10, 2)->default(0);
            $table->decimal('yearly_increasing_bonus', 10, 2)->default(0);
            $table->decimal('monthly_net_salary', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
