<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\Proposal;
use App\Models\Cv;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function store(Request $request,Job $job){
        $proposal= Proposal::create([
            'job_id'=>$job->id,
            'validated'=>false
        ]);

        Cv::create([
            'proposal_id'=>$proposal->id,
            'content' =>$request->input('content')
            
        ]);
        return redirect()->route('jobs.index');
    }
    public function confirm(Request $request){
        $proposal = Proposal::findOrFail($request->proposal);

        if($proposal->job->user <> auth()->user()->id){
            dd('nope');
        }
        $proposal->fill(['validated'=>true]);

        if($proposal->isDirty()){
            $proposal->save();

        $conversation=Conversation::create([
            'from'=>auth()->user()->id,
            'to' =>$proposal->user->id,
            'job_id' =>$proposal ->job_id
        ]);
        }

        Message::create([
            'user_id' => auth()->user()->id,
            'conversation_id'=> $conversation->id,
            'content'=>'Bonjour, Votre demande a ete valider,nous vous contacterons bientot'
        ]);

        return redirect()->route('jobs.index');
    }
}
