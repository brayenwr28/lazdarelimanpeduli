<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->date('end_date')->nullable()->after('is_active');
            $table->string('bank_name')->nullable()->after('end_date');
            $table->string('bank_account')->nullable()->after('bank_name');
            $table->string('bank_account_name')->nullable()->after('bank_account');
            $table->string('qris_image_url')->nullable()->after('bank_account_name');
        });
    }

    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['end_date', 'bank_name', 'bank_account', 'bank_account_name', 'qris_image_url']);
        });
    }
};
