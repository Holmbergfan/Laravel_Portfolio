<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'gallery_images')) {
                $table->json('gallery_images')->nullable()->after('image_url');
            }
            if (!Schema::hasColumn('projects', 'files')) {
                $table->json('files')->nullable()->after('gallery_images');
            }
            if (!Schema::hasColumn('projects', 'badges')) {
                $table->json('badges')->nullable()->after('files');
            }
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'gallery_images')) {
                $table->dropColumn('gallery_images');
            }
            if (Schema::hasColumn('projects', 'files')) {
                $table->dropColumn('files');
            }
            if (Schema::hasColumn('projects', 'badges')) {
                $table->dropColumn('badges');
            }
        });
    }
};