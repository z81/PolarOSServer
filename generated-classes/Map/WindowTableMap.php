<?php

namespace Map;

use \Window;
use \WindowQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'windows' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class WindowTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.WindowTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'polaros';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'windows';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Window';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Window';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the id field
     */
    const COL_ID = 'windows.id';

    /**
     * the column name for the src field
     */
    const COL_SRC = 'windows.src';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'windows.title';

    /**
     * the column name for the _left field
     */
    const COL__LEFT = 'windows._left';

    /**
     * the column name for the top field
     */
    const COL_TOP = 'windows.top';

    /**
     * the column name for the width field
     */
    const COL_WIDTH = 'windows.width';

    /**
     * the column name for the height field
     */
    const COL_HEIGHT = 'windows.height';

    /**
     * the column name for the is_min field
     */
    const COL_IS_MIN = 'windows.is_min';

    /**
     * the column name for the is_max field
     */
    const COL_IS_MAX = 'windows.is_max';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'windows.user_id';

    /**
     * the column name for the UI field
     */
    const COL_UI = 'windows.UI';

    /**
     * the column name for the secureKey field
     */
    const COL_SECUREKEY = 'windows.secureKey';

    /**
     * the column name for the icon field
     */
    const COL_ICON = 'windows.icon';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Src', 'Title', 'left', 'Top', 'Width', 'Height', 'IsMin', 'IsMax', 'UserId', 'Ui', 'Securekey', 'Icon', ),
        self::TYPE_CAMELNAME     => array('id', 'src', 'title', 'left', 'top', 'width', 'height', 'isMin', 'isMax', 'userId', 'ui', 'securekey', 'icon', ),
        self::TYPE_COLNAME       => array(WindowTableMap::COL_ID, WindowTableMap::COL_SRC, WindowTableMap::COL_TITLE, WindowTableMap::COL__LEFT, WindowTableMap::COL_TOP, WindowTableMap::COL_WIDTH, WindowTableMap::COL_HEIGHT, WindowTableMap::COL_IS_MIN, WindowTableMap::COL_IS_MAX, WindowTableMap::COL_USER_ID, WindowTableMap::COL_UI, WindowTableMap::COL_SECUREKEY, WindowTableMap::COL_ICON, ),
        self::TYPE_FIELDNAME     => array('id', 'src', 'title', '_left', 'top', 'width', 'height', 'is_min', 'is_max', 'user_id', 'UI', 'secureKey', 'icon', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Src' => 1, 'Title' => 2, 'left' => 3, 'Top' => 4, 'Width' => 5, 'Height' => 6, 'IsMin' => 7, 'IsMax' => 8, 'UserId' => 9, 'Ui' => 10, 'Securekey' => 11, 'Icon' => 12, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'src' => 1, 'title' => 2, 'left' => 3, 'top' => 4, 'width' => 5, 'height' => 6, 'isMin' => 7, 'isMax' => 8, 'userId' => 9, 'ui' => 10, 'securekey' => 11, 'icon' => 12, ),
        self::TYPE_COLNAME       => array(WindowTableMap::COL_ID => 0, WindowTableMap::COL_SRC => 1, WindowTableMap::COL_TITLE => 2, WindowTableMap::COL__LEFT => 3, WindowTableMap::COL_TOP => 4, WindowTableMap::COL_WIDTH => 5, WindowTableMap::COL_HEIGHT => 6, WindowTableMap::COL_IS_MIN => 7, WindowTableMap::COL_IS_MAX => 8, WindowTableMap::COL_USER_ID => 9, WindowTableMap::COL_UI => 10, WindowTableMap::COL_SECUREKEY => 11, WindowTableMap::COL_ICON => 12, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'src' => 1, 'title' => 2, '_left' => 3, 'top' => 4, 'width' => 5, 'height' => 6, 'is_min' => 7, 'is_max' => 8, 'user_id' => 9, 'UI' => 10, 'secureKey' => 11, 'icon' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('windows');
        $this->setPhpName('Window');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Window');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('src', 'Src', 'VARCHAR', true, 255, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('_left', 'left', 'INTEGER', true, null, null);
        $this->addColumn('top', 'Top', 'INTEGER', true, null, null);
        $this->addColumn('width', 'Width', 'INTEGER', false, null, null);
        $this->addColumn('height', 'Height', 'INTEGER', false, null, null);
        $this->addColumn('is_min', 'IsMin', 'BOOLEAN', false, null, null);
        $this->addColumn('is_max', 'IsMax', 'BOOLEAN', false, null, null);
        $this->addColumn('user_id', 'UserId', 'INTEGER', false, null, null);
        $this->addColumn('UI', 'Ui', 'BOOLEAN', false, null, null);
        $this->addColumn('secureKey', 'Securekey', 'BOOLEAN', false, null, null);
        $this->addColumn('icon', 'Icon', 'VARCHAR', false, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }
    
    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? WindowTableMap::CLASS_DEFAULT : WindowTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Window object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = WindowTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = WindowTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + WindowTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WindowTableMap::OM_CLASS;
            /** @var Window $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            WindowTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = WindowTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = WindowTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Window $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WindowTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(WindowTableMap::COL_ID);
            $criteria->addSelectColumn(WindowTableMap::COL_SRC);
            $criteria->addSelectColumn(WindowTableMap::COL_TITLE);
            $criteria->addSelectColumn(WindowTableMap::COL__LEFT);
            $criteria->addSelectColumn(WindowTableMap::COL_TOP);
            $criteria->addSelectColumn(WindowTableMap::COL_WIDTH);
            $criteria->addSelectColumn(WindowTableMap::COL_HEIGHT);
            $criteria->addSelectColumn(WindowTableMap::COL_IS_MIN);
            $criteria->addSelectColumn(WindowTableMap::COL_IS_MAX);
            $criteria->addSelectColumn(WindowTableMap::COL_USER_ID);
            $criteria->addSelectColumn(WindowTableMap::COL_UI);
            $criteria->addSelectColumn(WindowTableMap::COL_SECUREKEY);
            $criteria->addSelectColumn(WindowTableMap::COL_ICON);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.src');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '._left');
            $criteria->addSelectColumn($alias . '.top');
            $criteria->addSelectColumn($alias . '.width');
            $criteria->addSelectColumn($alias . '.height');
            $criteria->addSelectColumn($alias . '.is_min');
            $criteria->addSelectColumn($alias . '.is_max');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.UI');
            $criteria->addSelectColumn($alias . '.secureKey');
            $criteria->addSelectColumn($alias . '.icon');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(WindowTableMap::DATABASE_NAME)->getTable(WindowTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(WindowTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(WindowTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new WindowTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Window or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Window object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WindowTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Window) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WindowTableMap::DATABASE_NAME);
            $criteria->add(WindowTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = WindowQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            WindowTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                WindowTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the windows table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return WindowQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Window or Criteria object.
     *
     * @param mixed               $criteria Criteria or Window object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WindowTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Window object
        }

        if ($criteria->containsKey(WindowTableMap::COL_ID) && $criteria->keyContainsValue(WindowTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.WindowTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = WindowQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // WindowTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
WindowTableMap::buildTableMap();
