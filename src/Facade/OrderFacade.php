<?php

namespace Facade;

use Services\CartService;
use Services\PaymentService;
use Services\NotificationService;

class OrderFacade
{
    private $cartService;
    private $paymentService;
    private $notificationService;

    public function __construct()
    {
        $this->cartService = new CartService();
        $this->paymentService = new PaymentService();
        $this->notificationService = new NotificationService();
    }

    public function placeOrder(): void
    {
        if ($this->cartService->validateCart()) {
            if ($this->paymentService->processPayment()) {
                $this->notificationService->sendOrderConfirmation();
                echo "Pedido completado con éxito.\n";
            } else {
                echo "Error en el procesamiento del pago.\n";
            }
        } else {
            echo "Error en la validación del carrito.\n";
        }
    }
}
