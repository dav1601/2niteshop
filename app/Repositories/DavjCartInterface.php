<?php

namespace App\Repositories;

interface DavjCartInterface
{
    public function add__or_update($id = 0, $qty = 1, $op_actives = "", $options = [], $realTimeUpdateProduct = false, $instance = "shopping");
    public function update__cart($id, $rowId,  $qty = 1, $ins = 0, $color = 0);
    public function total();
    public function full_update();
    public function store_cart();
    public function get_rowID_by_id_product($id);
}
