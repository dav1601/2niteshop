<?php

namespace App\Repositories;

use App\Models\Products;
use App\Repositories\AdminPrdInterface;



class AdminPrdRepo implements AdminPrdInterface
{
    public $page;
    public $item_page;
    public function __construct()
    {
        $this->item_page = config('product.item_page');
        $this->page = 1;
    }
    public function product($id)
    {
        return Products::with(['gll', 'policies', 'user', 'categories', 'ins', 'cat_game', 'blocks', 'bundled_products', 'related_blogs', 'producer'])->where('id', $id)->orWhere('slug', $id)->firstOrFail();
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
            return false;
        }
    }
}
