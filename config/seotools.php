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
            'title'        => "TB Kitap 2. El ve İlk Baskı Kitap Klübü", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'TB Kitap - Dashboard'
            'description'  => 'Binlerce 2. El kitap, İlk Baskı Kitaplar ', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['ikinci el kitap','ilk baskı kitaplar', 'plaklar', 'yabamcı dil kitaplar', 'online sahaf'],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'index/follow', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => '3KZHEA4_c6mUCIgdaWei0xRfNHVCnSf9PADyEQm3Fk0',
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
            'title'        => "TB Kitap 2. El ve İlk Baskı Kitap Klübü", // set false to total remove
            'description' => 'TB Kitap', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
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
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'        => "TB Kitap 2. El ve İlk Baskı Kitap Klübü", // set false to total remove
            'description' => 'TB Kitap', // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
