<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //create the column that will hold the a foreign key
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            //Assign the foreign key to the column created above
            $table->foreign('type_id')->references('id')->on('types')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //Drop the foreign key
            $table->dropForeign('projects_type_id_foreign');

            //Drop the column
            $table->dropColumn('type_id');
        });
    }
};
