<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('title');         // Ex: '🌐' eller 'fa-globe' 
            $table->string('category')->nullable()->after('icon');      // Ex: 'Web', 'Desktop', '3D'...
            $table->string('version')->nullable()->after('type');       // Ex: 'v1.2.3'
            $table->string('download_url')->nullable()->after('version');
            $table->text('badges')->nullable()->after('download_url');  // Ex: 'Open Source,Windows'
            // Om du vill ha versionshistorik
            $table->text('version_history')->nullable()->after('badges');
            // ...lägg till fler om du vill
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'icon',
                'category',
                'version',
                'download_url',
                'badges',
                'version_history'
            ]);
        });
    }
};
