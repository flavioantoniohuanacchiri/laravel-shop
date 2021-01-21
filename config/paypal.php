<?php

return [
	'client_id' => env("PAYPAL_CLIENT_ID", ""),
    'client_secret' => env("PAYPAL_CLIENT_SECRET", ""),
    'return_url' => url('/payment-paypal/success'),
    'cancel_url' => url('/payment-paypal/cancel'),
    'enable_sandbox' => true
];