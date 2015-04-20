<?php

namespace Base;

use \Window as ChildWindow;
use \WindowQuery as ChildWindowQuery;
use \Exception;
use \PDO;
use Map\WindowTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'windows' table.
 *
 * 
 *
 * @method     ChildWindowQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildWindowQuery orderBySrc($order = Criteria::ASC) Order by the src column
 * @method     ChildWindowQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildWindowQuery orderByleft($order = Criteria::ASC) Order by the _left column
 * @method     ChildWindowQuery orderByTop($order = Criteria::ASC) Order by the top column
 * @method     ChildWindowQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method     ChildWindowQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     ChildWindowQuery orderByIsMin($order = Criteria::ASC) Order by the is_min column
 * @method     ChildWindowQuery orderByIsMax($order = Criteria::ASC) Order by the is_max column
 * @method     ChildWindowQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildWindowQuery orderByUi($order = Criteria::ASC) Order by the UI column
 * @method     ChildWindowQuery orderBySecurekey($order = Criteria::ASC) Order by the secureKey column
 * @method     ChildWindowQuery orderByIcon($order = Criteria::ASC) Order by the icon column
 *
 * @method     ChildWindowQuery groupById() Group by the id column
 * @method     ChildWindowQuery groupBySrc() Group by the src column
 * @method     ChildWindowQuery groupByTitle() Group by the title column
 * @method     ChildWindowQuery groupByleft() Group by the _left column
 * @method     ChildWindowQuery groupByTop() Group by the top column
 * @method     ChildWindowQuery groupByWidth() Group by the width column
 * @method     ChildWindowQuery groupByHeight() Group by the height column
 * @method     ChildWindowQuery groupByIsMin() Group by the is_min column
 * @method     ChildWindowQuery groupByIsMax() Group by the is_max column
 * @method     ChildWindowQuery groupByUserId() Group by the user_id column
 * @method     ChildWindowQuery groupByUi() Group by the UI column
 * @method     ChildWindowQuery groupBySecurekey() Group by the secureKey column
 * @method     ChildWindowQuery groupByIcon() Group by the icon column
 *
 * @method     ChildWindowQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWindowQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWindowQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWindow findOne(ConnectionInterface $con = null) Return the first ChildWindow matching the query
 * @method     ChildWindow findOneOrCreate(ConnectionInterface $con = null) Return the first ChildWindow matching the query, or a new ChildWindow object populated from the query conditions when no match is found
 *
 * @method     ChildWindow findOneById(int $id) Return the first ChildWindow filtered by the id column
 * @method     ChildWindow findOneBySrc(string $src) Return the first ChildWindow filtered by the src column
 * @method     ChildWindow findOneByTitle(string $title) Return the first ChildWindow filtered by the title column
 * @method     ChildWindow findOneByleft(int $_left) Return the first ChildWindow filtered by the _left column
 * @method     ChildWindow findOneByTop(int $top) Return the first ChildWindow filtered by the top column
 * @method     ChildWindow findOneByWidth(int $width) Return the first ChildWindow filtered by the width column
 * @method     ChildWindow findOneByHeight(int $height) Return the first ChildWindow filtered by the height column
 * @method     ChildWindow findOneByIsMin(boolean $is_min) Return the first ChildWindow filtered by the is_min column
 * @method     ChildWindow findOneByIsMax(boolean $is_max) Return the first ChildWindow filtered by the is_max column
 * @method     ChildWindow findOneByUserId(int $user_id) Return the first ChildWindow filtered by the user_id column
 * @method     ChildWindow findOneByUi(boolean $UI) Return the first ChildWindow filtered by the UI column
 * @method     ChildWindow findOneBySecurekey(boolean $secureKey) Return the first ChildWindow filtered by the secureKey column
 * @method     ChildWindow findOneByIcon(string $icon) Return the first ChildWindow filtered by the icon column *

 * @method     ChildWindow requirePk($key, ConnectionInterface $con = null) Return the ChildWindow by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOne(ConnectionInterface $con = null) Return the first ChildWindow matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWindow requireOneById(int $id) Return the first ChildWindow filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOneBySrc(string $src) Return the first ChildWindow filtered by the src column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOneByTitle(string $title) Return the first ChildWindow filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOneByleft(int $_left) Return the first ChildWindow filtered by the _left column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOneByTop(int $top) Return the first ChildWindow filtered by the top column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOneByWidth(int $width) Return the first ChildWindow filtered by the width column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOneByHeight(int $height) Return the first ChildWindow filtered by the height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOneByIsMin(boolean $is_min) Return the first ChildWindow filtered by the is_min column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOneByIsMax(boolean $is_max) Return the first ChildWindow filtered by the is_max column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOneByUserId(int $user_id) Return the first ChildWindow filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOneByUi(boolean $UI) Return the first ChildWindow filtered by the UI column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOneBySecurekey(boolean $secureKey) Return the first ChildWindow filtered by the secureKey column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWindow requireOneByIcon(string $icon) Return the first ChildWindow filtered by the icon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWindow[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildWindow objects based on current ModelCriteria
 * @method     ChildWindow[]|ObjectCollection findById(int $id) Return ChildWindow objects filtered by the id column
 * @method     ChildWindow[]|ObjectCollection findBySrc(string $src) Return ChildWindow objects filtered by the src column
 * @method     ChildWindow[]|ObjectCollection findByTitle(string $title) Return ChildWindow objects filtered by the title column
 * @method     ChildWindow[]|ObjectCollection findByleft(int $_left) Return ChildWindow objects filtered by the _left column
 * @method     ChildWindow[]|ObjectCollection findByTop(int $top) Return ChildWindow objects filtered by the top column
 * @method     ChildWindow[]|ObjectCollection findByWidth(int $width) Return ChildWindow objects filtered by the width column
 * @method     ChildWindow[]|ObjectCollection findByHeight(int $height) Return ChildWindow objects filtered by the height column
 * @method     ChildWindow[]|ObjectCollection findByIsMin(boolean $is_min) Return ChildWindow objects filtered by the is_min column
 * @method     ChildWindow[]|ObjectCollection findByIsMax(boolean $is_max) Return ChildWindow objects filtered by the is_max column
 * @method     ChildWindow[]|ObjectCollection findByUserId(int $user_id) Return ChildWindow objects filtered by the user_id column
 * @method     ChildWindow[]|ObjectCollection findByUi(boolean $UI) Return ChildWindow objects filtered by the UI column
 * @method     ChildWindow[]|ObjectCollection findBySecurekey(boolean $secureKey) Return ChildWindow objects filtered by the secureKey column
 * @method     ChildWindow[]|ObjectCollection findByIcon(string $icon) Return ChildWindow objects filtered by the icon column
 * @method     ChildWindow[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class WindowQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\WindowQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'polaros', $modelName = '\\Window', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWindowQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWindowQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildWindowQuery) {
            return $criteria;
        }
        $query = new ChildWindowQuery();
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
     * @return ChildWindow|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = WindowTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WindowTableMap::DATABASE_NAME);
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
     * @return ChildWindow A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, src, title, _left, top, width, height, is_min, is_max, user_id, UI, secureKey, icon FROM windows WHERE id = :p0';
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
            /** @var ChildWindow $obj */
            $obj = new ChildWindow();
            $obj->hydrate($row);
            WindowTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildWindow|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(WindowTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(WindowTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(WindowTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(WindowTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WindowTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the src column
     *
     * Example usage:
     * <code>
     * $query->filterBySrc('fooValue');   // WHERE src = 'fooValue'
     * $query->filterBySrc('%fooValue%'); // WHERE src LIKE '%fooValue%'
     * </code>
     *
     * @param     string $src The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterBySrc($src = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($src)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $src)) {
                $src = str_replace('*', '%', $src);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WindowTableMap::COL_SRC, $src, $comparison);
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
     * @return $this|ChildWindowQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WindowTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterByleft($left = null, $comparison = null)
    {
        if (is_array($left)) {
            $useMinMax = false;
            if (isset($left['min'])) {
                $this->addUsingAlias(WindowTableMap::COL__LEFT, $left['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($left['max'])) {
                $this->addUsingAlias(WindowTableMap::COL__LEFT, $left['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WindowTableMap::COL__LEFT, $left, $comparison);
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
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterByTop($top = null, $comparison = null)
    {
        if (is_array($top)) {
            $useMinMax = false;
            if (isset($top['min'])) {
                $this->addUsingAlias(WindowTableMap::COL_TOP, $top['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($top['max'])) {
                $this->addUsingAlias(WindowTableMap::COL_TOP, $top['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WindowTableMap::COL_TOP, $top, $comparison);
    }

    /**
     * Filter the query on the width column
     *
     * Example usage:
     * <code>
     * $query->filterByWidth(1234); // WHERE width = 1234
     * $query->filterByWidth(array(12, 34)); // WHERE width IN (12, 34)
     * $query->filterByWidth(array('min' => 12)); // WHERE width > 12
     * </code>
     *
     * @param     mixed $width The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterByWidth($width = null, $comparison = null)
    {
        if (is_array($width)) {
            $useMinMax = false;
            if (isset($width['min'])) {
                $this->addUsingAlias(WindowTableMap::COL_WIDTH, $width['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($width['max'])) {
                $this->addUsingAlias(WindowTableMap::COL_WIDTH, $width['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WindowTableMap::COL_WIDTH, $width, $comparison);
    }

    /**
     * Filter the query on the height column
     *
     * Example usage:
     * <code>
     * $query->filterByHeight(1234); // WHERE height = 1234
     * $query->filterByHeight(array(12, 34)); // WHERE height IN (12, 34)
     * $query->filterByHeight(array('min' => 12)); // WHERE height > 12
     * </code>
     *
     * @param     mixed $height The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterByHeight($height = null, $comparison = null)
    {
        if (is_array($height)) {
            $useMinMax = false;
            if (isset($height['min'])) {
                $this->addUsingAlias(WindowTableMap::COL_HEIGHT, $height['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($height['max'])) {
                $this->addUsingAlias(WindowTableMap::COL_HEIGHT, $height['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WindowTableMap::COL_HEIGHT, $height, $comparison);
    }

    /**
     * Filter the query on the is_min column
     *
     * Example usage:
     * <code>
     * $query->filterByIsMin(true); // WHERE is_min = true
     * $query->filterByIsMin('yes'); // WHERE is_min = true
     * </code>
     *
     * @param     boolean|string $isMin The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterByIsMin($isMin = null, $comparison = null)
    {
        if (is_string($isMin)) {
            $isMin = in_array(strtolower($isMin), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(WindowTableMap::COL_IS_MIN, $isMin, $comparison);
    }

    /**
     * Filter the query on the is_max column
     *
     * Example usage:
     * <code>
     * $query->filterByIsMax(true); // WHERE is_max = true
     * $query->filterByIsMax('yes'); // WHERE is_max = true
     * </code>
     *
     * @param     boolean|string $isMax The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterByIsMax($isMax = null, $comparison = null)
    {
        if (is_string($isMax)) {
            $isMax = in_array(strtolower($isMax), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(WindowTableMap::COL_IS_MAX, $isMax, $comparison);
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
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(WindowTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(WindowTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WindowTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the UI column
     *
     * Example usage:
     * <code>
     * $query->filterByUi(true); // WHERE UI = true
     * $query->filterByUi('yes'); // WHERE UI = true
     * </code>
     *
     * @param     boolean|string $ui The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterByUi($ui = null, $comparison = null)
    {
        if (is_string($ui)) {
            $ui = in_array(strtolower($ui), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(WindowTableMap::COL_UI, $ui, $comparison);
    }

    /**
     * Filter the query on the secureKey column
     *
     * Example usage:
     * <code>
     * $query->filterBySecurekey(true); // WHERE secureKey = true
     * $query->filterBySecurekey('yes'); // WHERE secureKey = true
     * </code>
     *
     * @param     boolean|string $securekey The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function filterBySecurekey($securekey = null, $comparison = null)
    {
        if (is_string($securekey)) {
            $securekey = in_array(strtolower($securekey), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(WindowTableMap::COL_SECUREKEY, $securekey, $comparison);
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
     * @return $this|ChildWindowQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WindowTableMap::COL_ICON, $icon, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildWindow $window Object to remove from the list of results
     *
     * @return $this|ChildWindowQuery The current query, for fluid interface
     */
    public function prune($window = null)
    {
        if ($window) {
            $this->addUsingAlias(WindowTableMap::COL_ID, $window->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the windows table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WindowTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WindowTableMap::clearInstancePool();
            WindowTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(WindowTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WindowTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            WindowTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            WindowTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // WindowQuery
