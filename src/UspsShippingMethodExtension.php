<?php namespace Anomaly\UspsShippingMethodExtension;

use Anomaly\ShippingModule\Method\Extension\MethodExtension;
use Anomaly\StoreModule\Contract\AddressInterface;
use Anomaly\StoreModule\Contract\ShippableInterface;
use Anomaly\UspsShippingMethodExtension\Command\GetQuote;

/**
 * Class UspsShippingMethodExtension
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class UspsShippingMethodExtension extends MethodExtension
{

    /**
     * This extension provides the UPS shipping
     * type for the shipping module.
     *
     * @var null|string
     */
    protected $provides = 'anomaly.module.shipping::method.usps';

    /**
     * Return a quote for an order.
     *
     * @param ShippableInterface $shippable
     * @param array $parameters
     * @return float
     */
    public function quote(ShippableInterface $shippable, AddressInterface $address)
    {
        return $this->dispatch(new GetQuote($this, $shippable, $address));
    }
}
