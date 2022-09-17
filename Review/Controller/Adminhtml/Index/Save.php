<?php

namespace Arsenchik\Review\Controller\Adminhtml\Index;
/**
 * Class Save
 * @package Arsenchik\CustomerReview\Controller\Adminhtml\Index
 */
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Arsenchik\Review\Model\ReviewFactory
     */
    protected $_reviewFactory;

    /**
     * Save constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Arsenchik\Review\Model\ReviewFactory $reviewFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Arsenchik\Review\Model\ReviewFactory $reviewFactory
    )
    {
        $this->_reviewFactory = $reviewFactory;
        parent::__construct($context);
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $reviewId = isset($data['entity_id']) ? $data['entity_id'] : '';
        if (!$data) {
            $this->_redirect('arseniyrev/index/index');
        }
        try {
            $rowData = $this->_reviewFactory->create()->load($reviewId);
            if (!$rowData->getId() && $reviewId) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('arseniyrev/index/index');
            }
            $rowData->setData($data);
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('arseniyrev/index/index');
    }
}
