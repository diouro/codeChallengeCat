<?php


use Phinx\Migration\AbstractMigration;

class CreateTables extends AbstractMigration
{
    /**
     * Run migration
     */
    public function up()
    {

        // Create user table
        $table = $this->table('users');
        $table->addColumn('first_name', 'string')
              ->addColumn('last_name', 'string')
              ->create();

        // Create teams table
        $table = $this->table('teams');
        $table->addColumn('name', 'string')
              ->create();

        // Create roles table
        $table = $this->table('roles');
        $table->addColumn('name', 'string')
              ->create();

        // Create team_users
        $table = $this->table('team_users');
        $table->addColumn('team_id', 'integer')
              ->addColumn('user_id', 'integer')
              ->addColumn('role_id', 'integer')
              ->addForeignKey('team_id', 'teams', ['id'])
              ->addForeignKey('user_id', 'users', ['id'])
              ->addForeignKey('role_id', 'roles', ['id'])
              ->create();
              
        // Create user table
        $table = $this->table('wellness');
        $table->addColumn('user_id', 'integer')
              ->addColumn('sleep', 'float')
              ->addColumn('soreness', 'float')
              ->addColumn('fatigue', 'float')
              ->addColumn('overall', 'float')
              ->addColumn('recorded_at', 'timestamp')
              ->create();
    }

    public function down()
    {

        $table = $this->table('users')->drop();
        $table = $this->table('teams')->drop();
        $table = $this->table('roles')->drop();
        $table = $this->table('team_users')->drop();
        $table = $this->table('wellness')->drop();

    }
}
