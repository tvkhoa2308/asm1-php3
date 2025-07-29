@extends('layouts.master')
@section('title', 'Trang chủ')

@section('content')
<h2>Khóa học mới nhất</h2>
<div class="row">
    @foreach ($latestCourses as $course)
        <div class="col-md-3 mb-3">
            <div class="card h-100">
                @if ($course->thumbnail)
                    <img src="{{ $course->thumbnail }}" class="card-img-top" alt="Ảnh khóa học">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    <p class="mb-1"><strong>Giảng viên:</strong> {{ $course->teacher ?? 'Đang cập nhật' }}</p>
                    <p class="mb-1"><strong>Giá:</strong> {{ number_format($course->price, 0, ',', '.') }} đ</p>
                    <p class="card-text">{{ \Str::limit($course->description, 60) }}</p>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-primary mt-2">Xem chi tiết</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
