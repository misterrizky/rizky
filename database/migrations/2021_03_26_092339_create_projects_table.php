<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('id_project');
            $table->integer('fid_client')->nullable();
            $table->string('title')->nullable();
            $table->text('slug')->nullable();
            $table->longText('description')->nullable();
            $table->string('tags')->nullable();
            $table->string('photo')->nullable();
            $table->string('uri')->nullable();
            $table->enum('is_active', ['N', 'Y'])->default('N')->nullable();
            $table->enum('is_done', ['N', 'Y'])->default('N')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
