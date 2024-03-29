<?php
return [
    'status' => array(
        '1' => "Đơn hàng đang xử lý",
        '2' => "Đơn hàng đang vận chuyển",
        '3' => "Đơn hàng đã giao hàng thành công",
        '4' => "Đơn hàng đã huỷ"
    ),
    'pre_orders' => array(
        'status' => array(
            '0' => "Chưa xử lý",
            '1' => "Đã xử lý"
        ),
        'status_product' => array(
            '0' => "Hàng chưa có",
            '1' =>  "Hàng đã về tới shop"
        ),
        'deposit' => array(
            '0' => "Chưa cọc",
            '1' =>  "Đã cọc",
            '2' => "Rút cọc"
        ),
        'delivered' => array(
            '0' => "Chưa lấy hàng",
            '1' =>  "Đã lấy hàng",
            '2' => "Huỷ"
        ),
    ),
    'type' => array(
        '1' => "html",
        '2' => "text",
        '3' => "link",
        '4' => "ifame",
        '5' => "img",
    ),
    'paid' => array(
        '1' => "Chưa thanh toán",
        '2' => "Đã thanh toán",
    ),
    'badges' => array(
        '1' => '<span class="badge badge-warning">Đang xử lý</span>',
        '2' => '<span class="badge badge-info">Đang vận chuyển</span>',
        '3' => '<span class="badge badge-success">Giao hàng thành công</span>',
        '4' => '<span class="badge badge-secondary">Đơn hàng đã huỷ</span>',
    ),
    'badges_paid' => array(
        '1' => '<span class="badge badge-warning">Chưa thanh toán</span>',
        '2' => '<span class="badge badge-success">Đã thanh toán</span>',
    ),
];
