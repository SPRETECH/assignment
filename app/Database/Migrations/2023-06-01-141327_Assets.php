<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Assets extends Migration
{
    public function up()
    {
        //
        $this->db->query(
            'CREATE TABLE Assets(
                `id` INT(4) UNSIGNED NOT NULL AUTO_INCREMENT,
                `name` VARCHAR(255) NOT NULL,
                `description` VARCHAR(255) NOT NULL,
                `installationYear` int(4) NOT NULL,
                `expectedUsefulLife` int(4) NOT NULL,
                `renewableYear` INT(4) NOT NULL,
                `condition` VARCHAR(255) NULL,
                `quantity` INT(4) NULL, 
                `userId` INT(4) UNSIGNED NOT NULL,
                `unitCost` INT(10),
                `estimatedCost` INT(10),
                `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`),
                FOREIGN KEY (`userId`) REFERENCES Users(`id`)
            );'
        );
        
    }

    public function down()
    {
        //
    
    }
}
