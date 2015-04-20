<?php

namespace Base;

use \Label as ChildLabel;
use \LabelQuery as ChildLabelQuery;
use \Exception;
use \PDO;
use Map\LabelTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'labels' table.
 *
 * 
 *
 * @method     ChildLabelQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildLabelQuery orderByleft($order = Criteria::ASC) Order by the _left column
 * @method     ChildLabelQuery orderByTop($order = Criteria::ASC) Order by the top column
 * @method     ChildLabelQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildLabelQuery orderByIcon($order = Criteria::ASC) Order by the icon column
 * @method     ChildLabelQuery orderByAppId($order = Criteria::ASC) Order by the app_id column
 * @method     ChildLabelQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 *
 * @method     ChildLabelQuery groupById() Group by the id column
 * @method     ChildLabelQuery groupByleft() Group by the _left column
 * @method     ChildLabelQuery groupByTop() Group by the top column
 * @method     ChildLabelQuery groupByTitle() Group by the title column
 * @method     ChildLabelQuery groupByIcon() Group by the icon column
 * @method     ChildLabelQuery groupByAppId() Group by the app_id column
 * @method     ChildLabelQuery groupByUserId() Group by the user_id column
 *
 * @method     ChildLabelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLabelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLabelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLabel findOne(ConnectionInterface $con = null) Return the first ChildLabel matching the query
 * @method     ChildLabel findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLabel matching the query, or a new ChildLabel object populated from the query conditions when no match is found
 *
 * @method     ChildLabel findOneById(int $id) Return the first ChildLabel filtered by the id column
 * @method     ChildLabel findOneByleft(int $_left) Return the first ChildLabel filtered by the _left column
 * @method     ChildLabel findOneByTop(int $top) Return the first ChildLabel filtered by the top column
 * @method     ChildLabel findOneByTitle(string $title) Return the first ChildLabel filtered by the title column
 * @method     ChildLabel findOneByIcon(string $icon) Return the first ChildLabel filtered by the icon column
 * @method     ChildLabel findOneByAppId(int $app_id) Return the first ChildLabel filtered by the app_id column
 * @method     ChildLabel findOneByUserId(int $user_id) Return the first ChildLabel filtered by the user_id column *

 * @method     ChildLabel requirePk($key, ConnectionInterface $con = null) Return the ChildLabel by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabel requireOne(ConnectionInterface $con = null) Return the first ChildLabel matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLabel requireOneById(int $id) Return the first ChildLabel filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabel requireOneByleft(int $_left) Return the first ChildLabel filtered by the _left column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabel requireOneByTop(int $top) Return the first ChildLabel filtered by the top column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabel requireOneByTitle(string $title) Return the first ChildLabel filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabel requireOneByIcon(string $icon) Return the first ChildLabel filtered by the icon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabel requireOneByAppId(int $app_id) Return the first ChildLabel filtered by the app_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLabel requireOneByUserId(int $user_id) Return the first ChildLabel filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLabel[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLabel objects based on current ModelCriteria
 * @method     ChildLabel[]|ObjectCollection findById(int $id) Return ChildLabel objects filtered by the id column
 * @method     ChildLabel[]|ObjectCollection findByleft(int $_left) Return ChildLabel objects filtered by the _left column
 * @method     ChildLabel[]|ObjectCollection findByTop(int $top) Return ChildLabel objects filtered by the top column
 * @method     ChildLabel[]|ObjectCollection findByTitle(string $title) Return ChildLabel objects filtered by the title column
 * @method     ChildLabel[]|ObjectCollection findByIcon(string $icon) Return ChildLabel objects filtered by the icon column
 * @method     ChildLabel[]|ObjectCollection findByAppId(int $app_id) Return ChildLabel objects filtered by the app_id column
 * @method     ChildLabel[]|ObjectCollection findByUserId(int $user_id) Return ChildLabel objects filtered by the user_id column
 * @method     ChildLabel[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LabelQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LabelQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'polaros', $modelName = '\\Label', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLabelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLabelQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLabelQuery) {
            return $criteria;
        }
        $query = new ChildLabelQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildLabel|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LabelTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LabelTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLabel A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, _left, top, title, icon, app_id, user_id FROM labels WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildLabel $obj */
            $obj = new ChildLabel();
            $obj->hydrate($row);
            LabelTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildLabel|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildLabelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LabelTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLabelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LabelTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LabelTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LabelTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the _left column
     *
     * Example usage:
     * <code>
     * $query->filterByleft(1234); // WHERE _left = 1234
     * $query->filterByleft(array(12, 34)); // WHERE _left IN (12, 34)
     * $query->filterByleft(array('min' => 12)); // WHERE _left > 12
     * </code>
     *
     * @param     mixed $left The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelQuery The current query, for fluid interface
     */
    public function filterByleft($left = null, $comparison = null)
    {
        if (is_array($left)) {
            $useMinMax = false;
            if (isset($left['min'])) {
                $this->addUsingAlias(LabelTableMap::COL__LEFT, $left['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($left['max'])) {
                $this->addUsingAlias(LabelTableMap::COL__LEFT, $left['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelTableMap::COL__LEFT, $left, $comparison);
    }

    /**
     * Filter the query on the top column
     *
     * Example usage:
     * <code>
     * $query->filterByTop(1234); // WHERE top = 1234
     * $query->filterByTop(array(12, 34)); // WHERE top IN (12, 34)
     * $query->filterByTop(array('min' => 12)); // WHERE top > 12
     * </code>
     *
     * @param     mixed $top The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelQuery The current query, for fluid interface
     */
    public function filterByTop($top = null, $comparison = null)
    {
        if (is_array($top)) {
            $useMinMax = false;
            if (isset($top['min'])) {
                $this->addUsingAlias(LabelTableMap::COL_TOP, $top['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($top['max'])) {
                $this->addUsingAlias(LabelTableMap::COL_TOP, $top['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelTableMap::COL_TOP, $top, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LabelTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the icon column
     *
     * Example usage:
     * <code>
     * $query->filterByIcon('fooValue');   // WHERE icon = 'fooValue'
     * $query->filterByIcon('%fooValue%'); // WHERE icon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $icon The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelQuery The current query, for fluid interface
     */
    public function filterByIcon($icon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($icon)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $icon)) {
                $icon = str_replace('*', '%', $icon);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LabelTableMap::COL_ICON, $icon, $comparison);
    }

    /**
     * Filter the query on the app_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAppId(1234); // WHERE app_id = 1234
     * $query->filterByAppId(array(12, 34)); // WHERE app_id IN (12, 34)
     * $query->filterByAppId(array('min' => 12)); // WHERE app_id > 12
     * </code>
     *
     * @param     mixed $appId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelQuery The current query, for fluid interface
     */
    public function filterByAppId($appId = null, $comparison = null)
    {
        if (is_array($appId)) {
            $useMinMax = false;
            if (isset($appId['min'])) {
                $this->addUsingAlias(LabelTableMap::COL_APP_ID, $appId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($appId['max'])) {
                $this->addUsingAlias(LabelTableMap::COL_APP_ID, $appId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelTableMap::COL_APP_ID, $appId, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLabelQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(LabelTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(LabelTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LabelTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLabel $label Object to remove from the list of results
     *
     * @return $this|ChildLabelQuery The current query, for fluid interface
     */
    public function prune($label = null)
    {
        if ($label) {
            $this->addUsingAlias(LabelTableMap::COL_ID, $label->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the labels table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LabelTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LabelTableMap::clearInstancePool();
            LabelTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LabelTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LabelTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            LabelTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            LabelTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LabelQuery
