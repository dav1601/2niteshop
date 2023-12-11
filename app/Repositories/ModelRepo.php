<?php

namespace App\Repositories;

use App\Models\Products;
use App\Repositories\ModelInterface;
use stdClass;

class ModelRepo implements ModelInterface
{

    public function __construct()
    {
    }
    public function pagination($query = null, $orderBy = ["id", "desc"], $page = 1, $items = 16, $pluck = [])
    {

        $key = (string) $orderBy[0];
        $sort = strtoupper((string) $orderBy[1]);
        $result = new stdClass();
        try {
            $count = $query->count();
            $start = ($page - 1) * $items;
            $number_page = ceil($count / $items);
            $data = $query->orderBy($key, $sort)->offset($start)->limit($items)->get()->pluck($pluck);
            $result->data = $data;
            $result->number_page = (int)  $number_page;
            $result->page = (int)  $page;
            $result->count = (int) count($result->data);
            $result->all = (int) $count;
            $result->error = null;
        } catch (\Exception $e) {
            $result->error = $e->getMessage();
        }
        return $result;
    }
}
