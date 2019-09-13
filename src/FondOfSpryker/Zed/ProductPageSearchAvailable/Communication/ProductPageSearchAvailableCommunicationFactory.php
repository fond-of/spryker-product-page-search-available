<?php

namespace FondOfSpryker\Zed\ProductPageSearchAvailable\Communication;

use FondOfSpryker\Zed\ProductPageSearchAvailable\Dependency\Facade\ProductPageSearchAvailableToAvailabilityFacadeInterface;
use FondOfSpryker\Zed\ProductPageSearchAvailable\Dependency\Facade\ProductPageSearchAvailableToLocaleFacadeInterface;
use FondOfSpryker\Zed\ProductPageSearchAvailable\ProductPageSearchAvailableDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class ProductPageSearchAvailableCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\ProductPageSearchAvailable\Dependency\Facade\ProductPageSearchAvailableToAvailabilityFacadeInterface
     */
    public function getAvailabilityFacade(): ProductPageSearchAvailableToAvailabilityFacadeInterface
    {
        return $this->getProvidedDependency(ProductPageSearchAvailableDependencyProvider::FACADE_AVAILABILITY);
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\ProductPageSearchAvailable\Dependency\Facade\ProductPageSearchAvailableToLocaleFacadeInterface
     */
    public function getLocaleFacade(): ProductPageSearchAvailableToLocaleFacadeInterface
    {
        return $this->getProvidedDependency(ProductPageSearchAvailableDependencyProvider::FACADE_LOCALE);
    }
}
