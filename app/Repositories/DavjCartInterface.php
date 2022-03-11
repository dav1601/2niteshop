<?php 
namespace App\Repositories;
interface DavjCartInterface {
    public function add__cart($id, $sub_total = 0, $qty = 1, $ins = 0, $color = 0);
    public function update__cart($id, $rowId, $sub_total = 0, $qty = 1, $ins = 0, $color = 0);
    public function total();
    public function store_cart();
}