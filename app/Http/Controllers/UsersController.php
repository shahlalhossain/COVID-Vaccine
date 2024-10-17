<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use App\Models\VaccineAppointment;
use App\Models\VaccineCenter;
use App\Models\VaccineCenterSchedule;
use App\Models\VaccineNotification;
use App\Services\UserService;
use App\Services\VaccineAppointmentService;
use App\Services\VaccineNotificationService;
use Carbon\Carbon;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\View\View;
use Exception;

class UsersController extends Controller
{
    public $userService;
    public $vaccineNotificationService;
    public $vaccineAppointmentService;

    public function __construct(
        UserService $userService,
        VaccineNotificationService $vaccineNotificationService,
        VaccineAppointmentService $vaccineAppointmentService,

    )
    {
        $this->userService = $userService;
        $this->vaccineNotificationService = $vaccineNotificationService;
        $this->vaccineAppointmentService = $vaccineAppointmentService;
    }
    public function registerForm() : View
    {

//        $vaccineCenters = VaccineCenter::pluck('name', 'id');

//        $today = Carbon::today()->format('Y-m-d');
//        $activeVaccineCenterIDs = VaccineCenterSchedule::whereDate('schedule_date', '>', $today)
//            ->where('schedule_limit', '>', date('appointment_count'))
//            ->distinct()->pluck('vaccine_center_id')->toArray();
//        $vaccineCenters = VaccineCenter::whereIN('id', $activeVaccineCenterIDs)->pluck('name', 'id');

        $vaccineCenters = DB::table('vaccine_centers')
            ->join('vaccine_center_schedules', function (JoinClause $join) {
                $join->on('vaccine_centers.id', '=', 'vaccine_center_schedules.vaccine_center_id')
                    ->where('vaccine_center_schedules.schedule_date', '>', date('Y-m-d'))
                    ->where('vaccine_center_schedules.schedule_limit', '>', 'vaccine_center_schedules.appointment_count');
            })->distinct()->pluck('vaccine_centers.name', 'vaccine_centers.id');

        return view('register', compact('vaccineCenters'));
    }

    public function registration(UserRegistrationRequest $request) : RedirectResponse
    {
//        dd($request->all());

        // User Store/Save
        // Vaccine Notification Store/Save for this User
        // Vaccine Appointments Store/Save for this User
        // Find Vaccine Center and Vaccine Center's Schedule (by ID: Selected by the User)
        // IF there is NO available Schedule for the Selected Vaccine Center then Return Back with All Input and a Message
        // Otherwise Store/Save a Vaccine Appointment against this User and Selected Vaccine Center

        $vaccineCenterID = $request->input('vaccine_center_id');
        $today = date('Y-m-d');
//        $vaccineCenterSchedules = VaccineCenterSchedule::where('vaccine_center_id', $vaccineCenterID)
//            ->where('schedule_date', '>', $today)
//            ->where('schedule_limit', '>', 'appointment_count')
//            ->orderBy('schedule_date', 'ASC')
//            ->get();

//        $vaccineCenterSchedules = DB::table('vaccine_center_schedules')
//            ->where('vaccine_center_id', $vaccineCenterID)
//            ->where('schedule_date', '>', $today)
//            ->where('schedule_limit', '>', 'appointment_count')
//            ->orderBy('schedule_date', 'ASC')
//            ->get();

        $vaccineCenterSchedules = DB::select("SELECT * FROM vaccine_center_schedules
                                                    WHERE vaccine_center_id = '$vaccineCenterID'
                                                    AND schedule_date > '$today'
                                                    AND schedule_limit > appointment_count
                                                    ORDER BY schedule_date ASC;");

        if (count($vaccineCenterSchedules) == 0) {
            return redirect()->back()->withInput()->with('error', 'Selected Vaccine Center NOT Found or No Available Schedule');
        } else {

            try {
                DB::beginTransaction();

                // Create a New User
                //$user = User::create($request->all());
                $user = $this->userService->store($request->all());

                // Create a Notification History/Log
//                $vaccineNotification = new VaccineNotification();
//                $vaccineNotification->user_id = $user->id;
//                $vaccineNotification->save();
                $vaccineNotificationData['user_id'] = $user->id;
                $this->vaccineNotificationService->store($vaccineNotificationData);

                // Create a Vaccine Appointment against this User and Selected Vaccine Center
//                $vaccineAppointment = new VaccineAppointment();
//                $vaccineAppointment->user_id = $user->id;
//                $vaccineAppointment->vaccine_center_id = $vaccineCenterID;
//                $vaccineAppointment->vaccine_center_schedule_id = $vaccineCenterSchedules[0]->id;
//                $vaccineAppointment->vaccination_date = $vaccineCenterSchedules[0]->schedule_date;
//                $vaccineAppointment->vaccine_status = 'Scheduled';
//                $vaccineAppointment->save();


                $vaccineAppointmentData['user_id']                      = $user->id;
                $vaccineAppointmentData['vaccine_center_id']            = $vaccineCenterID;
                $vaccineAppointmentData['vaccine_center_schedule_id']   = $vaccineCenterSchedules[0]->id;
                $vaccineAppointmentData['vaccination_date']             = $vaccineCenterSchedules[0]->schedule_date;
                $this->vaccineAppointmentService->store($vaccineAppointmentData);

                // Update Vaccine Center's Schedule
                $vaccineCenterSchedule = VaccineCenterSchedule::where('id', $vaccineCenterSchedules[0]->id)->first();
                $vaccineCenterSchedule->appointment_count = $vaccineCenterSchedule->appointment_count + 1;
                $vaccineCenterSchedule->save();

                DB::commit();

                // Trigger Event Make a File Log.
                // Trigger Event to Send SMS Notification
                // Trigger Event to Send Email Notification

            } catch (Exception $exception) {
                DB::rollback();
                return redirect()->back()->withInput()->with('error', $exception->getMessage());
            }
        }

        return redirect()->route('home')->with('success', 'The registration has been completed successfully.');
    }

    public function vaccineStatus() : View
    {
        return view('vaccine_check');
    }

    public function vaccineStatusCheck(Request $request) : View
    {
        $nid = $request->input('nid');
        if ($nid) {
            $user = User::where('nid', $nid)->first();
            if (is_null($user)) {
                $data['error'] = 'User Not Registered';
                return view('vaccine_status', $data);
            } else {
                $data['user'] = $user;
                if ($user->vaccineAppointment && $user->vaccineAppointment->vaccine_status == "Scheduled") { $data['success'] = 'Scheduled'; }
                if ($user->vaccineAppointment && $user->vaccineAppointment->vaccine_status == "Vaccinated") { $data['success'] = 'Vaccinated'; }
                return view('vaccine_status', $data);
            }
        } else {
            $data['error'] = 'Invalid Request';
            return view('vaccine_status', $data);
        }
    }
}
