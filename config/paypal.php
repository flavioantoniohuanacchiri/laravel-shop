<?php

return [
	'client_id' => env("PAYPAL_CLIENT_ID", ""),
    'client_secret' => env("PAYPAL_CLIENT_SECRET", ""),
    'return_url' => URL('/payment-paypal/success'),
    'cancel_url' => URL('/payment-paypal/cancel'),
    'enable_sandbox' => true
];