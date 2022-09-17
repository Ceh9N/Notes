<?php

namespace Arsenchik\Review\Model\ResourceModel\Review;
/**
 * Class Collection
 * @package Arsenchik\CustomerReview\Model\ResourceModel\Reviews
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * @var string
     */
    protected $_eventPrefix = 'arseniy_customer_review_collection';
    /**
     * @var string
     */
    protected $_eventObject = 'review_collection';

    /**
     * Define resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Arsenchik\Review\Model\Review', 'Arsenchik\Review\Model\ResourceModel\Review');
    }
}
