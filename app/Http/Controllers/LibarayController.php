<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPodcast;
use App\Mail\SendMail;
use App\Models\Authors;
use App\Models\Books;
use App\Models\Category;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Author;

class LibarayController extends Controller
{
    public function addbooks(Request $request)
    {
        // $data = new Authors;
        // $data->name = "hello";
        // $data->description = "hasdfasdfa  asdfadsf ad asdfasd fa  adfas  asdf ello";
        // $data->save();

        $id = 1;
        // $data->books()->attach($id);
    }

    public function attach()
    {
        // $data = Authors::where('id',8)->with('authered')->first();
        // echo "<pre>";
        // print_r($data->toarray());        
        $data = Books::with('relate')->get();
        // dd($data);
        // $data1 =  compact('data');
        // echo "<pre>";
        // print_r($data->toarray()); 

        return view('library.index', compact('data'));
    }

    public function viewdetails($id)
    {
        $singlebook = Books::where('id', $id)->with(['relate', 'category', 'generes'])->first();
        $reviews = Reviews::where('books_id',$id)->get();
        // dd($reviews->toArray());
       
        // dd($singlebook);
        // echo "<pre>";
        // print_r($singlebook->toarray()); 
        return view('library.singlebook', compact('singlebook','reviews'));
    }
    public function cancle($id)
    {
       
        return  redirect('view/details' . "/" . $id);
    }
    public function review($id)
    {
        return view('library.review', compact('id'));
    }
    public function  reviewsave(Request $request, $id)
    {
       
      
        // $data = $request->only(['rating', 'comment', 'name']);
        // // dd($data);
        //  Reviews::create($data);
        $data = User::where('id', $request->user_id)->first();
        // dd($data->id);
        $data1 = Books::where('id',$id)->first();
        // dd($data1);
        $data1->users_id = $data->id;
        $data1->save();

        $book = new Reviews;
        $book->name = $data->name;
        $book->comment = $request->comment;
        $book->rating = $request->rating;
        $book->books_id = $id;
        $book->save();

        $email = Books::with('relate')->get();
        // dd($email);
        foreach($email as $emails){
            // dd($emails->relate);

           foreach($emails->relate as $author_email){
            // dd($emails);
            $auth_email = $author_email->email;
           }
        }
       
        // $data['email'] =   $auth_email;
        // $data['title'] = 'thank you for your feedback';
        $testMailData = [
            'title' => 'thank you for ur feedback',
            'body' => 'feedback : ' . $request->rating . 'Star and  the comment is : ' . $request->comment
        ];

        Mail::to("akshayboy2002@gmail.com")->send(new SendMail($testMailData));
        // dispatch(new ProcessPodcast($request));

        // Mail::send('feedbackMail', ['data' => $data], function ($message) use ($data) {
        //     $message->to($data['email'])->subject($data['title']);
        // });

        return redirect('view/details/'. $id);

        // $data  = Books::with(['relate', 'category', 'generes', ''])->get();
        // dd($data);


    }
}
