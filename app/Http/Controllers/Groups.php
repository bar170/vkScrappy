<?php

namespace App\Http\Controllers;

use App\Lib\Objects\Group\GroupItem;
use App\Lib\Request\Groups\GroupR;
use Illuminate\Http\Request;

class Groups extends Controller
{
    private GroupR $request;

    public function __construct()
    {
        $this->request = new GroupR();
    }

    public function getListGroups()
    {
        $response = $this->request->getGroups();
        $count = $response['response']['count'];
        $list = $response['response']['items'];
        $groups = [];
        foreach ($list as $item) {
            $group = new GroupItem($item);
            $groups[] = $group;
        }

        $context['count'] = $count;
        $context['groups'] = $groups;

        return view('dashboard.groups.list_groups', $context);
    }
}
