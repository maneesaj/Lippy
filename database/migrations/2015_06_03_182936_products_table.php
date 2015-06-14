<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
            $table->engine = 'MyISAM';
            $table->string('name');
            $table->string('brand');
            $table->string('pathtoimage');
            $table->string('price');
            $table->text('description');
            $table->string('HEX');
            $table->string('RGB');
            $table->string('colour');
            $table->string('link');
            
            
		});
                DB::statement('ALTER TABLE products ADD FULLTEXT search(name,   brand,HEX,RGB,colour)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('products', function($table) {
	            $table->dropIndex('search');
	        });
		Schema::drop('products');
	}

}
