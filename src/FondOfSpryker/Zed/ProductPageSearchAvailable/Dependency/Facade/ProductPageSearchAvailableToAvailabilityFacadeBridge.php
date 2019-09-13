<?php

namespace FondOfSpryker\Zed\ProductPageSearchAvailable\Dependency\Facade;

use Generated\Shared\Transfer\ProductAbstractAvailabilityTransfer;
use Spryker\Zed\Availability\Business\AvailabilityFacadeInterface;

class ProductPageSearchAvailableToAvailabilityFacadeBridge implements ProductPageSearchAvailableToAvailabilityFacadeInterface
{
    /**
     * @var \Spryker\Zed\Availability\Business\AvailabilityFacadeInterface
     */
    protected $availabilityFacade;

    /**
     * @param \Spryker\Zed\Availability\Business\AvailabilityFacadeInterface $availabilityFacade
     */
    public function __construct(AvailabilityFacadeInterface $availabilityFacade)
    {
        $this->availabilityFacade = $availabilityFacade;
    }

    /**
     * @param int $idProductAbstract
     * @param int $idLocale
     *
     * @return \Generated\Shared\Transfer\ProductAbstractAvailabilityTransfer
     */
    public function getProductAbstractAvailability(int $idProductAbstract, int $idLocale): ProductAbstractAvailabilityTransfer
    {
        return $this->availabilityFacade->getProductAbstractAvailability($idProductAbstract, $idLocale);
    }

    /**
     * @param int $idProductAbstract
     * @param int $idLocale
     * @param int $idStore
     *
     * @return \Generated\Shared\Transfer\ProductAbstractAvailabilityTransfer|null
     */
    public function findProductAbstractAvailability(int $idProductAbstract, int $idLocale, int $idStore): ?ProductAbstractAvailabilityTransfer
    {
        return $this->findProductAbstractAvailability($idProductAbstract, $idLocale, $idStore);
    }
}
