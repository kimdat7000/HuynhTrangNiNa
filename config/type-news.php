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
    'tin-tuc' => [
        'title_main' => "Tin tức",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'Tin tức'
        ],
        'dropdown' => false,
        'tags' => false,
        'view' => true,
        'copy' => false,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '400',
                'height' => '400',
                'thumb' => '400x400x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
        // 'gallery' => [
        //     'dich-vu-tien-ich' => [
        //         "title_main_photo" => "Hình ảnh sản phẩm",
        //         "title_sub_photo" => "Hình ảnh",
        //         "status_photo" => ["hienthi" => "Hiển thị"],
        //         "number_photo" => 3,
        //         "images_photo" => true,
        //         "avatar_photo" => true,
        //         "name_photo" => true,
        //         "width_photo" => 550,
        //         "height_photo" => 730,
        //         "thumb_photo" => '100x100x1'
        //     ],
        // ],
        // 'categories' => [
        //     'list' => [
        //         'title_main_categories' => "Danh mục cấp 1",
        //         'copy_categories' => false,
        //         'images' => [
        //             'photo' => [
        //                 'title' => 'Ảnh đại diện',
        //                 'width' => '500',
        //                 'height' => '500',
        //                 'thumb' => '500x500x1'
        //             ],
        //             'icon' => [
        //                 'title' => 'Ảnh đại diện',
        //                 'width' => '25',
        //                 'height' => '25',
        //                 'thumb' => '25x25x1'
        //             ]
        //         ],
        //         'slug_categories' => true,
        //         'status_categories' => ["hienthi" => "Hiển thị", "noibat" => "Nổi bật"],
        //         'gallery_categories' => [],
        //         'name_categories' => true,
        //         'desc_categories' => true,
        //         'desc_categories_cke' => false,
        //         'content_categories' => false,
        //         'content_categories_cke' => false,
        //         'seo_categories' => true,
        //     ],
        //     'cat' => [
        //         'title_main_categories' => "Danh mục cấp 2",
        //         'copy_categories' => false,
        //         'images' => [
        //             'photo' => [
        //                 'title' => 'Ảnh đại diện',
        //                 'width' => '500',
        //                 'height' => '500',
        //                 'thumb' => '500x500x1'
        //             ],
        //             'icon' => [
        //                 'title' => 'Ảnh đại diện',
        //                 'width' => '25',
        //                 'height' => '25',
        //                 'thumb' => '25x25x1'
        //             ]
        //         ],
        //         'slug_categories' => true,
        //         'status_categories' => ["hienthi" => "Hiển thị"],
        //         'gallery_categories' => [],
        //         'name_categories' => true,
        //         'desc_categories' => true,
        //         'desc_categories_cke' => false,
        //         'content_categories' => false,
        //         'content_categories_cke' => false,
        //         'seo_categories' => true,
        //     ],
        //     'item' => [
        //         'title_main_categories' => "Danh mục cấp 3",
        //         'copy_categories' => false,
        //         'images' => [
        //             'photo' => [
        //                 'title' => 'Ảnh đại diện',
        //                 'width' => '500',
        //                 'height' => '500',
        //                 'thumb' => '500x500x1'
        //             ],
        //             'icon' => [
        //                 'title' => 'Ảnh đại diện',
        //                 'width' => '25',
        //                 'height' => '25',
        //                 'thumb' => '25x25x1'
        //             ]
        //         ],
        //         'slug_categories' => true,
        //         'status_categories' => ["hienthi" => "Hiển thị"],
        //         'gallery_categories' => [],
        //         'name_categories' => true,
        //         'desc_categories' => true,
        //         'desc_categories_cke' => false,
        //         'content_categories' => false,
        //         'content_categories_cke' => false,
        //         'seo_categories' => true,
        //     ],
        //     'sub' => [
        //         'title_main_categories' => "Danh mục cấp 4",
        //         'copy_categories' => false,
        //         'images' => [
        //             'photo' => [
        //                 'title' => 'Ảnh đại diện',
        //                 'width' => '500',
        //                 'height' => '500',
        //                 'thumb' => '500x500x1'
        //             ],
        //             'icon' => [
        //                 'title' => 'Ảnh đại diện',
        //                 'width' => '25',
        //                 'height' => '25',
        //                 'thumb' => '25x25x1'
        //             ]
        //         ],
        //         'slug_categories' => true,
        //         'status_categories' => ["hienthi" => "Hiển thị"],
        //         'gallery_categories' => [],
        //         'name_categories' => true,
        //         'desc_categories' => true,
        //         'desc_categories_cke' => false,
        //         'content_categories' => false,
        //         'content_categories_cke' => false,
        //         'seo_categories' => true,
        //     ]
        // ]
    ],
    'dich-vu' => [
        'title_main' => "Dịch vụ",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'Dịch vụ'
        ],
        'dropdown' => false,
        'tags' => false,
        'view' => true,
        'copy' => false,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '365',
                'height' => '262',
                'thumb' => '365x262x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
    ],
    'tieu-chi' => [
        'title_main' => "Tiêu chí",
        'copy' => false,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'show_images' => false,
        'name' => true,
        'desc' => true,
    ],
    'chinh-sach' => [
        'title_main' => "Chính sách",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => null
        ],
        'dropdown' => false,
        'tags' => false,
        'view' => true,
        'copy' => false,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '200',
                'height' => '200',
                'thumb' => '200x200x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
    ],
    // 'hinh-thuc-thanh-toan' => [
    //     'title_main' => "Hình thức thanh toán",
    //     'dropdown' => false,
    //     'list' => false,
    //     'tags' => false,
    //     'view' => false,
    //     'copy' => false,
    //     'datePublish' => false,
    //     'copy_image' => false,
    //     'comment' => false,
    //     'slug' => false,
    //     'status' => ["hienthi" => "Hiển thị"],
    //     'images' => false,
    //     'icon' => false,
    //     'show_images' => false,
    //     'name' => true,
    //     'desc' => true,
    //     'content' => false,
    //     'content_cke' => false,
    //     'seo' => false,
    //     'schema' => false,
    //     'width' => 420,
    //     'height' => 288,
    //     'thumb' => '100x100x1',
    //     'width_icon' => 30,
    //     'height_icon' => 30,
    //     'thumb_icon' => '100x100x1',
    // ]
];
