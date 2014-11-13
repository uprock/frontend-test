<?php

class m141111_021021_add_tables extends CDbMigration {

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('blog', array(
		                                'id' => 'pk',
		                                'create_time' => 'datetime',
		                                'update_time' => 'datetime',
		                                'title' => 'string NOT NULL',
		                                'content' => 'text NOT NULL',
		                                'img' => 'string'
		                           ));
		$this->createTable('blog_comment', array(
		                                        'id' => 'pk',
		                                        'blog_id' => 'int NOT NULL',
		                                        'create_time' => 'datetime',
		                                        'name' => 'string NOT NULL',
		                                        'comment' => 'text NOT NULL',
		                                   ));

		$this->createIndex('id_blog_comment_blog_id', 'blog_comment', 'blog_id');

	}

	public function safeDown()
	{
		$this->dropTable('blog');
		$this->dropTable('blog_comment');
	}

}