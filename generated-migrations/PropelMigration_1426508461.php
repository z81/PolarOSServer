<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1426508461.
 * Generated on 2015-03-16 12:21:01 
 */
class PropelMigration_1426508461
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

ALTER TABLE `windows`

  ADD `title` VARCHAR(255) NOT NULL AFTER `src`,

  ADD `user_id` INTEGER NOT NULL AFTER `is_max`;

CREATE INDEX `windows_fi_69bd79` ON `windows` (`user_id`);

ALTER TABLE `windows` ADD CONSTRAINT `windows_fk_69bd79`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`);

CREATE TABLE `apps`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `src` VARCHAR(255) NOT NULL,
    `name` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

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

DROP TABLE IF EXISTS `apps`;

ALTER TABLE `windows` DROP FOREIGN KEY `windows_fk_69bd79`;

DROP INDEX `windows_fi_69bd79` ON `windows`;

ALTER TABLE `windows`

  DROP `title`,

  DROP `user_id`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}