<?php
namespace Controllers;

use Services\BonusPlusService;

class BonusPlusController {
    private $bonusPlusService;

    public function __construct(BonusPlusService $bonusPlusService) {
        $this->bonusPlusService = $bonusPlusService;
    }

    public function getCustomer($phone) {
        return $this->bonusPlusService->getCustomer($phone);
    }

    public function createOrUpdateCustomer($customerData) {
        return $this->bonusPlusService->createOrUpdateCustomer($customerData);
    }

    public function calculateOrder($orderData) {
        return $this->bonusPlusService->calculateOrder($orderData);
    }

    public function reserveBonuses($reserveData) {
        return $this->bonusPlusService->reserveBonuses($reserveData);
    }

    public function completeOrder($orderData) {
        return $this->bonusPlusService->completeOrder($orderData);
    }

    public function returnOrder($returnData) {
        return $this->bonusPlusService->returnOrder($returnData);
    }
}