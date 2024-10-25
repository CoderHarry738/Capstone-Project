<?php

namespace App\Http\Controllers;

use view;
use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Laravel\Facades\Image;

class PatientController extends Controller
{
    public function index()
    {
        // $data = Patients::where('age', '>=', 19)->orderBy('first_name', 'desc')->limit(10)->get();

        // $data = DB::table('patients')
        //         ->select(DB::raw('count(*) as gender_count, gender'))->groupBy('gender')->get();
        // return view('patients.index', ['patients' => $data]);
        $data = array("patients" => DB::table('patients')->orderBy('created_at', 'desc')->simplePaginate(10));
        return view('patients.index', $data);
    }

    public function show($id){
        $data = Patients::findorFail($id);
        // dd($data);
        return view('patients.edit', ['patient' => $data]);
    }

    public function create(){
        return view('patients.create')->with('title', 'Add New');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email', Rule::unique('patients', 'email')],

       ]);

       if($request->hasFile('patient_image')){

        $request->validate([
            "patient_image" => 'mimes:png,jpg,bmp,tiff |max:4096'
        ]);

        $filenameWithExtension = $request->file("patient_image");

        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file("patient_image")->getClientOriginalExtension();

        $filenameToStore = $filename . '_'.time().'.'.$extension;

        $smallThumbnail = $filename . '_'.time(). '.'.$extension;

        $request->file('patient_image')->storeAs('public/patient', $filenameToStore);

        $request->file("patient_image")->storeAs('publoc/patient/thumbnail', $smallThumbnail);

        $thumbNail = 'storage/patient/thumbnail/'.$smallThumbnail;

         $this->createThumbnail($thumbNail, 150, 93);

         $validated['patient_image'] = $filenameToStore;
    }

       Patients::create($validated);

       return redirect('/')->with('message', 'New Patient was added successfully!');
    }

    public function update(Request $request, Patients $patient){
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email'],
       ]);

    //    dd($request);
    if($request->hasFile('patient_image')){

        $request->validate([
            "patient_image" => 'mimes:png,jpg,bmp,tiff |max:4096'
        ]);

        $filenameWithExtension = $request->file("patient_image");

        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file("patient_image")->getClientOriginalExtension();

        $filenameToStore = $filename . '_'.time().'.'.$extension;

        $smallThumbnail = $filename . '_'.time(). '.'.$extension;

        $request->file('patient_image')->storeAs('public/patient', $filenameToStore);

        $request->file("patient_image")->storeAs('publoc/patient/thumbnail', $smallThumbnail);

        $thumbNail = 'storage/patient/thumbnail/'.$smallThumbnail;

         $this->createThumbnail($thumbNail, 150, 93);

         $validated['patient_image'] = $filenameToStore;
    }
       $patient->update($validated);

       return back()->with('message', 'Data was successfully updated');
    }

    public function destroy(Patients $patient){
        $patient->delete();

        return redirect('/')->with('message', 'Data was successfully deleted');
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint){
            $constraint->aspectRatio();
        });
    }
}


