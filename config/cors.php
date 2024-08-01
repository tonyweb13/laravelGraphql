<?php

return [
    'paths' => ['api/*', 'graphql/*'], // Adjust paths according to your needs
    'allowed_methods' => ['*'], // Allow all methods
    'allowed_origins' => ['http://localhost:3000'], // Allow your frontend's URL
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
