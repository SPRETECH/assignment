<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AssetHistory extends Migration
{
    public function up()
    {
        //
        $this->db->query(
            'CREATE TABLE AssetHistory(
                `id` INT(4) NOT NULL AUTO_INCREMENT,
                `assetId` INT(4) UNSIGNED NOT NULL,
                `action` VARCHAR(255) NOT NULL,
                `userId` INT(4) unsigned NOT NULL,
                `updatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                `createdAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`),
                FOREIGN KEY (`assetId`) REFERENCES Assets(`id`),
                FOREIGN KEY (`userId`) REFERENCES Users(`id`)
                
            );'
        );

    }

    public function down()
    {
        //
    }
}
