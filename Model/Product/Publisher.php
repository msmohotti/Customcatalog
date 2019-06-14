<?php
/**
 * Altayer_Customcatalog Add New Row Form Admin Block.
 * @category    Altayer
 * @package     Altayer_Customcatalog
 * @author      Altayer Group
 *
 */

namespace Altayer\Customcatalog\Model\Product;

use Magento\Framework\MessageQueue\PublisherInterface;

class Publisher
{
    const TOPIC_NAME = "altayer.customcatalog.topic";

    /**
     * @var PublisherInterface
     */
    protected $publisher;

    /**
     * ImagePublisher constructor.
     *
     * @param PublisherInterface $publisher
     */
    public function __construct(
        PublisherInterface $publisher
    )
    {
        $this->publisher = $publisher;
    }

    /**
     * Build and publishes message to RabbitMQ.
     *
     * @param array $data
     * @return  void
     */
    public function publish($data)
    {
//        $fp = fopen('/tmp/mana.txt', 'w');
//        fwrite($fp, 'yuyuyuy');
//        fclose($fp);

        $this->publisher->publish(self::TOPIC_NAME, json_encode($data));
    }
}