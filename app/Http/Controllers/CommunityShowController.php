<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Community;

class CommunityShowController extends Controller
{
    public function index()
    {
        $community = Community::join('categories','categories.id','=','community.category_id')
        ->select('community.*','categories.name as category_name')
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(5);
        return view('CommunityShow.index' , compact('community'));
    }
    public function show($community_slug){
        $community = Community::where('slug', $community_slug)->first();
        return view('CommunityShow.show', compact('community'));
    }
}
