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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title_apartment',250);
            $table->tinyInteger('rooms')->default(1);
            $table->tinyInteger('beds')->default(1);
            $table->tinyInteger('bathrooms')->default(1);
            $table->smallInteger('sqr_meters');
            $table->string('img_apartment')->default('')->nullable();
            $table->text('description')->nullable();
            $table->string('latitude',15)->nullable();
            $table->string('longitude',15)->nullable();
            $table->string('complete_address');
            $table->tinyInteger('visible')->default(0);
            // i use the Scheme helper method to add the 'deleted_at' column
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apartments', function(Blueprint $table){

            $table->dropForeign('apartments_user_id_foreign');
            $table->dropColumn('img_apartment');
            // i add the method to the down() function. When we will call the 'delete' method, the 'deleted_at' will be set. The record will be left in the table.
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('apartments');
    }
};

/*

This is the way to check if a record is been soft deleted.

if ($flight->trashed()) {
    // ...
}

If you want to restore a record you can use this method.

$flight->restore();

If you want to permanently delete a record use this method.

$flight->forceDelete();

*/
