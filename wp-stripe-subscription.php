<?php
    function stripe_subscription_init() {
        if (!isset($_POST['buyEmail'])
        ||  !isset($_POST['buyPlan'])
        ||  !isset($_POST['buyAddon'])
        ||  !isset($_POST['stripeToken'])) return;
    
        // Parse parameters
        $buyQuantity = intval($_POST['buyQuantity']);
        if ($_POST['buyPlan'] == 'monthly') {
            $buyPlan = get_theme_mod('stripe_monthlyPlan');
        } else if ($_POST['buyPlan'] == 'yearly') {
            $buyPlan = get_theme_mod('stripe_yearlyPlan');
        } else {
            return new WP_Error('broke', __("Invalid POST parameter 'buyPlan'.", 'my_textdomain'));
        }
    
        // Set the correct API key depending on sandbox preference
        if (get_theme_mod('stripe_sandbox')) {
            \Stripe\Stripe::setApiKey(get_theme_mod('stripe_testSecretKey'));
        } else {
            \Stripe\Stripe::setApiKey(get_theme_mod('stripe_secretKey'));
        }
        
        // Create the customer
        $customer = \Stripe\Customer::create(array(
            'email'  => $_POST['buyEmail'],
            'source' => $_POST['stripeToken']
        ));
        
        // Create the addon invoice item
        $addonCost = intval(get_theme_mod('stripe_addonCost'));
        if (isset($_POST['buyAddon']) 
        &&  $_POST['buyAddon'] == 'true' 
        &&  $addonCost > 0) {
            \Stripe\Invoiceitem::create(array(
                'customer'    => $customer->id,
                'amount'      => $addonCost,
                'currency'    => 'usd',
                'description' => get_theme_mod('stripe_addonText'),
            ));
        }
        
        // Create the subscription
        \Stripe\Subscription::create(array(
            'customer' => $customer->id,
            'metadata' => array(
                'name'     => $_POST['buyFirstname'],
                'email'    => $_POST['buyEmail'],
                'company'  => $_POST['buyCompany'],
                'phone'    => $_POST['buyPhone'],
                'country'  => $_POST['buyCountry'],
                'state'    => $_POST['buyState'],
                'city'     => $_POST['buyCity'],
                'zip'      => $_POST['buyZip'],
                'address1' => $_POST['buyAddress1'],
                'address2' => $_POST['buyAddress2']
            ),
            'items'    => array(array(
                'plan'     => $buyPlan,
                'quantity' => $buyQuantity,
            )),
        ));
    }
?>
