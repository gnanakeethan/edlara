<?php

class SettingsController extends BaseController
{
    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'update']);
        $this->beforeFilter('admin', ['on' => 'update']);
    }

    public function update()
    {
        $validator = Validator::make(Input::all(), [
             'schoolname'=> 'required|min:3|max:256', 'schoolnameabbr'=>'required|alpha|min:2|max:10', 'schooladdress'=>'required|min:4|max:512', 'logo'=>'required', 'adminsitename'=>'required|min:2|max:256',
            'systemurl'  => 'required|url',
            'url'        => 'url|required',
            'cache'      => 'required|integer', ]);
        if ($validator->fails()) {
            Input::flash();

            return Redirect::to('/settings')->withErrors($validator);
        }
        $schoolname = Input::get('schoolname');
        Setting::set('system.schoolname', $schoolname);
        Setting::set('system.schoolnameabbr', Input::get('schoolnameabbr'));
        Setting::set('system.schooladdress', Input::get('schooladdress'));
        Setting::set('system.logo_src', Input::get('logo'));
        Setting::set('system.adminsitename', Input::get('adminsitename'));
        Setting::set('app.url', Input::get('url'));
        Setting::set('app.captcha', Input::get('captcha'));
        Setting::set('system.dashurl', Input::get('systemurl'));
        Setting::set('system.dashurlshort', Input::get('systemurlshort'));
        Setting::set('system.siteurlshort', Input::get('siteurlshort'));
        Setting::set('system.cache', Input::get('cache'));
        $theme = Theme::uses('dashboard')->layout('default');

        $view = [
            'name' => 'Dashboard Settings',
        ];
        $theme->breadcrumb()->add([
            ['label'=>'Dashboard', 'url'=>Setting::get('system.dashurl')],
            ['label'=> 'Dashboard', 'url'=>Setting::get('system.dashurl').'/settings'],
        ]);

        $theme->appendTitle(' - Settings');

        return $theme->scope('settings', $view)->render();
    }
}
