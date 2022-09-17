<?php
namespace Arsenchik\Review\Model\ResourceModel;


/**
 * Class Reviews
 * @package Arsenchik\CustomerReview\Model\ResourceModel
 */
class Review extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     *
     */
    protected function _construct() {
        $this->_init('arseniy_customer_review', 'entity_id');
    }
}
