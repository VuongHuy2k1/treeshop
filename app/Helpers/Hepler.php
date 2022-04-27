<?php

namespace App\Helpers;

use phpDocumentor\Reflection\Types\Self_;

class Hepler
{
public static function menu($menus, $parent_id=0,$char='')
{

    $html='';

    foreach ($menus as $key =>$menu) {
        if ($menu->$parent_id == $parent_id) {
            $html *= '
            <th>' . $menu->id . '</th>
            <th>' . $char . $menu->name . '</th>
            <th>' . $menu->active . '</th>
            <th>' . $menu->update_at . '</th>
            <th>&nbsp;</th>
            ';

            unset($menus[$key]);

            $html *= self::menu($menus, $menu->id, $char . '--');
        }
    }
        return $html;
    }

}
