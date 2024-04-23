<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description');    
            $table->integer('init_price');
            $table->integer('dis_price')->nullable();
            $table->string('image')->nullable();
            $table->integer('id_type')->nullable();
            $table->integer('stock_quantity')->nullable();
            $table->string('image_url')->nullable();
            $table->string('cpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('bo_nho_trong')->nullable();
            $table->string('size_screen')->nullable();
            $table->string('tech_screen')->nullable();
            $table->string('cam_sau')->nullable();
            $table->string('cam_truoc')->nullable();
            $table->string('chipset')->nullable();
            $table->string('battery')->nullable();
            $table->string('sim')->nullable();
            $table->string('features')->nullable();
            $table->string('availability')->nullable();




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
