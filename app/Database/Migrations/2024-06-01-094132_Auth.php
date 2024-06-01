<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Auth extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "uid"=> [
                "type" => "bigint",
                "constraint" => 20,
                "auto_increment" => true,
                "unsigned" => true
            ],
            "FullName" => [
                "type" => "VARCHAR",
                "constraint" => 3000,
            ],
            "Age" => [
                "type" => "INT",
                "constraint" => 11,

            ],
            "Birthday" => [
                "type" => "DATE",
            ],
            "Username" => [
                "type" => "VARCHAR",
                "constraint" => 3000,
            ],
            "Email" => [
                "type" => "VARCHAR",
                "constraint" => 3000,
            ],
            "Password" => [
                "type" => "VARCHAR",
                "constraint" => 3000,
            ],
            "Account_created" => [
                "type" => "TIMESTAMP",
                "null" => true,
                "default" => new RawSql('CURRENT_TIMESTAMP')
            ],
            "Account_updated" => [
                "type" => "TIMESTAMP",
                "null" => true,
                "default" => null
            ],
        ]);

        $this->forge->addPrimaryKey(["uid"]);
        $this->forge->createTable("auth_table");
    }

    public function down()
    {
        $this->forge->dropTable("auth_table");
    }
}
