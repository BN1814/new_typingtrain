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
// SELECT user_id, section_id , exercise_id, MAX(score) AS score
// FROM history_scores
// WHERE section_id = 2
// GROUP BY user_id  ,exercise_id;
        // $history_max = HistoryScore::Select('history_scores.user_id' ,'history_scores.section_id' ,'history_scores.exercise_id' , \DB::raw('MAX(history_scores.score) as scoremax'))
        //                         ->where('section_id','=',$section->id)
        //                         ->where('user_id','=',$user->id)
        //                         ->groupBy('history_scores.exercise_id')
        //                         ->get('exercise_id');
                            // dd($history_max);
                            // SELECT * FROM exercises
                            // LEFT JOIN history_scores
                            // ON exercises.id = history_scores.exercise_id
                            // UNION 
                            // SELECT * FROM exercises
                            // RIGHT JOIN history_scores
//                             // ON exercises.id = history_scores.exercise_id
// select  `history_scores`.`user_id`, `history_scores`.`section_id`,`history_scores`.`exercise_id`, Max(`history_scores`.`score`) from `history_scores` 
// where `history_scores`.`user_id` = 4 and `history_scores`.`section_id` = 2
// GROUP BY history_scores.exercise_id
// ORDER BY history_scores.exercise_id

        $historys = Exercise::Select('exercises.*' ,'history_scores.user_id','history_scores.section_id','history_scores.exercise_id','history_scores.score')
                            ->LeftJoin('history_scores', 'exercises.id', '=', 'history_scores.exercise_id');
        $exercises = Exercise::Select('exercises.*' ,'history_scores.user_id','history_scores.section_id','history_scores.exercise_id','history_scores.score')
                            ->RightJoin('history_scores', 'exercises.id', '=', 'history_scores.exercise_id')                           
                            ->union($historys)
                            ->where('history_scores.user_id','=',$user->id)
                            ->where('history_scores.section_id' ,'=' , $section->id)
                            ->paginate(12);
                            // ->get();
        // $exercises = Exercise::paginate(12);
        // dd($user->id);
        return view('Exercise.ExEnglish.HomeExercises', compact('exercises', 'section' ,'historys' ,'user'))->with((request()->input('page',1) - 1) * 12);
    }
    public function Exercise(Section $section, User $user, $id) {
        $exercises = Exercise::findOrFail($id);
        return view('Exercise.ExEnglish.ExercisePage',compact('exercises', 'section', 'user'));
    }
    public function SaveExercise(Section $section, User $user, $id, Request $request) {
        
        $user_id = auth::user()->id;
        $exercises = Exercise::findOrFail($id);
        // $check_score = HistoryScore::where('history_scores.user_id', $user_id)
        //                         ->where('history_scores.section_id', $section->id)
        //                         ->where('history_scores.exercise_id', $exercises->id)
        //                         ->count();
        // $check_score_max = HistoryScore::where('history_scores.user_id', $user_id)
        //                         ->where('history_scores.section_id', $section->id)
        //                         ->where('history_scores.exercise_id', $exercises->id)
        //                         ->find();
        // dd($check_score_max );

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
