<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;

class DoctorController extends Controller
{
    //index
    // public function index()
    // {
    //     $doctors = DB::table('doctors')->paginate(10);
    //     return view('pages.doctors.index', compact('doctors'));
    // }

    //dirubah jadi seperti ini agar fungsi SEARCH jalan
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')
            ->when($request->input('name'), function ($query, $doctor_name) {
                return $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);


        return view('pages.doctors.index', compact('doctors'));
    }

    //create
    public function create()
    {
        return view('pages.doctors.create');
    }

    //store
    public function store(Request $request)
    {

        // {{-- //=========reminder=============
        //     ini nama table field yang ada di tabel doctors, dicek di database->migrations
        // $table->id();
        // //doctor_name
        // $table->string('doctor_name');
        // //doctor_specialist
        // $table->string('doctor_specialist');
        // //doctor_phone
        // $table->string('doctor_phone');
        // //doctor_email
        // $table->string('doctor_email');
        // //doctor_Photo
        // $table->string('photo')->nullable();
        // //doctor_address
        // $table->string('address')->nullable();
        // //doctor_sip Surat Ijin Praktek
        // $table->string('sip');
        // $table->timestamps();
        // //============= end of reminder ==========
        // --}}


        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'sip' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // adjust file types and size as needed
            'id_ihs' => 'required',
            'nik' => 'required',
        ]);

        // Handle file upload
        $photoPath = null;
        //if image exist
        // if ($request->hasFile('photo')) {
        //     $photona = $request->file('photo'); // Retrieve the uploaded file
        //     $photoExtension = $request->file('photo')->getClientOriginalExtension();
        //     //saving photo with filename as doctor_name
        //     //$photoFileName = $request->doctor_name . ".{$photoExtension}";

        //     //saving photo with filename TIME()
        //     //$photoFileName = time(). ".{$photoExtension}";

        //     //save file image with doctor_name and time
        //     $photoFileName = $request->doctor_name . time() . ".{$photoExtension}";

        //     //$photoPath = $request->file('photo')->storeAs('img/doctors', $photoFileName, 'public');
        //     $photona->move(public_path('img/doctors/'), $photoFileName);
        //     $photoPath = 'img/doctors/' . $photoFileName; // Set the file path for storage in the database
        // }


        if ($request->hasFile('photo')) {

            $photoExtension = $request->file('photo')->getClientOriginalExtension();
            $photoFileNameNa = $request->doctor_name . '_' . time() . ".{$photoExtension}";
            $photoPath = $this->handleFileUpload($request->file('photo'), $request->doctor_name);
        }


        DB::table('doctors')->insert([
            'doctor_name' => $request->doctor_name,
            'doctor_specialist' => $request->doctor_specialist,
            'doctor_phone' => $request->doctor_phone,
            'doctor_email' => $request->doctor_email,
            'address' => $request->address,
            'sip' => $request->sip,
            'id_ihs' => $request->id_ihs,
            'nik' => $request->nik,
            'photo' => $photoFileNameNa,   //ini yang terakhir ditambahkan
            'created_at' => now(),       //kalau pake CREATE() otomatis ada created_at dan updated_at
            'updated_at' => now(),

        ]);
        //ternyata dengan menggunakan metode Insert , maka field created_at dan modified_at akan diskip sehingga menghasilkan NULL

        //di atas berbeda caranya dengan cara UserController yaitu
        // $doctor = new doctor();
        // $doctor->doctor_name = $request->doctor_name;
        // $doctor->doctor_specialist = $request->doctor_specialist;
        // $doctor->doctor_phone = $request->doctor_phone;
        // $doctor->doctor_email = $request->doctor_email;
        // $doctor->address = $request->address;
        // $doctor->photo = $photoFileName;
        // $doctor->sip = $request->sip;
        // $doctor->id_ihs => $request->id_ihs,
        // $doctor->nik => $request->nik,
        // $doctor->save();

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }

    //show
    public function show($id)
    {
        // $doctor = doctor::find($id);
        $doctor = DB::table('doctors')->where('id', $id)->first();
        return view('pages.doctors.show', compact('doctor'));
    }

    //edit
    public function edit($id)
    {
        //$doctor = doctor::find($id);
        $doctor = DB::table('doctors')->where('id', $id)->first();
        return view('pages.doctors.edit', compact('doctor'));
    }


    //update
    public function update(Request $request, $id)
    {
        //dd($request->all()); // Check if the request data is received correctly

        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'sip' => 'required',
            'id_ihs' => 'required',
            'nik' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // adjust file types and size as needed
        ]);

        // Load the existing doctor record
        $doctor = Doctor::findOrFail($id);

        // Handle file upload
        $photoPath = $doctor->photo; // Use the existing photo path
        // if ($request->hasFile('photo')) {
        //     $photoExtension = $request->file('photo')->getClientOriginalExtension();
        //     //$photoFileName = $request->doctor_name . ".{$photoExtension}";
        //     $photoFileName = $request->doctor_name . time() . ".{$photoExtension}";
        //     $photoPath = $request->file('photo')->storeAs('img/doctors', $photoFileName, 'public');
        //     //$photo->move(public_path('images'),$photoFileName);

        // } else {
        //     // If no new photo is uploaded, use the existing photo path
        //     $photoFileName = $photoPath;
        // }

        if ($request->hasFile('photo')) {

            $photoExtension = $request->file('photo')->getClientOriginalExtension();
            $photoFileNameNa = $request->doctor_name . '_' . time() . ".{$photoExtension}";
            $photoPath = $this->handleFileUpload($request->file('photo'), $request->doctor_name);
        }
        // Update the doctor record
        $doctor->update([
            'doctor_name' => $request->doctor_name,
            'doctor_specialist' => $request->doctor_specialist,
            'doctor_phone' => $request->doctor_phone,
            'doctor_email' => $request->doctor_email,
            'address' => $request->address,
            'sip' => $request->sip,
            'id_ihs' => $request->id_ihs,
            'nik' => $request->nik,
            //'photo' => $photoPath,
            'photo' => $photoFileNameNa,


            'updated_at' => now(),

        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    //destroy
    public function destroy($id)
    {

        // $doctor = doctor::find($id);
        // $doctor->delete();

        DB::table('doctors')->where('id', $id)->delete();
        return redirect()->route('doctors.index')->with('success', 'doctor deleted successfully.');

        // Doctor::destroy($id);
        // return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }

    // Handle file upload
    private function handleFileUpload($file, $doctorName)
    {
        if (!$file) {
            return null;
        }

        $photoExtension = $file->getClientOriginalExtension();
        $photoFileName = $doctorName . '_' . time() . '.' . $photoExtension;

        $file->move(public_path('img/doctors'), $photoFileName);
        //return 'img/doctors/' . $photoFileName;
        return $photoFileName;
    }
}
