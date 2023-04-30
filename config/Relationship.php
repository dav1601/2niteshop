<?php
return [
    'products-ins' =>
    [
        'models' => ["Products", "Insurance"],
        'modelRela' => "ProductIns",
    ],

    'product-products' =>
    [
        'models' => ["Products", "Products"],
        'modelRela' => "RelatedProducts",
    ],

    'products-plc' =>
    [
        'models' => ["Products", "Policy"],
        'modelRela' => "ProductPlc",
    ],

    'products-blogs' =>
    [
        'models' => ["Products", "Blogs"],
        'modelRela' => "PrdRelaBlog",
    ],

    'products-block' =>
    [
        'models' => ["Products", "BlockProduct"],
        'modelRela' => "PrdRelaBlock",
    ],

    'blogs-pgb' => [
        'models' => ["Blogs", "PageBuilder"],
        'modelRela' => "PgbBlog",
    ]


];
