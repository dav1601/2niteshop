<?php

namespace App\Repositories;

use App\Models\Products;
use App\Repositories\AdminPrdInterface;



class AdminPrdRepo implements AdminPrdInterface
{
    public function __construct()
    {
        $this->item_page = config('product.item_page');
        $this->page = 1;
    }
    
    public function pagination($model, $orderBy = [], $page = 1, $item_page)
    {
        try {
            if (!$item_page) {
                $item_page = $this->item_page;
            }
            if (!$model) {
                $model = new Products();
            }
            if (!$orderBy) {
                $key = 'id';
                $sort = 'DESC';
            } else {
                $key = (string) $orderBy[0];
                $sort = (string) $orderBy[1];
            }


            $count = $model->count();
            $start = ($page - 1) * $item_page;
            $number_page = ceil($count / $item_page);
            $result = $model->orderBy($key, $sort)->offset($start)->limit($item_page)->get();
            $result->number_page = $number_page;
            $result->page = $page;
            $result->nextPage = $page + 1;
            $result->prePage = $page - 1;
            $result->count = count($result);
            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
