<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreateAtColumnToSomeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affectation', function (Blueprint $table) {
            $table->timestamp('created_at');
        });

        Schema::table('décharge_fournisseur', function (Blueprint $table) {
            $table->timestamp('created_at');
        });

        Schema::table('décharge_structure', function (Blueprint $table) {
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affectation', function (Blueprint $table) {
            $table->dropColumn('created_at');
        });

        Schema::table('décharge_fournisseur', function (Blueprint $table) {
            $table->dropColumn('created_at');
        });

        Schema::table('décharge_structure', function (Blueprint $table) {
            $table->dropColumn('created_at');
        });
    }
}
