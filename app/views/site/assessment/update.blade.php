<!doctype html>
<html>
    <head>
        <title>{{ Setting::get('system.schoolname') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @stylesheets('bootstrap')
        @stylesheets('grans')
    </head>
    <body>
        {{ $header }}
        <div class='container-fluid'>
            <div class='row-fluid'>
                <div class="span7 offset2">
                    <?php
                    $assessment = Assessments::findOrFail($id);
                    if($errors->first('title')){

                            echo "<div class='alert alert-error alert-block fade in'>";
                            echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                            echo $errors->first('title');                            
                            echo "</div>";
                    }
                    if($errors->first('related_tutorial')){

                            echo "<div class='alert alert-error alert-block fade in'>";
                            echo '<button type="button" class="close" data-dismiss="alert">×</button>';
                            echo $errors->first('related_tutorial');
                            echo "</div>";
                    }
                    echo Form::open(array('url' => '/assessment/update/'.$id,'method' => 'POST','class'=>'form-horizontal','files'=>'true'));
                    
                    echo Form::label('id','ID',array('class'=>'pull-left','style'=>'margin:10px;'));
                    echo Form::text('id',$assessment->id,array('class'=>'pull-right disabled uneditable-input','style'=>'margin:5px;'));
                    echo Form::label('title','Title',array('class'=>'pull-left','style'=>'clear:left;margin:10px;'));
                    echo Form::text('title',$assessment->title,array('class'=>'pull-right','placeholder'=>'Title of the Assessment','style'=>'clear:right;margin:5px;'));
                    echo Form::label('description','Description',array('class'=>'pull-left','style'=>'margin:10px;clear:left;'));
                    echo Form::text('description',$assessment->description,array('class'=>'pull-right','placeholder'=>'Small Description of the Assessment','style'=>'clear:right;margin:5px;'));
                    echo Form::label('related_tutorial','Related Tutorial',array('class'=>'pull-left','style'=>'clear:left;margin:10px'));
                    $tutorialid = Session::get('tutorialid',1);
                    $tutoriallist = array();
                    // $tutorial = Tutorials::where('id','=',$tutorialid);
                    // var_dump($tutorial);
                    if($tutorialid !== NULL){
                        $tutorial= Tutorials::findOrFail($tutorialid);
                        $tutoriallist[$tutorial->id] = $tutorial->name;
                        $teacher = User::findOrFail($tutorial->createdby);
                        echo Form::select('related_tutorial',$tutoriallist,Session::get('tutorialid'),array('class'=>'pull-right uneditable-input','style'=>'clear:right;margin:5px;height:30px;'));
                    }
                    echo Form::label('submitted_to',"Submitted To",array('class'=>'pull-left','style'=>'clear:left;margin:10px;'));
                    $teacherlist = [$teacher->id => $teacher->first_name.' '.$teacher->last_name];
                    echo Form::select('submitted_to',$teacherlist,$teacher->id,array('class'=>'pull-right disabled uneditable-input','style'=>'clear:right;margin:5px;height:30px;'));
                    echo Form::label('subject','Subject',array('class'=>'pull-left','style'=>'clear:left;margin:10px;'));
                    $subjectid = $tutorial->subjectid;
                    $subject = Subject::findOrFail($subjectid);
                    $subjectlist = [$subjectid => $subject->subjectname];
                    echo Form::select('subject',$subjectlist,$subjectid,array('class'=>'pull-right disabled uneditable-input','style'=>'clear:right;margin:5px;height:30px;'));
                    echo Form::label('assessment_type','Assessment Type',array('class'=>'pull-left','style'=>'clear:left;margin:10px;'));
                    $assessment_types = ['presentation'=>"Presentation",'document'=>'Documentation'];
                    echo Form::select('assessment_type',$assessment_types,'presentation',array('class'=>'pull-right','style'=>'clear:right;margin:5px;'));
                    echo Form::label('attachments','Attachments',array('class'=>'pull-left','style'=>'clear:left;margin:10px;'));
                    echo Form::file('attachments[]',array('multiple'=>'true','class'=>'pull-right','style'=>'clear:right;margin:5px;'));
                    echo Form::submit('Submit',array('class'=>' pull-left btn btn-success','value'=>'submit','style'=>'clear:both;'));
                    echo Form::close();
                    ?>
                </div>
                <div class='span3'>

                    <h4>Current Attachments</h4>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                        <tr>
                                            <th>#id</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                if(is_dir(app_path().'/attachments/assessment-'.$id)){
                                $types = array(
                                'jpg', 'png', 'gif', 'JPG', 'PNG', 'GIF','PDF','pdf','bmp','BMP'
                                 );
                                $folder = app_path().'/attachments/assessment-'.$id;
                                $it = new RecursiveDirectoryIterator($folder);
                                $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
                                foreach ($files as $file) {
                                    if (is_file($file)) {
                                        $attachpath = app_path().'/attachments/assessment-'.$assessment->id.'/';
                                        $filename = str_replace($attachpath, '', $file);
                                             echo "<tr>";
                                             echo "<td>";
                                             echo "1";
                                             echo "</td>";
                                             echo "<td>";
                                             echo $filename;
                                             echo "</td>";
                                             echo "<td>";
                                             echo "<a class='btn btn-small' href='/attachments/assessment-".$id.'/'.$filename."/download/'>Download</a><a class='btn btn-small btn-danger' href='/attachments/assessment-".$id.'/'.$filename."/delete/'>Delete</a>";
                                             echo "</td>";
                                             echo "</tr>";
                                                }
                                }
                                }
                                ?>
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                </div>
            </div>
        </div>
        {{-- Bootstrap JS Compiled --}}
        @javascripts('bootstrap')
        @javascripts('grans')

    <script src='/js/jquery.dataTables.min.js'></script>
        <script type="text/javascript">
            $('#navbar').scrollspy();
        </script>
    </body>
</html>