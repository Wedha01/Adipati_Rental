<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('pendaftarans', function (Blueprint $table) {
        $table->string('status')->nullable()->default('Cancel'); // Default to 'Cancel'
        $table->decimal('harga_lunas', 10, 2)->nullable(); // Price with 2 decimal places
    });
}

public function down()
{
    Schema::table('pendaftarans', function (Blueprint $table) {
        $table->dropColumn(['status', 'harga_lunas']);
    });
}
};
