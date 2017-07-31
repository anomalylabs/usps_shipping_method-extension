<?php namespace Anomaly\UspsShippingMethodExtension\Command;

use Anomaly\ShippingModule\Method\Contract\MethodInterface;
use Anomaly\ShippingModule\Method\Extension\MethodExtension;
use Illuminate\Contracts\Config\Repository;
use Usps\Rate;

/**
 * Class GetRate
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UspsShippingMethodExtension\Command
 */
class GetRate
{

    /**
     * The method interface.
     *
     * @var MethodInterface
     */
    protected $method;

    /**
     * The method extension.
     *
     * @var MethodExtension
     */
    protected $extension;

    /**
     * Handle the command.
     *
     * @param Repository $config
     * @return Rate
     */
    public function handle(Repository $config)
    {
        new Rate($config->get('anomaly.extension.usps_shipping_method::config.username'));
    }
}
