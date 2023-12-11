<?php

return [
    "module" => [
        "General" => [
            "icon" => 'fa-house',
            "module" => "dashboard",
            "root" => true,
            "childrend" => [
                "dasboard" => [
                    "route" => 'dashboard'
                ]
            ]
        ],
        "Page builder" => [
            "icon" => 'fa-pager',
            "module" => 'pgb',
            "root" => true,
            "childrend" => [
                "quản lý page" => [
                    "route" => "pgb.index"
                ],
                "tạo page" => [
                    "route" => "pgb.create.or.edit"
                ]
            ]
        ],
        "Cấu hình" => [
            "icon" => 'fa-screwdriver-wrench',
            "module" => "configuration",
            "root" => true,
            "childrend" => [
                "xây dựng trang chủ" => [
                    "route" => ""
                ],
                "cấu hình chung" => [
                    "route" => "conf.general"
                ]
            ]
        ],
        "sản phẩm" => [
            "icon" => 'fa-boxes-stacked',
            "module" => "prd",
            "root" => true,
            "childrend" => [
                "danh sách sản phẩm" => [
                    "route" => "show_product",
                ],
                "thêm sản phẩm" => [
                    "route" => "add_product_view",
                ],
                "danh mục sản phẩm" => [
                    "route" => "view-category.product",
                ],
                "danh mục game" => [
                    "route" => "view-category.game",
                ],
                "nhà sản xuất" => [
                    "route" => "prdcer",
                ],
                "chính sách" => [
                    "route" => "plc",
                ],
                "options" => [
                    "route" => "",
                ],


            ]
        ],
        "Users" => [
            "root" => true,
            "module" => "users",
            "icon" => 'fa-users',
            "childrend" => [
                "Thêm" => [
                    "route" => "add_user",
                ],
                "Danh sách" => [
                    "route" => "show_user",
                ],
                "tạo role" => [
                    "route" => "add_roles",
                ],
                "tạo quyền" => [
                    "route" => "add_permissions",
                ],
                "thông tin tài khoản" => [
                    "route" => "admin_profile",
                    "id" => true

                ],
                "cài đặt" => [
                    "route" => "setting_profile",
                    "id" => true

                ],

            ]
        ],
        "Đơn hàng" => [
            "root" => true,
            "module" => "orders",
            "icon" => "fa-receipt",
            "childrend" => [
                "danh sách đƠn hàng" => [
                    "route" => 'show_orders',
                ],
                "danh sách đặt hàng trước" => [
                    "route" => "show_preOrders",
                ],
                "danh sách khách hàng" => [
                    "route" => "customers",
                ],

            ]
        ],
        "bài viết" => [
            "root" => true,
            "module" => "blog",
            "icon" => "fa-blog",
            "childrend" => [
                "danh sách" => [
                    "route" => "show_blogs",
                ],
                "Tạo bài viết" => [
                    "route" => "add_blog_view",
                ],
                "danh mục" => [
                    "route" => "category_blog",
                ],
            ]
        ],
        // "trang" => [
        //     "root" => true,
        //     "icon" => "fa-newspaper",
        //     "childrend" => [
        //         "danh sách" => [
        //             "route" => "manage_pages",
        //         ],
        //     ]
        // ],
    ]
];
