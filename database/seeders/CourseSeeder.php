<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::create([
            'title' => 'Laravel từ cơ bản đến nâng cao',
            'teacher' => 'Nguyễn Văn A',
            'price' => 499000,
            'thumbnail' => 'https://via.placeholder.com/400x200',
            'description' => 'Học Laravel từ những kiến thức nền tảng đến các kỹ thuật nâng cao.',
        ]);

        Course::create([
            'title' => 'Lập trình Front-end với TailwindCSS',
            'teacher' => 'Trần Thị B',
            'price' => 299000,
            'thumbnail' => 'https://via.placeholder.com/400x200',
            'description' => 'Khóa học giúp bạn xây dựng giao diện đẹp và responsive bằng TailwindCSS.',
        ]);

        Course::create([
            'title' => 'Khóa học HTML & CSS cho người mới bắt đầu',
            'teacher' => 'Lê Văn C',
            'price' => 199000,
            'thumbnail' => 'https://via.placeholder.com/400x200',
            'description' => 'Hướng dẫn từ A đến Z về HTML và CSS với nhiều bài thực hành.',
        ]);
    }
}
