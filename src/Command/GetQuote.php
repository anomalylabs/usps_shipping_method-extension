<?php namespace Anomaly\UspsShippingMethodExtension\Command;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\ShippingModule\Method\Extension\MethodExtension;
use Anomaly\StoreModule\Contract\AddressInterface;
use Anomaly\StoreModule\Contract\ShippableInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;
use USPS\Rate;
use USPS\RatePackage;

/**
 * Class GetQuote
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UspsShippingMethodExtension\Command
 */
class GetQuote
{

    use DispatchesJobs;

    /**
     * The shipping extension.
     *
     * @var MethodExtension
     */
    protected $extension;

    /**
     * The shippable interface.
     *
     * @var ShippableInterface
     */
    protected $shippable;

    /**
     * The address interface.
     *
     * @var AddressInterface
     */
    protected $address;

    /**
     * Create a new GetQuote instance.
     *
     * @param MethodExtension $extension
     * @param ShippableInterface $shippable
     * @param AddressInterface $address
     */
    public function __construct(MethodExtension $extension, ShippableInterface $shippable, AddressInterface $address)
    {
        $this->extension = $extension;
        $this->shippable = $shippable;
        $this->address   = $address;
    }

    /**
     * Handle the command.
     *
     * @param ConfigurationRepositoryInterface $configuration
     */
    public function handle(ConfigurationRepositoryInterface $configuration)
    {
        $method = $this->extension->getMethod();

        /* @var Rate $rate */
        $rate = $this->dispatch(new GetRate($method));

        // What service do we want to use? @todo
        $code = $configuration->value('anomaly.extension.usps_shipping_method::service', $method->getId());

        $weight = explode('.', (string)$this->shippable->getShippableWeight());

        $package = new RatePackage();
        $package->setService($code);
        $package->setFirstClassMailType(RatePackage::CONTAINER_FLAT_RATE_BOX);
        $package->setZipOrigination(10001);
        $package->setZipDestination($this->address->getPostalCode());
        $package->setPounds(array_shift($weight));
        $package->setOunces(($ounces = array_shift($weight)) ? ($ounces / 16) : 0);
        $package->setContainer('');
        $package->setSize(RatePackage::SIZE_REGULAR);
        $package->setField('Machinable', true);

        // add the package to the rate stack
        $rate->addPackage($package);

        // Perform the request and print out the result
        $rate->getRate();

        return (float)array_get($rate->getArrayResponse(), 'RateV4Response.Package.Postage.Rate');
    }
}
