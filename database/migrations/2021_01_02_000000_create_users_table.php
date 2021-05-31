<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('last_names');
            $table->string('number_document');
            $table->bigInteger('type_document_id')->unsigned();
            $table->string('birthday');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreign('type_document_id')->references('id')->on('type_documents');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        \DB::statement('ALTER TABLE users ADD FULLTEXT fulltext_index (number_document,names,last_names,email)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
