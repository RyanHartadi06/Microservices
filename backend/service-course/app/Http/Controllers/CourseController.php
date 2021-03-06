<?php

namespace App\Http\Controllers;

use App\Course;
use App\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $course = Course::query();
        // Search By Title Name && status
        $title = $request->input('title');
        $status = $request->input('status');

        $course->when($title, function ($query) use ($title) {
            return $query->whereRaw("name LIKE '%" . strtolower($title) . "%'");
        });

        $course->when($status, function ($query) use ($status) {
            return $query->where("status", '=', $status);
        });

        return response()->json([
            'status' => 'success',
            'message' =>  $course->paginate(5)
        ]);
    }
    public function show($id)
    {
        $course = Course::find($id);
        if (!$course) {
            return response()->json([
                'status' => 'error',
                'message' =>  'Course not found'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' =>  $course
        ]);
    }
    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'certificate' => 'required|boolean',
            'thumbnail' => 'required|url',
            'type' => 'required|in:free,premium',
            'status' => 'required|in:draft,published',
            'price' => 'integer',
            'level' => 'required|in:all-level,beginner,intermediate,advance',
            'mentor_id' => 'required|integer',
            'description' => 'string',
        ];
        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }
        $idmentor = $request->input('mentor_id');
        $mentor = Mentor::find($idmentor);

        if (!$mentor) {
            return response()->json([
                'status' => 'error',
                'data' => 'Mentor not found'
            ], 404);
        }
        $course = Course::create($data);
        return response()->json([
            'status' => 'success',
            'message' => $course
        ]);
    }
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'string',
            'certificate' => 'boolean',
            'thumbnail' => 'url',
            'type' => 'in:free,premium',
            'status' => 'in:draft,published',
            'price' => 'integer',
            'level' => 'in:all-level,beginner,intermediate,advance',
            'mentor_id' => 'integer',
            'description' => 'string',
        ];
        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }
        $cekCourse = Course::find($id);
        if (!$cekCourse) {
            return response()->json([
                'status' => 'error',
                'message' => 'Courses Not Found'
            ], 404);
        }

        $mentorId = $request->input('mentor_id');
        if ($mentorId) {
            $mentorFind = Mentor::find($mentorId);
            if (!$mentorFind) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Mentor Not Found'
                ], 404);
            }
        }
        $cekCourse->fill($data);
        $cekCourse->save();
        return response()->json([
            'status' => 'success',
            'message' =>  $cekCourse
        ]);
    }
    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json([
                'status' => 'error',
                'message' => 'Course Not Found'
            ], 404);
        }

        $course->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Course Deleted'
        ]);
    }
}
