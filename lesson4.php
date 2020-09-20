<?php

/**
 * task 1 : метод по выставлению счета
 */

// Service/Billing/BillingInterface
interface BillingInterface
{
    /**
     * Рассчёт стоимости доставки заказа
     * @param float $totalPrice
     * @return void
     * @throws BillingException
     */
    public function pay(float $totalPrice): void;
}
// Service/Billing/Transfer/Card
class Card implements BillingInterface
{
    /**
     * @inheritdoc
     */
    public function pay(float $totalPrice): void
    {
        // Оплата кредитной или дебетовой картой
    }
}
// Service/Order/Basket
class Basket {
    public function checkout(): void
    {
        // Здесь должна быть некоторая логика выбора способа платежа
        $billing = new Card();

        // Здесь должна быть некоторая логика получения информации о скидке
        // пользователя
        $discount = new NullObject();

        // Здесь должна быть некоторая логика получения способа уведомления
        // пользователя о покупке
        $communication = new Email();

        $security = new Security($this->session);

        $this->checkoutProcess($discount, $billing, $security, $communication);
    }
}

/**
 * task 2
 */

// смотрите в файлах

/**
 * task 3
 */

// смотрите в файлах

