<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1426512550.
 * Generated on 2015-03-16 13:29:10 
 */
class PropelMigration_1426512550
{
    public $comment = '';

    public function preUp($manager)
    {
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'polaros' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `users` DROP FOREIGN KEY `users_fk_3086bd`;

ALTER TABLE `windows` DROP FOREIGN KEY `windows_fk_69bd79`;

DROP INDEX `i_referenced_users_fk_3086bd_1` ON `windows`;

DROP INDEX `windows_u_6ca017` ON `windows`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'polaros' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `users` ADD CONSTRAINT `users_fk_3086bd`
    FOREIGN KEY (`id`)
    REFERENCES `windows` (`user_id`);

CREATE INDEX `i_referenced_users_fk_3086bd_1` ON `windows` (`user_id`);

CREATE UNIQUE INDEX `windows_u_6ca017` ON `windows` (`user_id`);

ALTER TABLE `windows` ADD CONSTRAINT `windows_fk_69bd79`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}