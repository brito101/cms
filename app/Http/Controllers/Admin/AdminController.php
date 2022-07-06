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

        return view('admin.home.index', compact(
            'users',
            'onlineUsers',
            'percent',
            'access',
            'chart',
            'totalAccess',
            'pages'
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
        $accessYesterday = Visit::where('created_at', '>=', Carbon::now()->subDays(1))
            ->where('created_at', '<', Carbon::now())
            ->where('url', 'not like', "%admin%")
            ->count();

        $countAccess = $access->count();

        $percent = 0;
        if ($accessYesterday > 0) {
            $percent = number_format((($countAccess - $accessYesterday) / $countAccess * 100), 2, ",", ".");
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

        return array(
            'onlineUsers' => $onlineUsers,
            'access' => $access->count(),
            'percent' => $percent,
            'chart' => $chart,
            'totalAccess' => $totalAccess
        );
    }
}
