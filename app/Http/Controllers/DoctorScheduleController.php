<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\DoctorSchedule;

class DoctorScheduleController extends Controller
{
    //index
    public function index(Request $request)
    {
        //$doctor_schedules = DB::table('doctor_schedules')
        $doctorSchedules = DoctorSchedule::with('doctor')
            ->when($request->input('doctor_id'), function ($query, $doctor_id) {
                return $query->where('doctor_id', 'like', '%' . $doctor_id . '%');
            })
            //sort by doctor name

            ->orderBy('doctor_id', 'asc')
            ->paginate(10);
        return view('pages.doctor_schedules.index', compact('doctorSchedules'));
    }

    //create
    public function create()
    {
        $doctors = Doctor::all();
        return view('pages.doctor_schedules.create', compact('doctors'));
    }
    //store
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'day' => 'required',
            'time' => 'required',

        ]);

        $doctor_schedule = new DoctorSchedule();
        $doctor_schedule->doctor_id = $request->doctor_id;
        $doctor_schedule->day = $request->day;
        $doctor_schedule->time = $request->time;
        $doctor_schedule->status = $request->status;
        $doctor_schedule->note = $request->note;
        $doctor_schedule->save();

        return redirect()->route('doctor_schedules.index');
    }

    //edit
    public function edit($id)
    {
        $doctor_schedule = DoctorSchedule::find($id);
        $doctors = Doctor::all();
        return view('pages.doctor_schedules.edit', compact('doctorSchedules', 'doctors'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required',
            'day' => 'required',
            'time' => 'required',

        ]);

        $doctor_schedule = DoctorSchedule::find($id);
        $doctor_schedule->doctor_id = $request->doctor_id;
        $doctor_schedule->day = $request->day;
        $doctor_schedule->time = $request->time;
        $doctor_schedule->status = $request->status;
        $doctor_schedule->note = $request->note;
        $doctor_schedule->save();

        return redirect()->route('doctor_schedules.index');
    }

    //destroy
    public function destroy($id)
    {
        DoctorSchedule::destroy($id);
        return redirect()->route('doctor_schedules.index');
    }
}
