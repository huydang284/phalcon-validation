<?php

namespace HuyDang\PhalconValidation\Tests;

use Phalcon\Test\UnitTestCase as PhalconTestCase;
use PHPUnit\Framework\IncompleteTestError;

abstract class TestCase extends PhalconTestCase
{
    protected $_cache;
    /**
     * @var \Phalcon\Config
     */
    protected $_config;
    /**
     * @var bool
     */
    private $_loaded = false;

    public function setUp()
    {
        parent::setUp();
        $this->_loaded = true;
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * Check if the test case is setup properly
     *
     * @throws IncompleteTestError;
     */
    public function __destruct()
    {
        if (!$this->_loaded) {
            throw new IncompleteTestError('Please run parent::setUp().');
        }
    }
}
