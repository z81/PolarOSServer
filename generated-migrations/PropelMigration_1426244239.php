<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1426244239.
 * Generated on 2015-03-13 10:57:19 
 */
class PropelMigration_1426244239
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

  CHANGE `left` `left` INTEGER NOT NULL,

  CHANGE `top` `top` INTEGER NOT NULL,

  CHANGE `width` `width` INTEGER,

  CHANGE `height` `height` INTEGER,

  CHANGE `is_min` `is_min` TINYINT(1),

  CHANGE `is_max` `is_max` TINYINT(1);

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

ALTER TABLE `windows`

  CHANGE `left` `left` INTEGER(255) NOT NULL,

  CHANGE `top` `top` INTEGER(255) NOT NULL,

  CHANGE `width` `width` INTEGER(255),

  CHANGE `height` `height` INTEGER(255),

  CHANGE `is_min` `is_min` VARCHAR(255),

  CHANGE `is_max` `is_max` VARCHAR(100);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}