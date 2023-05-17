<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Jobs\feedbackmail;
use App\Jobs\ProcessPodcast;
use App\Mail\SendMail;
use App\Models\Authors;
use App\Models\Books;
use App\Models\Category;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use PharIo\Manifest\Author;

class LibarayController extends Controller
{
  

    public function attach()
    {
    
        $data = Books::with('relate')->get();
           return view('library.index', compact('data'));
    }

    public function viewdetails($id)
    {
        $singlebook = Books::where('id', $id)
            ->with(['relate', 'category', 'generes'])
            ->first();

        $reviews = Reviews::where('books_id', $id)->get();
        $total_reponse = count($reviews);
        $total_stars = Reviews::where('books_id', $id)->sum('rating');
             if (!($total_reponse == 0 && $total_stars == 0)) {
            $overall = $total_stars / $total_reponse;

            $overall_data = round($overall);

            return view('library.singlebook', compact('singlebook', 'reviews', 'overall_data'));
        } else {
            return view('library.singlebook', compact('singlebook', 'reviews'));
        }

        // return $reviews;
    }
    public function cancle($id)
    {
        return redirect('view/details' . '/' . $id);
    }
    public function review(Request $request)
    {
        $ids = $request->book_id;
        // dd($id);
        $id = (int) $ids;
        // dd($id);

        return view('library.review', compact('id'));
    }
    public function reviewsave(ReviewRequest $request, $id)
    {
        $data = User::where('id', $request->user_id)->first();
        $data1 = Books::where('id', $id)->first();
        // dd($data->review_time );
        if ($data->review_time == 1 && $data1->review_time == 1) {
            // dd('nott alloww');
            return redirect('view/details' . "/" . $id)->with('message', 'You have already reviewed this book');
        } else {

            // $data =  Auth::user()->id;
            $data = User::where('id', $request->user_id)->first();
            // dd($data);
            $data->review_time = 1;
            $data->update();
            // dd($data->name);
            $data1 = Books::where('id', $id)->first();
            // dd($data1);
            $data1->review_time = 1;
            $data1->update();

            $book = new Reviews;
            $book->user_id  = $data->id;
            $book->comment = $request->comment;
            $book->rating = $request->rating;
            $book->books_id = $id;
            $book->save();

        $email = Books::where('id', $id)
            ->with('relate')
            ->get();

        foreach ($email as $emails) {
        }

        $emails = $emails->relate->map(function ($authormail) {
            return $authormail->email;
});
        dispatch(new feedbackmail($emails))->delay(now()->addSeconds(5));
        // return $emails;
        // die();
        return redirect('view/details/' . $id)->with('messages', 'thank u for your feedback');
        }
    }

    public function userreview(){
       $data = Books::with('review')->get();
       return $data;
    }
}