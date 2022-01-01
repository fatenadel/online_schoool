
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table{
    border:1px solid blue;
}
</style>
<body>
<table id="datatable"   data-page-length="50"
                                           style="text-align: center; border:2px solid blue;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Students_trans.name')}}</th>
                                            <th>{{trans('Students_trans.email')}}</th>
                                            <th>{{trans('Students_trans.gender')}}</th>
                                            <th>{{trans('Students_trans.Grade')}}</th>
                                            <th>{{trans('Students_trans.classrooms')}}</th>
                                            <th>{{trans('Students_trans.section')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        @foreach($students as $student)
                                        <tbody>

                                            <tr>
                                            <td>{{ $loop->index }}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->gender->Name}}</td>
                                            <td>{{$student->grade->Name}}</td>
                                            <td>{{$student->classroom->Name_Class}}</td>
                                            <td>{{$student->section->Name_Section}}</td>

                                            </tr>
                                            </tbody>

                                        @endforeach

                                    </table>

</body>
</html>


