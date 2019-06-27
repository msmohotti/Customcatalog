<?php
/**
 * Altayer_Customcatalog Add New Row Form Admin Block.
 * @category    Altayer
 * @package     Altayer_Customcatalog
 * @author      Altayer Group
 *
 */

namespace Altayer\Customcatalog\Model;

use Altayer\Customcatalog\Model\Product\Publisher;
use Altayer\Customcatalog\Model\ResourceModel\Product as ProductResource;
use Altayer\Customcatalog\Logger\Logger;
use Altayer\Customcatalog\Model\ProductFactory;

class ProcessQueueMsg
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    private $resource;
    private $publisher;
    private $productFactory;

    /**
     * ProcessQueueMsg constructor.
     * @param ProductResource $resource
     * @param Publisher $publisher
     * @param Logger $logger
     * @param ProductFactory $productFactory
     */
    public function __construct(
        ProductResource $resource,
        Publisher $publisher,
        Logger $logger,
        ProductFactory $productFactory
    )
    {
        $this->resource = $resource;
        $this->publisher = $publisher;
        $this->logger = $logger;
        $this->productFactory = $productFactory;
    }

    public function process($message)
    {
        $cleanMessage = stripcslashes(str_replace('""', '', stripcslashes($message)));

        $array  = json_decode($cleanMessage, true);

        $rowData = $this->productFactory->create();

        try {
            if($array['entity_id'] != null){
                $rowData->load($array['entity_id']);
//                $rowData->setEntityId($array['entity_id']);
            }
            if(isset($array['product_id'])){
                $rowData->setProductId($array['product_id']);
            }
            if(isset($array['copy_write_info'])){
                $rowData->setCopyWriteInfo($array['copy_write_info']);
            }
            if(isset($array['vpn'])){
                $rowData->setVpn($array['vpn']);
            }
            $rowData->save();
        } catch (\Exception $exception) {
            $this->logger->addError('Could not save the product' . $exception->getMessage() , $array);
        }
    }
}