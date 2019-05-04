<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function ($table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->index();
            $table->text('address');
            $table->text('keywords')->nullable();
            // $table->index([\DB::raw('keywords(500)')]);
            $this->timestamps($table);
        });
    }

    private function timestamps($table)
    {
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrent();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
