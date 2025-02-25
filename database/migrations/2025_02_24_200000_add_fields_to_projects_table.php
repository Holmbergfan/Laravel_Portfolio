<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'download_url')) {
                $table->string('download_url')->nullable()->after('badges');
            }
            if (!Schema::hasColumn('projects', 'repo_url')) {
                $table->string('repo_url')->nullable()->after('download_url');
            }
            if (!Schema::hasColumn('projects', 'status')) {
                $table->string('status')->nullable()->after('repo_url');
            }
            if (!Schema::hasColumn('projects', 'type')) {
                $table->string('type')->nullable()->after('status');
            }
            if (!Schema::hasColumn('projects', 'version')) {
                $table->string('version')->nullable()->after('type');
            }
            if (!Schema::hasColumn('projects', 'version_history')) {
                $table->text('version_history')->nullable()->after('version');
            }
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $columns = [
                'download_url',
                'repo_url',
                'status',
                'type',
                'version',
                'version_history'
            ];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('projects', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};