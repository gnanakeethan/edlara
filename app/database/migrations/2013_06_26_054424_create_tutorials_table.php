<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->text('description');
            $table->string('alias', 32);
            $table->integer('published');
            $table->text('subjectname');
            $table->integer('subjectid');
            $table->text('content');
            $table->integer('createdby');
            $table->text('exams');
            $table->timestamps();
            $table->softDeletes();
        });

        //Setting extra data to LongText to allow much data to be put in
        DB::statement('ALTER TABLE `tutorials` MODIFY `content` LONGTEXT;');
        DB::statement('ALTER TABLE `tutorials` MODIFY `exams` LONGTEXT;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tutorials');
    }
}
