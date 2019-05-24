<?php

// namespace App\Exports;

// use App\Models\Blog;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;

// class BlogsExport implements FromCollection, WithHeadings
// {
// 	public $fields = [
//         'id',
//         'title',
//         'url',
//         'short_content',
//         'content',
//         'meta_description',
//         'editor_id',
//         'updated_at',
// 	];

//     /**
//      * @return \Illuminate\Support\Collection
//      */
//     public function collection()
//     {
//         return Blog::select($this->fields)->get();
//     }

//     public function headings(): array
//     {
//         return [$this->fields];
//     }
// }
