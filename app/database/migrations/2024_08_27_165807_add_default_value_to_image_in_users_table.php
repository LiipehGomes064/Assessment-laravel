<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToImageInUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->default('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREZzyXcKhcDReIbBR3nCqR6RskPi7B_SXhi-PfaUl1vScZUkfgxIVJHECZngpaUo9_9ZY&usqp=CAU')->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->default(null)->change();
        });
    }
}
