<?php
curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
curl_setopt($ch, CURLOPT_USERPWD, 'AXbdG45D7opAtBbAbOj4dCOe2MXRoroD77wBEshpP2-VrwealpO8VQXmLRFb3jT4AuwXrDhthWQQOfCR' .':' . 'EPHdIZrOAfVZoCQqFOGca8YpL8cC0DQgIiS4e4-RmTlQWEWdkhLWGBLW3p5QPu_TTH3-hy9IGvV8OtNX');