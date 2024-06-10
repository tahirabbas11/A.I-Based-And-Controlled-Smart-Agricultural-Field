<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changes', function (Blueprint $table) {
            $table->id();
            $table->decimal('temp')->default(0);
            $table->decimal('hum')->default(0);
            $table->decimal('mos')->default(0);
            $table->boolean('fan')->default(false);
            $table->boolean('pump')->default(false);
            $table->boolean('spray')->default(false);
            $table->boolean('auto')->default(false);
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
        Schema::dropIfExists('changes');
    }
}
