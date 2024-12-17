<?php

namespace App\Http\Controllers;

use App\Models\WorkingHour;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class WorkingHourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return WorkingHour::all();
        }
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $hours = [];
        foreach (range(0, 23) as $hour) {
            $hours[] = sprintf('%02d:00', $hour); // Format hours as 00:00, 01:00, etc.
        }

        return view('admin.working_hours.index', compact('days', 'hours'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'day' => ['required', 'string', 'max:255', 'unique:working_hours,day,' . $request->input('id')],
            'opening_time' => ['required', 'string', 'max:255'],
            'closing_time' => ['required', 'string', 'max:255'],
        ], [
            'day.unique' => 'The working hour day must be unique.',
            'day.required' => 'The working hour day is required.',
            'day.max' => 'The working hour day must be 255 characters or less.',
            'opening_time.required' => 'The working hour opening time is required.',
            'closing_time.required' => 'The working hour closing time is required.',
        ]);

        // Map days to their numeric values (Monday = 1, ..., Sunday = 7)
        $dayOrder = [
            'Monday' => 1,
            'Tuesday' => 2,
            'Wednesday' => 3,
            'Thursday' => 4,
            'Friday' => 5,
            'Saturday' => 6,
            'Sunday' => 7,
        ];

        $data['day_of_week'] = $dayOrder[$data['day']];


        $id = $request->input('id');
        if ($id) {
            $workingHour = WorkingHour::query()->find($id);
            $workingHour->update($data);
        } else {
            $workingHour = new WorkingHour();
        }

        $workingHour->fill($data);
        $workingHour->save();
// Clear the cache
        Cache::forget('working_days');
        if (\request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Working hour has been created!',
                'data' => $workingHour,
            ], ResponseAlias::HTTP_CREATED);
        }

        return redirect()->back()->with('success', 'Working hour has been created!');
    }


    /**
     * Display the specified resource.
     */
    public function show(WorkingHour $workingHour)
    {
        return $workingHour;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkingHour $workingHour)
    {
        $workingHour->delete();
        // Clear the cache
        Cache::forget('working_days');
        return response()->json(['message' => 'Working hour deleted successfully.'], 200);
    }
}
