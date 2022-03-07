<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\StudentQuizDetail;
use App\Models\Subject;
use Illuminate\Session\Session as SessionSession;

class DashboardController
{

    public function index()
    {
        return view('index');
    }
}