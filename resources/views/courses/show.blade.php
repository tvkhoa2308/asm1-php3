@extends('layouts.master')
@section('title', $course->title)

@section('content')
<div class="card">
    @if ($course->thumbnail)
        <img src="{{ $course->thumbnail }}" class="card-img-top" alt="Ảnh khóa học">
    @endif
    <div class="card-body">
        <h3 class="card-title">{{ $course->title }}</h3>
        <p><strong>Giảng viên:</strong> {{ $course->teacher ?? 'Đang cập nhật' }}</p>
        <p><strong>Giá:</strong> {{ number_format($course->price, 0, ',', '.') }} đ</p>
        <p class="mt-3">{{ $course->description }}</p>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">← Quay lại</a>
    </div>
</div>
@endsection
