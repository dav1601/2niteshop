<?php
namespace App\Repositories;
interface DavjCartInterface {
    public function add__cart($id, $qty = 1, $ins = 0, $color = 0);
    public function update__cart($id, $rowId,  $qty = 1, $ins = 0, $color = 0);
    public function total();
    public function store_cart();
    public function get_rowID_by_id_product($id);
}
