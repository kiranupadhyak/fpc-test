<?php

class Modules_FpcTest_CustomButtons extends pm_Hook_CustomButtons
{
    public function getButtons()
    {
        return [[
            'description' => 'FPC Test',
            'link' => '/../modules/fpc-test/index.php',
            'newWindow' => true,
            'place' => [
                self::PLACE_ADMIN_NAVIGATION,
                self::PLACE_DOMAIN,
            ],
            'title' => 'FPC Test',
        ]];
    }
}
