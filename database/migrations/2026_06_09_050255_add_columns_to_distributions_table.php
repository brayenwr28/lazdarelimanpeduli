<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('distributions', function (Blueprint $table) {
            $table->string('recipient_name')->after('program_id');
            $table->string('location')->nullable()->after('recipient_name');
            $table->string('photo_url')->nullable()->after('amount');
        });
    }

    public function down()
    {
        Schema::table('distributions', function (Blueprint $table) {
            $table->dropColumn(['recipient_name', 'location', 'photo_url']);
        });
    }
};
