<?php


namespace Service\Order;

/**
 * task1
 */

class BasketFacade
{
    private $billing;
    private $discount;
    private $communication;
    private $security;

    public function __construct(
    )
    {
        $basketBuilder = new BasketBuilder();
        $this->billing = $basketBuilder->getBilling();
        $this->discount = $basketBuilder->getDiscount();
        $this->communication = $basketBuilder->getCommunication();
        $this->security = $basketBuilder->getSecurity();
    }

    public function checkout () {
        $this->checkoutProcess($this->billing, $this->discount, $this->communication, $this->security);
    }

    public function checkoutProcess ($billing, $discount, $communication, $security) {
        $totalPrice = 0;
        foreach ($this->getProductsInfo() as $product) {
            $totalPrice += $product->getPrice();
        }

        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $billing->pay($totalPrice);

        $user = $security->getUser();
        $communication->process($user, 'checkout_template');
    }
}
