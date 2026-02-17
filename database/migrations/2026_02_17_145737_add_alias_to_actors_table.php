<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('actors', function (Blueprint $table) {
            $table->string('alias', 50)->nullable()->after('surname');
        });
    }

    public function down()
    {
        Schema::table('actors', function (Blueprint $table) {
            $table->dropColumn('alias');
        });
    }
};
