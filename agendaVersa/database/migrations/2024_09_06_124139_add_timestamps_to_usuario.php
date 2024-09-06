<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToUsuario extends Migration
{
    public function up()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->timestamps(); // Adiciona as colunas created_at e updated_at
        });
    }

    public function down()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->dropTimestamps(); // Remove as colunas created_at e updated_at
        });
    }
}

