<?php
require __DIR__ . '/../vendor/autoload.php';

use Services\BonusPlusService;
use Controllers\BonusPlusController;

// Initialize the BonusPlusService
$bonusPlusService = new BonusPlusService();

// Initialize the BonusPlusController
$bonusPlusController = new BonusPlusController($bonusPlusService);

// Example usage
$phone = '1234567890';
$customerData = [
    'phone' => $phone,
    'name' => 'John Doe',
    // other customer data
];

// Get customer
$customer = $bonusPlusController->getCustomer($phone);
print_r($customer);
exit;
// Create or update customer
$response = $bonusPlusController->createOrUpdateCustomer($customerData);
print_r($response);

// Calculate order
$orderData = [
    'phone' => $phone,
    'store' => 'store_id',
    'items' => [
        [
            'sum' => 100,
            'qnt' => 1,
            'product' => 'product_id',
            'ds' => 0
        ]
    ]
];
$calculation = $bonusPlusController->calculateOrder($orderData);
print_r($calculation);

// Reserve bonuses
$reserveData = [
    'phone' => $phone,
    'bonusDebit' => 10
];
$reserve = $bonusPlusController->reserveBonuses($reserveData);
print_r($reserve);

// Complete order
$orderData['bonusDebit'] = 10;
$orderData['externalId'] = 'order_id';
$completeOrder = $bonusPlusController->completeOrder($orderData);
print_r($completeOrder);

// Return order
$returnData = [
    'ext' => 'order_id_1',
    'sum' => 50
];
$returnOrder = $bonusPlusController->returnOrder($returnData);
print_r($returnOrder);