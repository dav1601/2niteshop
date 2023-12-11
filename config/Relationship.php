<?php
return [
    'products-ins' =>
    [
        'models' => ["Products", "Insurance"],
        'modelRela' => "ProductIns",
    ],
    'products-options' =>
    [
        'models' => ["Products", "Options"],
        'modelRela' => "ProductOption",
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
