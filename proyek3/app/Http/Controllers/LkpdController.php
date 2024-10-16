<?php

namespace App\Http\Controllers;

use App\Models\ModuleLkpd;
use App\Models\Category;
use Illuminate\Http\Request;

class LkpdController extends Controller
{
    public function index(Request $request)
    {

        $categories = Category::all();
        $query = ModuleLkpd::with(['user', 'category', 'tags', 'collaborator']);

        // if ($request->has('category_id') && $request->category_id != '') {
        //     $lkpdModules = $lkpdModules->where('category_id', $request->category_id);
        // }
        $categoryId = $request->input('category_id');
        $searchTerm = $request->input('search');

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        } else {
            // Jika tidak ada kategori yang dipilih, ambil semua LKPD
            $lkpdModules = ModuleLkpd::with(['user', 'category', 'tags', 'collaborator'])->get();
        }

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('lkpd_title', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('tags', function ($q) use ($searchTerm) {
                      $q->where('tag_name', 'like', '%' . $searchTerm . '%');
                  })
                  ->orWhereHas('user', function ($q) use ($searchTerm) {
                      $q->where('name', 'like', '%' . $searchTerm . '%');
                  })
                  ->orWhere('lkpd_description', 'like', '%' . $searchTerm . '%');
            });
        }

        $lkpdModules = $query->get();

        return view('lkpd.index', compact('lkpdModules', 'categories'));

        // Eksekusi query
        

        // Kirim data ke view
        // return view('lkpd.index', compact('lkpdModules', 'categories'));

        
    }
}
