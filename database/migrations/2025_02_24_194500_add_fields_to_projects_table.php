<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Add new columns but check if they don't exist first
            if (!Schema::hasColumn('projects', 'download_url')) {
                $table->string('download_url')->nullable();
            }
            if (!Schema::hasColumn('projects', 'repo_url')) {
                $table->string('repo_url')->nullable();
            }
            if (!Schema::hasColumn('projects', 'status')) {
                $table->string('status')->nullable();
            }
            if (!Schema::hasColumn('projects', 'type')) {
                $table->string('type')->nullable();
            }
            if (!Schema::hasColumn('projects', 'version')) {
                $table->string('version')->nullable();
            }
            if (!Schema::hasColumn('projects', 'version_history')) {
                $table->text('version_history')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'download_url',
                'repo_url',
                'status',
                'type',
                'version',
                'version_history'
            ]);
        });
    }
};