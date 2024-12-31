<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeebbackClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.guiphanhoi.send_feedback');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeedbackRequest $request)
    {
        // Validate and save the feedback
        $feedback = Feedback::create([
            'id_user' => auth()->id(), // Assuming the user is logged in
            'id_project' => $request->input('id_project'),
            'content' => $request->input('content'),
            'status' => 'pending', // Default status, or adjust as needed
            'priority' => $request->input('priority'),
        ]);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
