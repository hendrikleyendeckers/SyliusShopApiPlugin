<?php

namespace Sylius\ShopApiPlugin\Command;

use Webmozart\Assert\Assert;

final class ChoosePaymentMethod
{
    /**
     * @var mixed
     */
    private $paymentIdentifier;

    /**
     * @var string
     */
    private $paymentMethod;

    /**
     * @var string
     */
    private $orderToken;

    /**
     * @param string $orderToken
     * @param mixed $paymentIdentifier
     * @param string $paymentMethod
     */
    public function __construct($orderToken, $paymentIdentifier, $paymentMethod)
    {
        Assert::allString([$orderToken, $paymentMethod]);

        $this->orderToken = $orderToken;
        $this->paymentIdentifier = $paymentIdentifier;
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return string
     */
    public function orderToken()
    {
        return $this->orderToken;
    }

    /**
     * @return mixed
     */
    public function paymentIdentifier()
    {
        return $this->paymentIdentifier;
    }

    /**
     * @return string
     */
    public function paymentMethod()
    {
        return $this->paymentMethod;
    }
}
