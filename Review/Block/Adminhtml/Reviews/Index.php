<?php

namespace Arsenchik\Review\Block\Adminhtml\Reviews;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Helper\Data;
use Magento\Customer\Controller\RegistryConstants;
use Magento\Framework\Registry;
use Arsenchik\Review\Model\ResourceModel\Review\CollectionFactory;

class Index extends \Magento\Backend\Block\Widget\Grid\Extended
{
    protected $_coreRegistry = null;

    protected $_collectionFactory;

    public function __construct(
        Context $context,
        Data $backendHelper,
        CollectionFactory $collectionFactory,
        Registry $coreRegistry,
        array $data = []
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    protected
    function _construct()
    {
        parent::_construct();
        $this->setId('entity_id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setSortable(false);
        $this->setUseAjax(true);
        $this->setPagerVisibility(false);
        $this->setFilterVisibility(false);
    }

    protected function _prepareCollection()
    {
        $collection = $this->_collectionFactory->create()->setCustomerId(
            $this->_coreRegistry->registry(RegistryConstants::CURRENT_CUSTOMER_ID));
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }


    protected function _prepareColumns()
    {
        $this->addColumn(
            'entity_id',
            ['header' => __('ID'), 'index' => 'entity_id', 'type' => 'number', 'width' => '100px']
        );
        $this->addColumn(
            'review',
            [
                'header' => __('Review'),
                'index' => 'review',
            ]
        );
        return parent::_prepareColumns();
    }

    public function getHeadersVisibility()
    {
        return $this->getCollection()->getSize() >= 0;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('catalog/product/edit', ['id' => $row->getProductId()]);
    }
}
