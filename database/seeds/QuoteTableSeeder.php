<?php

use Illuminate\Database\Seeder;
// use DB;
class QuoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('quotes')->truncate();
        
        DB::table('quotes')->insert([
        	'content' => 'Mano pirma quotacija #1'
        	]);
        DB::table('quotes')->insert([
        	'content' => 'Mano antra quotacija #2'
        	]);
        DB::table('quotes')->insert([
        	'content' => 'Mano trečia quotacija #3'
        	]);
        DB::table('quotes')->insert([
        	'content' => 'Mano ketvirta quotacija #4'
        	]);
    }
}
