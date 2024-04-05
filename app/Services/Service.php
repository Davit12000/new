<?php
namespace App\Services;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class Service
{
    public function store($data){
        $created_blog = Blog::create([
            'title' => $data['title'],
            'text' => $data['text'],
            'user_id' => Auth::id(),
            'category_id' => $data['category_id']
        ]);
            
        return new BlogResource($created_blog);
    }
    public function update($data, $blog){
        $blog->update([
            'title' => $data['title'],
            'text' => $data['text'],
            'category_id' => $data['category_id']
        ]);
        return new BlogResource($blog);
    }
    
}
?>