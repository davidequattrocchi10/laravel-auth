<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToTypesTable extends Migration
{
    public function up(): void
    {
        Schema::table('types', function (Blueprint $table) {
            $table->text('description')->nullable()->after('slug');
        });
    }

    public function down(): void
    {
        Schema::table('types', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
