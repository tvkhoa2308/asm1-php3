@extends('layouts.master')
@section('title', 'Danh sách khóa học')

@section('content')
<h2>Danh sách khóa học</h2>

<form method="GET" class="row mb-4 g-2">
    {{-- Tìm kiếm --}}
    <div class="col-md-4">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Tìm theo tên...">
    </div>

    {{-- Lọc theo giảng viên --}}
    <div class="col-md-3">
        <select name="teacher" class="form-select" onchange="this.form.submit()">
            <option value="">-- Tất cả giảng viên --</option>
            @foreach ($teachers as $teacher)
                <option value="{{ $teacher }}" {{ request('teacher') == $teacher ? 'selected' : '' }}>
                    {{ $teacher }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Kiểu hiển thị --}}
    <div class="col-md-3">
        <select name="view" class="form-select" onchange="this.form.submit()">
            <option value="grid" {{ request('view') == 'grid' ? 'selected' : '' }}>Hiển thị lưới</option>
            <option value="list" {{ request('view') == 'list' ? 'selected' : '' }}>Hiển thị danh sách</option>
        </select>
    </div>

    {{-- Nút lọc --}}
    <div class="col-md-2">
        <button class="btn btn-primary w-100">Lọc</button>
    </div>
</form>



<div class="row">
    @if ($viewMode === 'list')
    {{-- Hiển thị kiểu danh sách --}}
    <div class="list-group">
        @foreach ($courses as $course)
            <div class="list-group-item py-3">
                <h5>{{ $course->title }}</h5>
                <p class="mb-1">{{ \Str::limit($course->description, 100) }}</p>
                <p class="mb-1"><strong>Giá:</strong> {{ number_format($course->price, 0, ',', '.') }} đ</p>
                <p class="mb-1"><strong>Giảng viên:</strong> {{ $course->teacher ?? 'N/A' }}</p>
                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-outline-primary mt-2">Chi tiết</a>
            </div>
        @endforeach
    </div>
@else
    {{-- Hiển thị kiểu lưới --}}
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    @if ($course->thumbnail)
                        <img src="{{ asset($course->thumbnail) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5>{{ $course->title }}</h5>
                        <p class="mb-1"><strong>Giảng viên:</strong> {{ $course->teacher ?? 'N/A' }}</p>
                        <p class="mb-1"><strong>Giá:</strong> {{ number_format($course->price, 0, ',', '.') }} đ</p>
                        <p class="card-text">{{ \Str::limit($course->description, 70) }}</p>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-primary mt-auto">Chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

</div>

<div class="mt-3">
    {{ $courses->withQueryString()->links() }}
</div>
@endsection
