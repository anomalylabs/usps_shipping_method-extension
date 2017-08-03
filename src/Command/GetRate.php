<?php namespace Anomaly\UspsShippingMethodExtension\Command;

use Illuminate\Contracts\Config\Repository;
use Usps\Rate;

/**
 * Class GetRate
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetRate
{

    /**
     * Handle the command.
     *
     * @param Repository $config
     * @return Rate
     */
    public function handle(Repository $config)
    {
        return new Rate($config->get('anomaly.extension.usps_shipping_method::config.username'));
    }
}
