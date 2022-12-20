<?php

namespace App\Repositories;

use App\Models\Products;
use App\Repositories\ModelInterface;
use stdClass;

class ModelRepo implements ModelInterface
{
    public function __construct()
    {
        $this->item_page = config('product.item_page');
    }
    public function pagination($query = null, $orderBy = [], $page = 1, $item_page, $pluck = [])
    {

        try {
            if (!$page) {
                $page = 1;
            }

            if (!$item_page) {
                $item_page = $this->item_page;
            }
            if (!$orderBy) {
                $key = 'id';
                $sort = 'DESC';
            } else {
                $key = (string) $orderBy[0];
                $sort = strtoupper((string) $orderBy[1]);
            }
            $count = $query->count();
            $start = ($page - 1) * $item_page;
            $number_page = ceil($count / $item_page);
            $result = new stdClass();
            $result->data = $query->orderBy($key, $sort)->offset($start)->limit($item_page)->get()->pluck($pluck);
            $result->number_page = (int)  $number_page;
            $result->page = (int)  $page;
            $result->nextPage = (int)  $page + 1;
            $result->prePage = (int)  $page - 1;
            $result->count = (int) count($result->data);
            return $result;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
