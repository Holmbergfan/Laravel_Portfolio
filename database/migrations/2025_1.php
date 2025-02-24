<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Remove duplicate columns that already exist
            // $table->string('icon')->nullable();
            // $table->string('category')->nullable();
            
            // Add new columns
            $table->json('gallery_images')->nullable();
            $table->json('files')->nullable();
            $table->string('download_url')->nullable();
            $table->string('repository_url')->nullable();
            $table->string('type')->nullable();
            $table->string('version')->nullable();
            $table->json('version_history')->nullable();
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'gallery_images',
                'files',
                'download_url',
                'repository_url',
                'type',
                'version',
                'version_history'
            ]);
        });
    }
};