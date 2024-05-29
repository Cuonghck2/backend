<?php

namespace App\Http\Controllers;

use App\Models\AwardGrade;
use App\Models\AwardLevel;
use App\Models\TopicLeader;
use App\Models\Topics;
use App\Models\TypeResult;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topics::all();
        $topics = $topics->map(function ($topic) {
            $topic->leader = TopicLeader::where('idLeader', $topic->idLeader)->first();
            $topic->typeResult = TypeResult::where('idResult', $topic->idResult)->first();
            $topic->awardGrade = AwardGrade::where('idGrade', $topic->idGrade)->first();
            $topic->awardLevel = AwardLevel::where('idLevel', $topic->idLevel)->first();
            $topic->leader->unit = $topic->leader->unit()->first();
            return $topic;
        })->all();
        return response()->json($topics, 200);
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
        $topics = new Topics();
        $topics->idTopic = request('idTopic');
        $topics->idLeader = request('idLeader');
        $topics->nameTopic = request('nameTopic');
        $topics->timeStart =  request('timeStart');
        $topics->timeEnd =  request('timeEnd');
        $topics->typeTopic = request('typeTopic');
        $topics->idResult = request('idResult');
        $topics->idGrade = request('idGrade');
        $topics->idLevel = request('idLevel');
        $topics->save();
        $leader = TopicLeader::where('idLeader', $topics->idLeader)->first();
        $typeResult = TypeResult::where('idResult', $topics->idResult)->first();
        $awardGrade = AwardGrade::where('idGrade', $topics->idGrade)->first();
        $awardLevel = AwardLevel::where('idLevel', $topics->idLevel)->first();
        $topics->awardLevel = $awardLevel;
        $topics->awardGrade = $awardGrade;
        $topics->typeResult = $typeResult;
        $topics->leader = $leader;
        return response()->json($topics, 200);
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idTopic)
    {
        $topics = Topics::where('idTopic', $idTopic)->first();
        if ($topics) {
            $topics->idTopic = request('idTopic');
            $topics->idLeader = request('idLeader');
            $topics->nameTopic = request('nameTopic');
            $topics->timeStart =  request('timeStart');
            $topics->timeEnd =  request('timeEnd');
            $topics->typeTopic = request('typeTopic');
            $topics->idResult = request('idResult');
            $topics->idGrade = request('idGrade');
            $topics->idLevel = request('idLevel');

            $topics->save();

            $leader = TopicLeader::where('idLeader', $topics->idLeader)->first();
            $typeResult = TypeResult::where('idResult', $topics->idResult)->first();
            $awardGrade = AwardGrade::where('idGrade', $topics->idGrade)->first();
            $awardLevel = AwardLevel::where('idLevel', $topics->idLevel)->first();

            $topics->leader = $leader;
            $topics->typeResult = $typeResult;
            $topics->awardGrade = $awardGrade;
            $topics->awardLevel = $awardLevel;

            return response()->json($topics, 200);
        } else {
            return response()->json(['error' => 'Không tìm thấy dữ liệu'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topics = Topics::where('idTopic', $id)->first();
        if ($topics) {
            $topics->delete();
            return response()->json($topics, 200);
        }
    }
}
