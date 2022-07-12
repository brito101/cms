<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Shetabit\Visitor\Models\Visit;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::count();
        $pages = Page::count();

        /** Statistics */
        $statistics = $this->accessStatistics();
        $onlineUsers = $statistics['onlineUsers'];
        $percent = $statistics['percent'];
        $access = $statistics['access'];
        $chart = $statistics['chart'];
        $totalAccess = $statistics['totalAccess'];
        $topPages = $statistics['topPages'];

        return view('admin.home.index', compact(
            'users',
            'onlineUsers',
            'percent',
            'access',
            'chart',
            'totalAccess',
            'pages',
            'topPages'
        ));
    }

    public function chart()
    {
        /** Statistics */
        $statistics = $this->accessStatistics();
        $onlineUsers = $statistics['onlineUsers'];
        $percent = $statistics['percent'];
        $access = $statistics['access'];
        $chart = $statistics['chart'];

        return response()->json([
            'onlineUsers' => $onlineUsers,
            'access' => $access,
            'percent' => $percent,
            'chart' => $chart
        ]);
    }

    private function accessStatistics()
    {
        $onlineUsers = User::online()->count();

        $access = Visit::where('created_at', '>=', date("Y-m-d"))
            ->where('url', 'not like', "%admin%")
            ->get();
        $accessYesterday = Visit::where('created_at', '>=', date("Y-m-d", strtotime('-1 day')))
            ->where('created_at', '<', date("Y-m-d"))
            ->where('url', 'not like', "%admin%")
            ->count();

        $totalDaily = $access->count();

        $percent = 0;
        if ($accessYesterday > 0) {
            $percent = number_format((($totalDaily - $accessYesterday) / $totalDaily * 100), 2, ",", ".");
        }

        $totalAccess = Visit::where('url', 'not like', "%admin%")->count();

        /**Visitor Chart */
        $data = $access->groupBy(function ($reg) {
            return date('H', strtotime($reg->created_at));
        });

        $dataList = [];
        foreach ($data as $key => $value) {
            $dataList[$key . 'H'] = count($value);
        }

        $chart = new \stdClass();
        $chart->labels = (array_keys($dataList));
        $chart->dataset = (array_values($dataList));

        /** Top Pages */

        $pages = Visit::where('url', 'not like', "%admin%")->where('method', 'GET')->get();
        $topPages = $pages->groupBy(function ($reg) {
            $basePath = 'http://localhost/cms/public';
            $page = explode("/", str_replace($basePath, '', $reg->url));
            return $page[1] ?? 'home';
        });

        $pageList = [];
        foreach ($topPages as $key => $value) {
            $pageList[ucfirst($key)] = count($value);
        }

        $pages = new \stdClass();
        $pages->labels = (array_keys($pageList));
        $pages->dataset = (array_values($pageList));

        return array(
            'onlineUsers' => $onlineUsers,
            'access' => $totalDaily,
            'percent' => $percent,
            'chart' => $chart,
            'totalAccess' => $totalAccess,
            'topPages' => $pages,
        );
    }
}
