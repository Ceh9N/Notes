<?php

namespace Arsenchik\Review\Model;
/**
 * Class Reviews
 * @package Arsenchik\CustomerReview\Model
 */
class Review extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    /**
     *
     */
    const CACHE_TAG = 'arseniy_customer_review';
    /**
     * @var string
     */
    protected $_cacheTag = 'arseniy_customer_review';
    /**
     * @var string
     */
    protected $_eventPrefix = 'arseniy_customer_review';

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Arsenchik\Review\Model\ResourceModel\Review');
    }

    /**
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
}
