<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePendaftaransTableMakeDriverAndTambahanNullable extends Migration
{
    public function up()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            // Change driver and tambahan to nullable
            $table->string('driver')->nullable()->change();
            $table->text('tambahan')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            // Revert to non-nullable (optional, adjust as needed)
            $table->string('driver')->nullable(false)->change();
            $table->text('tambahan')->nullable(false)->change();
        });
    }
}