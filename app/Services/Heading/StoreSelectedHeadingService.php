<?php

namespace App\Services\Heading;

use App\Models\Heading;


class StoreSelectedHeadingService {

    public function execute($heading,$selectedHeading,$user)
    {
        foreach($selectedHeading as $key => $selected) {
        $data = Heading::create([
                'user_id' => $user,
                'heading_id' => $heading,
                'heading_title' => $selected['header_title'],
                'heading_type' => $selected['header_type'],
                'is_started' => 1,
            ]);
        }
    return $data;
    }
}
