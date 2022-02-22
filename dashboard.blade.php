@extends('layouts.default')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    @section('meta')
        <title>Dashboard | CK Tech Media</title>
        <meta name="description" content="Workday dashboard, view recent attendance, recent leaves of absence, and newest employees">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <h2 class="page-title w3-animate-zoom" style="color:black;">{{ __('Dashboard') }}</h2>
            </div>    
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="info-box w3-center w3-animate-right">
                    <span class="info-box-icon bg-orange"><i class="ui icon user circle"></i></span>
                    <div class="info-box-content bolder">
                        <span class="info-box-text uppercase">{{ __('Employees') }}</span>
                        <div class="progress-group">
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-orange" style="width: 100%"></div>
                            </div>
                            <div class="stats_d">
                                <table style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>{{ __('Regular') }}</td>
                                            <td>@isset($emp_typeR) {{ $emp_typeR }} @endisset</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Trainee') }}</td>
                                            <td>@isset($emp_typeT) {{ $emp_typeT }} @endisset</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="info-box w3-center w3-animate-right">
                    <span class="info-box-icon bg-green"><i class="ui icon calendar outline"></i></span>
                    <div class="info-box-content bolder">
                        <span class="info-box-text">{{ __('Attendances') }}</span>
                        <div class="progress-group">
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-green" style="width: 100%"></div>
                            </div>
                            <div class="stats_d">
                                <table style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>{{ __('Online') }}</td>
                                            <td>@isset($is_online_now) {{ $is_online_now }} @endisset</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Offline') }}</td>
                                            <td>@isset($is_offline_now) {{ $is_offline_now }} @endisset</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="info-box w3-center w3-animate-right">
                    <span class="info-box-icon bg-aqua"><i class="ui icon home"></i></span>
                    <div class="info-box-content bolder">
                        <span class="info-box-text uppercase">{{ __('Leaves of Absence') }}</span>
                        <div class="progress-group">
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                            </div>
                            <div class="stats_d">
                                <table style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>{{ __('Approved') }}</td>
                                            <td>@isset($emp_leaves_approve) {{ $emp_leaves_approve }} @endisset</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Pending') }}</td>
                                            <td>@isset($emp_leaves_pending) {{ $emp_leaves_pending }} @endisset</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="box box-success w3-center w3-animate-bottom">
                    <div class="box-header with-border" style="background-color:powderblue;">
                        <h3 class="box-title" style="text-align:center;color:black;">{{ __('Newest Employees') }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    <table class="table responsive nobordertop">
                        <thead>
                            <tr>
                                <th class="text-left">{{ __('Name') }}</th>
                                <th class="text-left">{{ __('Position') }}</th>
                                <th class="text-left">{{ __('Start Date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($emp_all_type)
                                @foreach ($emp_all_type as $data)
                                <tr>
                                    <td class="text-left name-title">{{ $data->firstname }} {{ $data->lastname }} </td>
                                    <td class="text-left">{{ $data->jobposition }}</td>
                                    <td class="text-left">@php echo e(date('M d, Y', strtotime($data->startdate))) @endphp</td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="box box-success w3-center w3-animate-bottom">
                    <div class="box-header with-border" style="background-color:powderblue;">
                        <h3 class="box-title" style="text-align:center;color:black;">{{ __('Recent Attendances') }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table responsive nobordertop">
                        <thead>
                            <tr>
                                <th class="text-left">{{ __('Name') }}</th>
                                <th class="text-left">{{ __('Type') }}</th>
                                <th class="text-left">{{ __('Time') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($a)
                                @foreach($a as $v)
                                @if($v->timein != null && $v->timeout == null)
                                <tr>
                                    <td class="name-title">{{ $v->employee }}</td>
                                    <td>Time-In</td>
                                    <td>
                                        @php
                                            if($tf == 1) {
                                                echo e(date('h:i:s A', strtotime($v->timein))); 
                                            } else {
                                                echo e(date('H:i:s', strtotime($v->timein))); 
                                            }
                                        @endphp
                                    </td>
                                </tr>
                                @endif
                                
                                @if($v->timein != null && $v->timeout != null)
                                <tr>
                                    <td class="name-title">{{ $v->employee }}</td>
                                    <td>Time-Out</td>
                                    <td>
                                        @php
                                            if($tf == 1) {
                                                echo e(date('h:i:s A', strtotime($v->timeout))); 
                                            } else {
                                                echo e(date('H:i:s', strtotime($v->timeout))); 
                                            }
                                        @endphp
                                    </td>
                                </tr>
                                @endif

                                @if($v->timein != null && $v->timeout != null)
                                <tr>
                                    <td class="name-title">{{ $v->employee }}</td>
                                    <td>Time-In</td>
                                    <td>
                                        @php
                                            if($tf == 1) {
                                                echo e(date('h:i:s A', strtotime($v->timein))); 
                                            } else {
                                                echo e(date('H:i:s', strtotime($v->timein))); 
                                            }
                                        @endphp
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            @endisset
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="box box-success w3-center w3-animate-bottom">
                    <div class="box-header with-border" style="background-color:powderblue;">
                        <h3 class="box-title" style="text-align:center;color:black;">{{ __('Recent Leaves of Absence') }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    <table class="table responsive nobordertop">
                        <thead>
                            <tr>
                                <th class="text-left">{{ __('Name') }}</th>
                                <th class="text-left">{{ __('Date') }}</th>
                            </tr>
                        </thead>
                            <tbody>
                                @isset($emp_approved_leave)
                                    @foreach ($emp_approved_leave as $leaves)
                                    <tr>
                                        <td class="text-left name-title">{{ $leaves->employee }}</td>
                                        <td class="text-left">@php echo e(date('M d, Y', strtotime($leaves->leavefrom))) @endphp</td>
                                    </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!-- <a href="calendar.html">Visit W3Schools</a> -->
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
    <!-- <marquee><strong><a href="https://www.cktechmedia.com">visit &copy;2021 -- CK Money Finannce -- All rights reserved.</a>.</strong>
			</marquee> -->

    @endsection
    
