<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRoleIdInUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Cambia role_id a BIGINT
            $table->bigInteger('role_id')->unsigned()->default(2)->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Revertir el cambio si es necesario
            // Esto dependerá de lo que deseas hacer al revertir
        });
    }
}
