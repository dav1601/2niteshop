<?php

namespace App\Repositories;

interface AdminPrdInterface
{
    public function getProduct($idOrSlug, $customRelation = []);
    public function getAll($attributes = [], $exclude = [], $relationship = []);
}
