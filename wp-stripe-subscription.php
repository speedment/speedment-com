<?php
    function stripe_subscription_init() {
        if (get_theme_mod('stripe_sandbox')) {
            \Stripe\Stripe::setApiKey(get_theme_mod('stripe_testSecretKey'));
        } else {
            \Stripe\Stripe::setApiKey(get_theme_mod('stripe_secretKey'));
        }
    }
?>
