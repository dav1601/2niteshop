<?php

namespace App\Repositories;

interface CustomerInterface
{
    public function vip($amount);
    public function UpdateOrCreateCustomer($ordered);
    public function stats($total, $total_cost);
    public function updateNameAuthor();
}
