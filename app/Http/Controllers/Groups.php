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
        $response = $this->request->getGroups(11);
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

    public function getDetailGroup($id)
    {
        $response = $this->request->getGroup($id, 100);
        $item = $response['response'][0];
        $group = new GroupItem($item, true);

        $context = [
            'item' => $group,
        ];

        return view('dashboard.groups.detail_group', $context);
    }
}
