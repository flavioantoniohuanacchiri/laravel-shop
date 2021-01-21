<?php

return [
	'client_id' => env("PAYPAL_CLIENT_ID", ""),
    'client_secret' => env("PAYPAL_CLIENT_SECRET", ""),
    'return_url' => env("PAYPAL_RETURN_URL", ""),
    'cancel_url' => env("PAYPAL_CANCEL_URL", ""),
    'enable_sandbox' => true
];