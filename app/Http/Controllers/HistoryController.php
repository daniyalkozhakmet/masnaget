<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;


class HistoryController extends Controller
{
    //
    public function index()
    {
        $histories = History::paginate(10);
        $paginate = request('paginate', 'true');
        return view('history.index', compact('histories', 'paginate'));
    }
    public function filter()
    {
        // Get the filters from the request (may be null)
        $type = request('type');
        $period = request('period');
        $device = request('device');

        // Start building the query from the History model
        $query = History::query();

        // Apply filters based on the available request data
        if ($type) {
            $query->where('type', $type);
        }

        if ($device) {
            $query->where('device', $device);
        }

        // Period filtering logic
        if ($period) {
            switch ($period) {
                case 'Вчера': // Yesterday
                    $query->whereDate('created_at', '=', now()->subDay()->toDateString());
                    break;
                case 'Сегодня': // Today
                    $query->whereDate('created_at', '=', now()->toDateString());
                    break;
                case 'За неделю': // Last week
                    $query->whereDate('created_at', '>=', now()->subWeek()->toDateString());
                    break;
                case 'За месяц': // Last month
                    $query->whereDate('created_at', '>=', now()->subMonth()->toDateString());
                    break;
                case 'За год': // Last year
                    $query->whereDate('created_at', '>=', now()->subYear()->toDateString());
                    break;
                case 'За период': // Custom period (you would need start and end date)
                    $startDate = request('start_date');
                    $endDate = request('end_date');

                    if ($startDate && $endDate) {
                        $query->whereBetween('created_at', [$startDate, $endDate]);
                    }
                    break;
                default:
                    // If no valid period, don't apply period filter
                    break;
            }
        }
        if (!$type && !$period && !$device) {
            $histories = History::paginate(10);
            $paginate = request('paginate', 'true');
            return view('history.index', compact('histories', 'paginate'));
        }
        // Fetch the filtered results
        $histories = $query->get();
        // Get the count of filtered records
        $quantity = $histories->count();
        $paginate = request('paginate', 'true');
        // Return or process the filtered histories
        return view('history.index', compact('histories', 'quantity', 'paginate'));
    }
}
