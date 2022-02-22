@extends('layouts.default')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    @section('meta')
        <title>Employees | CK Tech Media</title>
        <meta name="description" content="Workday employees, view all employees, add, edit, delete, and archive employees.">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title w3-animate-zoom" style="text-align:center;color:black;">{{ __('Employees') }}
                <a class="ui positive button mini offsettop5 float-right" href="{{ url('employees/new') }}"><i class="ui icon plus"></i>{{ __('Add') }}</a>
                <!-- <a class="ui positive button mini offsettop5 float-right" href="{{ url('employees/post') }}"><i class="ui icon plus"></i>{{ __('Post') }}</a> -->
            </h2>
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body">
                <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "desc" ]]'>
                    <thead>
                        <tr bgcolor="lightblue">
                            <th>{{ __('ID') }}</th> 
                            <th>{{ __('Employee') }}</th> 
                            <th>{{ __('Company') }}</th>
                            <th>{{ __('Department') }}</th>
                            <th>{{ __('Position') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th class=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($data)
                        @foreach ($data as $employee)
                            <tr class="">
                            <td>{{ $employee->idno }}</td>
                            <td>{{ $employee->firstname }} {{ $employee->lastname }}</td>
                            <td>{{ $employee->company }}</td>
                            <td>{{ $employee->department }}</td>
                            <td>{{ $employee->jobposition }}</td>
                            <td>@if($employee->employmentstatus == 'Active') Active @else Archived @endif</td>
                            <td class="align-right">
                            <a href="{{ url('/profile/view/'.$employee->reference) }}" class="ui circular basic icon button tiny"><i class="file alternate outline icon"></i></a>
                            <a href="{{ url('/profile/edit/'.$employee->reference) }}" class="ui circular basic icon button tiny"><i class="edit outline icon"></i></a>
                            <a href="{{ url('/profile/delete/'.$employee->reference) }}" class="ui circular basic icon button tiny"><i class="trash alternate outline icon"></i></a>
                            <a href="{{ url('/profile/archive/'.$employee->reference) }}" class="ui circular basic icon button tiny"><i class="archive icon"></i></a>
                            </td>
                            </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        
    </div>
    <style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 3%;
  background-color: powderblue;
  color: black;
  /* text-align: center; */
}
</style>

<div class="footer">
  <p><marquee><strong><a href="https://www.cktechmedia.com">visit &copy;2022 CK Tech Media</a></strong>
			</marquee></p>
</div>
    @endsection

    @section('scripts')
    <script type="text/javascript">
    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,ordering: true});
    </script>
    @endsection