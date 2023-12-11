<?php

namespace App\Repositories;

use App\Http\Traits\Responser;
use App\Models\Products;
use App\Repositories\AdminPrdInterface;



class AdminPrdRepo implements AdminPrdInterface
{
    use Responser;
    /**
     * Class constructor.
     */
    public $repoModel;
    public $relationship;
    public $model;
    public function __construct(ModelInterface $repoModel)
    {
        $this->repoModel = $repoModel;
        $this->relationship = ['gallery', 'gallery.image_large', 'gallery.thumbnail', 'policies', 'user', 'categories', 'options', 'cat_game', 'blocks', 'bundled_products', 'related_blogs', 'producer', 'type', 'img_first', 'img_second'];
        $this->model = new Products();
    }

    public function getProduct($idOrSlug, $customRelation = [])
    {
        $query = $this->model->where('id', $idOrSlug)->orWhere('slug', $idOrSlug);
        $query = count($customRelation) <= 0 ?  $query->with($this->relationship) : $query->with($customRelation);

        try {
            $product = $query->firstOrFail();
            return $this->returnS($product);
        } catch (\Exception $e) {
            return $this->returnE($e->getMessage());
        }
    }
    public  function getAll($attrs = [], $exclude = [], $relationship = [])
    {
        $sortField = array_key_exists("sortField", $attrs) ? $attrs["sortField"] : "id";
        $sort =  array_key_exists("sort", $attrs) ? $attrs["sort"] : "desc";
        $page = array_key_exists("page", $attrs) ? (int) $attrs["page"] : 1;
        $items = array_key_exists("items", $attrs) ? (int) $attrs["items"] : 16;
        $relationship = array_unique(array_merge(['img_first', "img_second"], $relationship));
        $query = $this->model;
        if (array_key_exists("name", $attrs)) {
            if ($attrs["name"]) {
                $name = $attrs["name"];
                $query = $query->where('name', 'LIKE', '%' . $name . '%');
            }
        }
        if (array_key_exists("usage", $attrs)) {
            if ($attrs['usage']) {
                $usage = $attrs["usage"];
                $query = $query->where('usage_stt', $usage);
            }
        }
        if (array_key_exists("model", $attrs)) {
            if ($attrs['model']) {
                $query = $query->where('model',  'LIKE', '%' . $attrs['model'] . '%');
            }
        }

        if (array_key_exists("status", $attrs)) {
            if ($attrs['status']) {
                $query = $query->where('status', (int) $attrs['status']);
            }
        }
        if (array_key_exists("producer", $attrs)) {
            if ($attrs['producer']) {
                $query = $query->where('producer_id', (int) $attrs['producer']);
            }
        }
        if (array_key_exists("categories", $attrs)) {
            if ($attrs['categories']) {
                $categories = is_array($attrs['categories']) ? $attrs['categories']  : explode(",", $attrs['categories']);
                $query = $query->whereHas('categories', function ($q) use ($categories) {
                    $q->whereIn('category_id', $categories);
                });
            }
        }
        if (array_key_exists("author", $attrs)) {
            if ($attrs['author']) {
                $author = $attrs["author"];
                $query = $query->whereHas('user', function ($q) use ($author) {
                    $q->where('name', 'LIKE', "%" . $author . "%");
                });
            }
        }
        if (array_key_exists("priceMin", $attrs) && array_key_exists("priceMax", $attrs)) {
            if ($attrs['priceMin'] && $attrs['priceMax']) {
                $query = $query->whereBetween("price", [$attrs['priceMin'],  $attrs['priceMax']]);
            }
        }

        $query = $query->with($relationship);
        // $query = $query->exclude($exclude);
        $products = $this->repoModel->pagination($query, [$sortField, $sort], $page, $items);
        if ($products->error) {
            return $this->returnE($products->error);
        }
        return $this->returnS($products);
    }
}
