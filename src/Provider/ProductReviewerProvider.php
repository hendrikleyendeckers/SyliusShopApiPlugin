<?php

declare(strict_types = 1);

namespace Sylius\ShopApiPlugin\Provider;

use Sylius\Component\Core\Model\ProductReviewerInterface;
use Webmozart\Assert\Assert;

final class ProductReviewerProvider implements ProductReviewerProviderInterface
{
    /**
     * @var CustomerProviderInterface
     */
    private $customerProvider;

    public function __construct(CustomerProviderInterface $customerProvider)
    {
        $this->customerProvider = $customerProvider;
    }

    public function provide(string $email): ProductReviewerInterface
    {
        /** @var ProductReviewerInterface $reviewer */
        $reviewer = $this->customerProvider->provide($email);

        Assert::isInstanceOf($reviewer, ProductReviewerInterface::class);

        return $reviewer;
    }
}
