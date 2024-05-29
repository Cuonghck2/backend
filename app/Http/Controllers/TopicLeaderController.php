<?php

namespace App\Http\Controllers;

use App\Models\TopicLeader;
use App\Models\Topics;
use App\Models\Unit;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class TopicLeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topicLeaders = TopicLeader::all();
        $topicLeaders = $topicLeaders->map(function ($topicleader) {
            $topicleader->unit = Unit::where('idUnit', $topicleader->idUnit)->first();
            return $topicleader;
        })->all();
        return response()->json($topicLeaders, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $topicLeaders = new TopicLeader();
        $topicLeaders->idLeader = request('idLeader');
        $topicLeaders->nameLeader = request('nameLeader');
        $topicLeaders->idUnit = request('idUnit');
        $topicLeaders->save();
        $unit = Unit::where('idUnit', $topicLeaders->idUnit)->first();
        $topicLeaders->unit = $unit;
        return response()->json($topicLeaders, 200);
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
    public function update(Request $request, string $idLeader)
    {
        $topicLeaders = TopicLeader::where('idLeader', $idLeader)->first();
        if ($topicLeaders) {
            $topicLeaders->idLeader = request('idLeader');
            $topicLeaders->nameLeader = request('nameLeader');
            $topicLeaders->idUnit = request('idUnit');
            $topicLeaders->save();
            $unit = Unit::where('idUnit', $topicLeaders->idUnit)->first();
            $topicLeaders->unit = $unit;
            return response()->json($topicLeaders, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idLeader)
    {
        $topicLeaders = TopicLeader::where('idLeader', $idLeader)->first();
        if ($topicLeaders) {
            $topicLeaders->delete();
            return response()->json($topicLeaders, 200);
        } else {
            return response()->json(['message' => 'Topic leader not found'], 404);
        }
    }
}
