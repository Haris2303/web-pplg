<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index(): View
    {
        $data = [
            'teachers' => Teacher::latest()->filter(request(['q']))->paginate(10)
        ];

        return view('admin.teachers.index', $data);
    }

    public function create(): View
    {
        $data = [
            'subjects' => Subject::latest()->get(),
            'classes' => Classes::latest()->get()
        ];

        return view('admin.teachers.create', $data);
    }

    public function store(Request $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $credentialUser = $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', 'unique:' . User::class],
            ]);

            $credentialTeacher = $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', 'unique:' . User::class],
                'nip' => ['required', 'numeric', 'unique:' . Teacher::class],
                'education' => ['required'],
                'gender' => ['required'],
                'birth' => ['required'],
                'address' => ['required'],
                'religion' => ['required'],
                'picture' => ['image', 'file', 'max:1024']
            ]);

            if($request->file('picture')) {
                $credentialTeacher['picture'] = $request->file('picture')->store('img/teachers/profile');
            }
            
            // make password
            $credentialUser['password'] = Hash::make('pass' . $request->nip);
            
            // make role is teacher
            $credentialUser['role'] = 'teacher';
            
            // save user
            $user = new User($credentialUser);
            $user->save();
            
            event(new Registered($user));
            
            $credentialTeacher['user_id'] = $user->id;
            
            // save teacher
            $teacher = new Teacher($credentialTeacher);
            $teacher->save();

            // Attach subjects
            if(!is_null($request->subjects)) {
                foreach ($request->subjects as $subject) {
                    $teacher->hasSubjects()->attach($subject);
                }
            }
        });

        return redirect('/teachers')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit($id): View
    {
        $data = [
            'teacher' => Teacher::where('id', $id)->firstOrFail(),
            'subjects' => Subject::all()
        ];

        return view('admin.teachers.edit', $data);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // make rules
        $rules = [
            'nip' => ['required', 'numeric'],
            'education' => ['required'],
            'gender' => ['required'],
            'birth' => ['required'],
            'address' => ['required'],
            'religion' => ['required'],
            'picture' => ['file', 'image', 'max:1024']
        ];

        // retrieve data based on id
        $teacher = Teacher::where('id', $id)->firstOrFail();

        // if a request nip is not equal to nip in the db
        if ($request->nip !== $teacher->nip) {
            $rules['nip'] = ['required', 'numeric', 'unique:' . Teacher::class];
        }
        
        // update user name
        User::where('id', $teacher->user_id)->update($request->validate([
            'name' => ['required', 'string']
        ]));
        
        // validasi request
        $credential = $request->validate($rules);

        // check picture
        if($request->file('picture')) {
            // if picture is change
            if ($request->oldPicture) {
                Storage::delete($request->oldPicture);
            }
            $credential['picture'] = $request->file('picture')->store('img/teachers/profile');
        }

        // update data
        $teacher->update($credential);

        // change subjects
        if($request->subjects) {
            // dettach
            foreach($request->oldSubjects as $subject) {
                $teacher->hasSubjects()->detach($subject);
            }

            // attach
            foreach($request->subjects as $subject) {
                $teacher->hasSubjects()->attach($subject);
            }
        }

        return redirect()->route('teachers')->with('success', 'Data guru berhasil diubah!');
    }
}
