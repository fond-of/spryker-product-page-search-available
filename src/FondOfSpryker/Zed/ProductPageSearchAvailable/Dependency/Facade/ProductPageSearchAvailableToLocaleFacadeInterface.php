<?php


namespace FondOfSpryker\Zed\ProductPageSearchAvailable\Dependency\Facade;

use Generated\Shared\Transfer\LocaleTransfer;

interface ProductPageSearchAvailableToLocaleFacadeInterface
{
    /**
     * @param string $localeName
     *
     * @return \Generated\Shared\Transfer\LocaleTransfer
     */
    public function getLocale(string $localeName): LocaleTransfer;
}
