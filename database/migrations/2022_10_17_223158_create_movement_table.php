<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movement', function (Blueprint $table) {
            $table->id();
            $table->string('idPerson');
            $table->string('description');
            $table->string('classification');
            $table->enum('typeOfCost', ['RF', 'RV']);
            $table->enum('typeOfPayment ', ['D', 'C', 'O']);
            $table->dateTime('movementDate');
            $table->decimal('value');
            $table->enum('status', ['A', 'F']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movement');
    }
};
