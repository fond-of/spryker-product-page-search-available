<?php

namespace FondOfSpryker\Zed\ProductPageSearchAvailable\Communication\Plugin\PageDataExpander;

use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageDataExpanderInterface;

/**
 * @method \FondOfSpryker\Zed\ProductPageSearchAvailable\Communication\ProductPageSearchAvailableCommunicationFactory getFactory()
 */
class AvailableDataExpanderPlugin extends AbstractPlugin implements ProductPageDataExpanderInterface
{
    public const PLUGIN_NAME = 'AvailableDataExpanderPlugin';

    /**
     * @param array $productData
     * @param \Generated\Shared\Transfer\ProductPageSearchTransfer $productAbstractPageSearchTransfer
     *
     * @return void
     */
    public function expandProductPageData(array $productData, ProductPageSearchTransfer $productAbstractPageSearchTransfer): void
    {
        $localeTransfer = $this->getFactory()
            ->getLocaleFacade()
            ->getLocale($productAbstractPageSearchTransfer->getLocale());

        $productAbstractAvailabilityTransfer = $this->getFactory()
            ->getAvailabilityFacade()
            ->getProductAbstractAvailability($productAbstractPageSearchTransfer->getIdProductAbstract(), $localeTransfer->getIdLocale());

        $available = $productAbstractAvailabilityTransfer->getAvailability() > 0 ? true : false;
        $productAbstractPageSearchTransfer->setAvailable($available);
    }
}
