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
        Schema::table('articles', function (Blueprint $table) {
            if (!Schema::hasColumn('articles', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }
    

public function down()
{
    Schema::table('articles', function (Blueprint $table) {
        $table->dropColumn('updated_at'); 
    });
}

};
