<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function home()
    {
        $latestCourses = Course::orderBy('created_at', 'desc')->take(4)->get();
        return view('courses.home', compact('latestCourses'));
    }

    // Trang danh sách khóa học
    public function index(Request $request)
    {
        $query = Course::query();
    
        // Tìm kiếm theo tên
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
    
        // Lọc theo giảng viên
        if ($request->filled('teacher')) {
            $query->where('teacher', $request->teacher);
        }
    
        // Hiển thị kiểu grid hoặc list
        $viewMode = $request->get('view', 'grid');
    
        // Phân trang và giữ tham số lọc
        $courses = $query->paginate(6)->appends($request->all());
    
        // Lấy danh sách giảng viên duy nhất
        $teachers = Course::select('teacher')->distinct()->pluck('teacher')->filter();
    
        return view('courses.index', compact('courses', 'viewMode', 'teachers'));
    }
    
    

    // Trang chi tiết khóa học
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }
}
