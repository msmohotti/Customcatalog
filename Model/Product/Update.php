<?php
namespace Altayer\Customcatalog\Model\Product;

class Update
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name Users name.
     * @return string Greeting message with users name.
     */
    public function process() {
        return "Hello, ";
    }
}