<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\TopicLeader;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getMembersByLeader($idLeader)
    {
        $members = Members::where('idLeader', $idLeader)->get();
        $members = $members->map(function ($member) {
            $member->leader = TopicLeader::where('idLeader', $member->idLeader)->first();
            return $member;
        })->all();
        return response()->json($members);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $member = new Members();
        $member->idMember = request('idMember');
        $member->nameMember = request('nameMember');
        $member->taskMember = request('taskMember');
        $member->idLeader = request('idLeader');

        $member->save();

        return response()->json($member);
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
        $member = Members::find($id);
        $member->nameMember = request('nameMember');
        $member->taskMember = request('taskMember');
        $member->idLeader = request('idLeader');
        $member->save();
        return response()->json($member);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Members::find($id);
        $member->delete();
        return response()->json($member);
    }
}
