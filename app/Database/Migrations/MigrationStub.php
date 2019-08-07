<?php

$namespaceDefinition

use $useClassName;
use Illuminate\Database\Schema\Blueprint;

class $className extends $baseClassName
{

    public function up()
    {
        $this->schema->create('tableName' , function(Blueprint $table){
            $table->increment('id');
            $table->string('columnName')->unique();
            $table->timestamps();

        });

        $this->schema->table('tableName' , function(Blueprint $table){
            $table->string('columnName')->unique();
        })
    }

    public function down()
    {

        $this->schema->drop('tableName');

        $this->schema->table('tableName' , function(Blueprint $table){

            $table->dropColumn('columnName');


        })
    }
}
