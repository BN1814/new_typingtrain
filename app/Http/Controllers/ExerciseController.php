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
        $exercises = Exercise::first()->paginate(12);
        return view('Exercise/ExEnglish.HomeExercises', compact('exercises', 'section', 'user'))->with((request()->input('page',1) - 1) * 12);
    }
    public function Exercise(Section $section, User $user, $id) {
        $exercises = Exercise::findOrFail($id);
        return view('Exercise/ExEnglish.ExercisePage',compact('exercises', 'section', 'user'));
    }
    public function SaveExercise(Request $request,Exercise $exercise) {
        $user_id = auth::user()->id;
        $exercise_id = Exercise::where('id', $exercise->id)->get();
        $data = new HistoryScore();
        $data->exercise_id = $exercise_id;
        $data->time = $request->time;
        $data->mistake = $request->mistake;
        $data->wpm = $request->wpm;
        $data->cpm = $request->cpm;        
        $data->user_id = $user_id;
        $save = $data->save();

        if($save) {
            dd($exercise_id);
            // return redirect()->back()->with('success', 'บันทึกข้อมูลสำเร็จ');
        }
    }
}
