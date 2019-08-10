<?php

class ApiController extends BaseController
{
    public function index()
    {
        $encryptedkey = Crypt::encrypt('joomla');
        Config::set('session.driver', 'native');
        Session::put('api_key', $encryptedkey);

        return Response::json(['status'=>'OK', '_token'=>$encryptedkey]);
    }

    public function start()
    {
        Config::set('session.driver', 'native');
        $api_key = Session::get('api_key');

        return Response::json(['status'=>'OK', '_token'=>$api_key]);
    }

    public function tutorials()
    {
        return Cache::remember('tutorials_api_list', 60, function () {
            return Tutorials::all();
        });
    }

    public function exams()
    {
        return Cache::remember('exams_api_list', 60, function () {
            return Exams::all();
        });
    }

    public function exam($id)
    {
        $exam = Exams::findOrFail($id);
        $examdata = File::get(app_path().'/files/exam-'.$id.'/'.$exam->hash.'.json');

        return $examdata;
    }

    public function tutorial($id)
    {
        return Cache::remember('tutorial'.$id, 60, function () use ($id) {
            return Tutorials::find($id);
        });
    }
}
