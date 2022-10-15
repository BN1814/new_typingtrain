<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\HistoryScore;
use App\Models\Exercise;
use App\Models\Section;
use App\Models\User;

class ExerciseController extends Controller
{
    public function AllExercises(Section $section, User $user) {
        // $exercises = HistoryScore::where('history_scores.user_id', $user->id)
        //                     ->join('exercises', 'history_scores.exercise_id', '=', 'exercises.id')
        //                     ->join('sections', 'history_scores.section_id', '=', 'sections.id')
        //                     ->where('history_scores.section_id',$section->id)
        //                     ->paginate(12);
                            // ->get();
                            // // dd($exercises);
                            // SELECT * FROM exercises
                            // LEFT JOIN history_scores
                            // ON exercises.id = history_scores.exercise_id
                            // UNION 
                            // SELECT * FROM exercises
                            // RIGHT JOIN history_scores
                            // ON exercises.id = history_scores.exercise_id
        $historys = Exercise::LeftJoin('history_scores' , 'exercises.id' , '=' , 'history_scores.exercise_id');
        $exercises = Exercise::RightJoin('history_scores', 'exercises.id', '=', 'history_scores.exercise_id')
                            ->union($historys)
                            ->where('history_scores.section_id' ,'=' , $section->id)
                            ->paginate(12);
                
                            // ->get();
        // dd($exercises);
        return view('Exercise.ExEnglish.HomeExercises', compact('exercises', 'section', 'historys' ,'user'))->with((request()->input('page',1) - 1) * 12);
    }
    public function Exercise(Section $section, User $user, $id) {
        $exercises = Exercise::findOrFail($id);
        return view('Exercise.ExEnglish.ExercisePage',compact('exercises', 'section', 'user'));
    }
    public function SaveExercise(Section $section, User $user, $id, Request $request) {
        $user_id = auth::user()->id;
        $exercises = Exercise::findOrFail($id);
        // dd(exercises);
        $data = new HistoryScore();
        $data->section_id = $section->id;
        $data->exercise_id = $exercises->id;
        $data->user_id = $user_id;
        $data->time = $request->time;
        $data->mistake = $request->mistake;
        $data->wpm = $request->wpm;
        $data->cpm = $request->cpm; 
        $data->score = $request->score;       
        $save = $data->save();

        if($save) {
            return redirect('user/enterclass/homeEx/'. $section->id . '/' . $user->id . '/'.'AllExercises')->with(compact('section', 'user', 'exercises', 'id'))->with('success', 'บันทึกข้อมูลสำเร็จ');
        }
    }
}
