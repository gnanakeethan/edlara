<?php

defined('ROOT' )|| die('Restricted Access');

?>
            <table id="datatable" class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Related Tutorial</th>
                        <th>Subject</th>
                        <th>Grade</th>
                        <th>Submitted To</th>
                        <th>Submission Date</th>
                        <th>Score out of 100</th>
                        <th>Submitted By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $assessments = Assessments::all();
                    foreach ($assessments as $assessment){
                        $tutorialid = $assessment->tutorialid;
                        $teacherid = $assessment->teacherid;
                        $teacher = User::find($teacherid);
                        $admin =  Sentry::getUser()->inGroup(Sentry::findGroupByName('admin'));
                        if(Sentry::getUser()->id == $teacherid || $admin){
                        $tutorial = DB::select(DB::raw('SELECT * FROM `tutorials` WHERE `id` = '.$tutorialid)); 
                        $tutorial = array_dot(objectToArray($tutorial));
                        $tutorial= Tutorials::find((int)$assessment->tutorialid);
                        $studentid = $assessment->studentid;
                        $student = User::find($studentid);
                        $subject = Subject::find($assessment->subjectid);
                        echo "<tr>";
                        echo "<td>";
                        echo $assessment->id;
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='/assessment/".$assessment->id."/'>".$assessment->title.'</a>';
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='/tutorial/view/".$tutorialid."'>";
                        echo $tutorial->name;
                        unset($tutorial);
                        echo "</a>";
                        echo "</td>";
                        echo "<td>";
                        echo $subject->subjectname;
                        echo "</td>";
                        echo "<td>";
                        echo $subject->grade;
                        echo "</td>";
                        echo "<td>";
                        echo $teacher->first_name.' '.$teacher->last_name;
                        echo "</td>";
                        echo "<td>"; 
                        echo $assessment->created_at;                      
                        echo "</td>";
                        echo "<td>";
                        echo $assessment->marks;
                        echo "</td>";
                        echo "<td>";
                        echo $student->first_name.' '.$student->last_name;
                        echo "</td>";
                        echo "</tr>";
                        }
                    }


                    ?>
                </tbody>
                <tfoot>


                </tfoot>
            </table>