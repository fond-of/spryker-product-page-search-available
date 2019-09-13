<?php

namespace FondOfSpryker\Zed\ProductPageSearchAvailable\Communication\Plugin\PageMapExpander;

use Generated\Shared\Search\PageIndexMap;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageMapExpanderInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

/**
 * @method \FondOfSpryker\Zed\ProductPageSearchAvailable\Communication\ProductPageSearchAvailableCommunicationFactory getFactory()
 */
class AvailablePageMapExpanderPlugin extends AbstractPlugin implements ProductPageMapExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function expandProductPageMap(PageMapTransfer $pageMapTransfer, PageMapBuilderInterface $pageMapBuilder, array $productData, LocaleTransfer $localeTransfer): PageMapTransfer
    {
        if (!array_key_exists(PageIndexMap::LOCALE, $productData) || !array_key_exists('id_product_abstract', $productData)) {
            return $pageMapTransfer;
        }

        $this->addAvailableToPageMapTransfer($pageMapTransfer, $pageMapBuilder, $productData);

        return $pageMapTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     *
     * @return void
     */
    protected function addAvailableToPageMapTransfer(PageMapTransfer $pageMapTransfer, PageMapBuilderInterface $pageMapBuilder, array $productData): void
    {
        $localeTransfer = $this->getFactory()
            ->getLocaleFacade()
            ->getLocale($productData['locale']);

        $productAbstractAvailabilityTransfer = $this->getFactory()
            ->getAvailabilityFacade()
            ->getProductAbstractAvailability($productData['id_product_abstract'], $localeTransfer->getIdLocale());

        $available = $productAbstractAvailabilityTransfer->getAvailability() > 0 ? true : false;

        $pageMapTransfer->setAvailable($available);
        $pageMapBuilder->addSearchResultData($pageMapTransfer, PageMapTransfer::AVAILABLE, $available);
    }
}
