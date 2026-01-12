<?php namespace ProcessWire;

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$data = [
    "logo" => $page->site_logo ? $page->site_logo->url : null,
    "menu" => [],
    "hero_title" => $page->hero_title,
    "hero_desc"  => $page->hero_description,
    "hero_img"   => $page->hero_image ? $page->hero_image->url : null,
    "home_title" => $page->home_title,
    "home_desc"  => $page->home_description,
    "home_img"   => $page->home_image ? $page->home_image->url : null,
    "home_subtitle" => $page->home_subtitle,
    "email_image"   => $page->email_image ? $page->email_image->url : null,
    "location_image"   => $page->location_image ? $page->location_image->url : null,
    "location_title" => $page->location_title,
    "location_intro"  => $page->location_intro,
    "location_outroduction"  => $page->location_outroduction,
     "footer_logo"   => $page->footer_logo ? $page->footer_logo->url : null,
    "footer_email" => $page->footer_email,
"services" => [],
"gallery" => []
];

foreach($page->nav_links as $item) {
    $data["menu"][] = [
        "label" => $item->nav_label
    ];
}

foreach($page->s_list as $item) {
    $data["services"][] = [
        "t" => $item->s_title,
        "d" => $item->s_desc,
        "i" => $item->s_img ? $item->s_img->url : null
    ];
}


foreach($page->gallery_grid as $item) { 
    $data["gallery"][] = [
        "img" => $item->gallery_image ? $item->gallery_image->url : null
    ];
}

$data["location_features"] = []; 

if(count($page->location_features)) {
    foreach($page->location_features as $item) {
        $data["location_features"][] = [
            "titel" => $item->feature_title,
            "tekst" => $item->feature_desc
        ];
    }
}
echo json_encode($data);
exit();