<?php
class Newsletter {
	public static function up() {
		$table = \Asgard\Core\App::get('config')->get('database/prefix').'mailing';
		\Asgard\Core\App::get('schema')->create($table, function($table) {	
			$table->add('id', 'int(11)')
				->autoincrement()
				->primary();	
			$table->add('created_at', 'datetime')
				->nullable();	
			$table->add('updated_at', 'datetime')
				->nullable();	
			$table->add('title', 'varchar(255)')
				->nullable();	
			$table->add('content', 'varchar(255)')
				->nullable();	
			$table->add('plaintext', 'varchar(255)')
				->nullable();
		});

		$table = \Asgard\Core\App::get('config')->get('database/prefix').'subscriber';
		\Asgard\Core\App::get('schema')->create($table, function($table) {	
			$table->add('id', 'int(11)')
				->autoincrement()
				->primary();	
			$table->add('created_at', 'datetime')
				->nullable();	
			$table->add('updated_at', 'datetime')
				->nullable();	
			$table->add('email', 'varchar(255)')
				->nullable();
		});
	}
	
	public static function down() {
		\Asgard\Core\App::get('schema')->drop(\Asgard\Core\App::get('config')->get('database/prefix').'mailing');
		\Asgard\Core\App::get('schema')->drop(\Asgard\Core\App::get('config')->get('database/prefix').'subscriber');
	}
}