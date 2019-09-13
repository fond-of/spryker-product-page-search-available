<?php

namespace FondOfSpryker\Zed\ProductPageSearchAvailable;

use FondOfSpryker\Zed\ProductPageSearchAvailable\Dependency\Facade\ProductPageSearchAvailableToAvailabilityFacadeBridge;
use FondOfSpryker\Zed\ProductPageSearchAvailable\Dependency\Facade\ProductPageSearchAvailableToLocaleFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductPageSearchAvailableDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_AVAILABILITY = 'AVAILABILITY';

    public const FACADE_LOCALE = 'FACADE_LOCALE';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = $this->addAvailabilityFacade($container);
        $container = $this->addLocaleFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addAvailabilityFacade(Container $container): Container
    {
        $container[static::FACADE_AVAILABILITY] = function (Container $container) {
            return new ProductPageSearchAvailableToAvailabilityFacadeBridge(
                $container->getLocator()->availability()->facade()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addLocaleFacade(Container $container): Container
    {
        $container[static::FACADE_LOCALE] = function (Container $container) {
            return new ProductPageSearchAvailableToLocaleFacadeBridge(
                $container->getLocator()->locale()->facade()
            );
        };

        return $container;
    }
}
