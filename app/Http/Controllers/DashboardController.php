<?php

namespace App\Http\Controllers;

use App\Mail\NewStoryNotification;
use App\Mail\NotifyAdmin;
use Illuminate\Http\Request;
use App\Story;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index(){
        $query = Story::where('status', 1);
        $type = request()->input('type');
        if( in_array($type, ['short', 'long'])){
            $query->where('type', $type);
        }
        $stories = $query->with('user')
            ->orderby('id', 'DESC')
            ->paginate(11);
        return view('dashboard.index', [
            'stories' => $stories
        ]);
    }

    public function show(Story $activestory){
        return view('dashboard.show', [
            'story'=>$activestory
        ]);
    }

    public function email(){
        Mail::send(new NewStoryNotification('Title of Email/Story'));
    }

}
