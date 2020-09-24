<?php


namespace Service\Order;


use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\User\Security;

class BasketBuilder
{
    private $billing;
    private $discount;
    private $communication;
    private $security;
    private $session;

    public function setBilling (Card $card) {
        $this->billing = $card;
        return $this;
    }
    public function getBilling () {
        return $this->billing;
    }

    public function setDiscount (NullObject $discount) {
        $this->discount = $discount;
        return $this;
    }
    public function getDiscount () {
        return $this->discount;
    }

    public function setCommunication (Email $email) {
        $this->communication = $email;
        return $this;
    }
    public function getCommunication () {
        return $this->communication;
    }

    public function setSecurity (Security $security) {
        $this->security = $security;
        return $this;
    }
    public function getSecurity () {
        return $this->security;
    }

    public function getSession (){
        return $this->session;
    }
    public function setSession (SessionInterface $session){
        $this->session = $session;
        return $this;
    }

    public function build(): Basket
    {
        return new Basket($this);
    }

}
