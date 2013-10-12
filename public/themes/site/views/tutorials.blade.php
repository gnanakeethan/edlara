
<div class='row'>
        <table id="tutorials" class="table table-striped table-bordered bootstrap-datatable datatable">
         <thead>
            <tr>
                <th>#ID</th>
                <th>Title</th>
                <th>Subject</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            function checkSubject($subjects,$subject){
                foreach($subjects as $s){
                    if($s == $subject){
                        return 1;
                    }
                }
                return 0;
            }
            $tutorials = Tutorials::all();

            foreach ($tutorials as $tutorial){
                if($tutorial->published == 1){

                    if(Sentry::check()){
                        $usere = Sentry::getUser();
                        $usergroup =  $usere->getGroups();
                        $usergroupe = json_decode($usergroup,true);
                        $usergroupe[0]['pivot']['group_id'];
                        $group = Sentry::findGroupById($usergroupe[0]['pivot']['group_id']);
                        $groupname = $group->name;
                        if($groupname == 'teachers'){
                            $user = Teacher::findOrFail($usere->id);
                        }
                        elseif($groupname == 'students'){
                            $user = Student::findOrFail($usere->id);
                        }
                        elseif($groupname == 'admin'){

                           $userw = Sentry::getUser();
                           $user = Teacher::findOrFail($userw->id);
                       }


                       $ssubjects = $user->extra;
                       $subjects = unserialize($ssubjects);
                       $truth = 0;
                       if($subjects != null){
                        $truth = checkSubject($subjects,$tutorial->subjectid);
                    }

                    if($truth == 0 && !Sentry::getUser()->inGroup(Sentry::findGroupByName('admin'))){
                        continue;
                    }

                }
                $subject = Subject::find($tutorial->subjectid);
                $teacher = Teacher::find($tutorial->createdby);
                $username = Sentry::findUserByLogin($teacher->email);
                echo "<tr>";
                echo "<td>";
                echo $tutorial->id;
                echo "</td>";
                echo "<td>";
                echo "<a href='/tutorial/".$tutorial->id."'>$tutorial->name";
                echo "</td>";
                echo "<td>";
                echo $subject->subjectname;
                echo "</td>";
                echo "<td>";
                echo $subject->grade;
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>

    </tbody>

</table>
</span>
</div>

<div id='footer' class="pull-right" style="padding:20px;margin:20px;clear:right;">
    {{Setting::get('system.schoolname')}} &copy; {{date('Y')}}
</div>