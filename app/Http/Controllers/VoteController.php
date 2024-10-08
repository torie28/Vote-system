<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VoteController extends Controller
{
    public function showvoteform()
    {
        return view('vote');
    }


   // Handle vote submission
   public function submitVote(Request $request)
   {
       // Validate the incoming vote
       $request->validate([
           'candidate' => 'required|integer'
       ]);

       // Save the vote to the database
       $vote = new Vote();
       $vote->candidate_id = $request->input('candidate');
       $vote->save();

       // Set a flash message
       Session::flash('success', 'Your vote has been submitted successfully!');

       // Redirect to the results page
       return redirect()->route('results');
   }
   // Show voting results
   public function viewResults()
   {
       // Count votes for each candidate
       $results = [
           'candidate1' => Vote::where('candidate_id', 1)->count(),
           'candidate2' => Vote::where('candidate_id', 2)->count(),
           'candidate3' => Vote::where('candidate_id', 3)->count(),
       ];

       // Pass results to the view
       return view('results', ['results' => $results]);
   }
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
