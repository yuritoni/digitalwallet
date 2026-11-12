<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(){ Schema::create('topups', function(Blueprint $table){ $table->id(); $table->foreignId('user_id')->constrained()->cascadeOnDelete(); $table->decimal('amount',18,2); $table->string('payment_method')->default('manual_transfer'); $table->string('status')->default('pending'); $table->string('reference_no')->unique(); $table->timestamps(); }); } public function down(){ Schema::dropIfExists('topups'); } };
