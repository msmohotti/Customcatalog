<?php
namespace Altayer\Customcatalog\Api;

interface ProductInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name Users name.
     * @return string Greeting message with users name.
     */
    public function getByVpn($vpn);
}