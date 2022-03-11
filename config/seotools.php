<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "2NITE Game Store | Cửa hàng chuyên phân phối các sản phẩm Game uy tín tại Sài Gòn", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => '2NITE Game Store | Chuyên trang Game HaLo Shop. Nơi cung cấp đầy đủ các sản phẩm game Playstation, Xbox, Nintendo chính hãng, uy tín chất lượng tại Sài Gòn.', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => 'playstation, xbox, nintendo, ps4, ps3, ps4 slim, ps4 pro, ps4 chinh hang, ps4 gia re, xbox one, xbox 360, xbox one x, xbox one s, xbox series x, xbox one chinh hang, xbox one gia re',
            'canonical'    => 'current', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => '2NITE Game Store | Cửa hàng chuyên phân phối các sản phẩm Game uy tín tại Sài Gòn', // set false to total remove
            'description' => '2NITE Game Store | Chuyên trang Game HaLo Shop. Nơi cung cấp đầy đủ các sản phẩm game Playstation, Xbox, Nintendo chính hãng, uy tín chất lượng tại Sài Gòn.', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary',
            'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => '2NITE Game Store | Cửa hàng chuyên phân phối các sản phẩm Game uy tín tại Sài Gòn', // set false to total remove
            'description' => '2NITE Game Store | Chuyên trang Game HaLo Shop. Nơi cung cấp đầy đủ các sản phẩm game Playstation, Xbox, Nintendo chính hãng, uy tín chất lượng tại Sài Gòn.', // set false to total remove
            'url'         =>  'current', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
