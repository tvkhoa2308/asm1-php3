<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Website Khóa học')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="{{ route('home') }}">Khóa học</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Danh sách</a></li>
            </ul>
        </div>
    </nav>

    <div class="container my-4">
        @yield('content')
    </div>

    <footer class="text-center py-4 border-top">
        &copy; {{ date('Y') }} Website Khóa học
    </footer>
</body>
</html>
