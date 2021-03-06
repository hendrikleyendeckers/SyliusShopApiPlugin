<?php

namespace spec\Sylius\ShopApiPlugin\Command;

use PhpSpec\ObjectBehavior;
use Sylius\ShopApiPlugin\Command\PutVariantBasedConfigurableItemToCart;

final class PutVariantBasedConfigurableItemToCartSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('ORDERTOKEN', 'T_SHIRT_CODE', 'RED_SMALL_T_SHIRT_CODE', 5);
    }

    function it_has_order_token()
    {
        $this->orderToken()->shouldReturn('ORDERTOKEN');
    }

    function it_has_product_code()
    {
        $this->product()->shouldReturn('T_SHIRT_CODE');
    }

    function it_has_product_variant_code()
    {
        $this->productVariant()->shouldReturn('RED_SMALL_T_SHIRT_CODE');
    }

    function it_has_quantity()
    {
        $this->quantity()->shouldReturn(5);
    }

    function it_throws_an_exception_if_order_token_is_not_a_string()
    {
        $this->beConstructedWith(new \stdClass(), 'T_SHIRT_CODE', 'RED_SMALL_T_SHIRT_CODE', 1);

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function it_throws_an_exception_if_product_code_is_not_a_string()
    {
        $this->beConstructedWith('ORDERTOKEN', new \stdClass(), 'RED_SMALL_T_SHIRT_CODE', 1);

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function it_throws_an_exception_if_product_variant_code_is_not_a_string()
    {
        $this->beConstructedWith('ORDERTOKEN', 'T_SHIRT_CODE', new \stdClass(), 1);

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function it_throws_an_exception_if_quantity_is_not_less_then_0()
    {
        $this->beConstructedWith('ORDERTOKEN', 'T_SHIRT_CODE', 'RED_SMALL_T_SHIRT_CODE', 0);

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }
}
