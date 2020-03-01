<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtendsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('remember_token');
            $table->string('api_token')->nullable()->after('photo');
            $table->char('role', 1)->comment('0: superadmin, 1: admin, 2: finance, 3: courier')->after('api_token');
            $table->unsignedBigInteger('outlet_id')->nullable()->after('role');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
