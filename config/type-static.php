<?php

/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.1.1 
 * Date 18-09-2024
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

return [
    'gioi-thieu' => [
        'title_main' => "Giới thiệu",
        'website' => [
            'type' => 'object',
            'title' => 'gioithieu'
        ],
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'images' => [
            'photo' => [
                'title' =>  'Hình ảnh 1',
                'width' => '502',
                'height' => '557',
                'thumb' => '502x557x1'
            ],
            'photo1' => [
                'title' =>  'Hình ảnh 2',
                'width' => '400',
                'height' => '400',
                'thumb' => '400x400x1'
            ]
        ],
        'name' => true,
        'desc' => true,
        'desc_cke' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
    ],
    'lienhe' => [
        'title_main' => "Liên hệ",
        'website' => [
            'title' => 'lienhe'
        ],
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'images' => [
            'photo' => [
                'title' =>  'Hình ảnh',
                'width' => '300',
                'height' => '200',
                'thumb' => '300x200x1'
            ]
        ],
        'name' => false,
        'content' => true,
        'content_cke' => true,
        'seo' => true
    ],
    'footer' => [
        'title_main' => "Footer",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'images' => [
            // 'photo' => [
            //     'title' =>  'Hình ảnh',
            //     'width' => '300',
            //     'height' => '300',
            //     'thumb' => '300x300x1'
            // ]
        ],
        'name' => true,
        'desc' => false,
        'content' => true,
        'content_cke' => true,
    ],
    'slogan' => [
        'title_main' => "Slogan",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ],
    'copyright' => [
        'title_main' => "Copyright",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ]
];
