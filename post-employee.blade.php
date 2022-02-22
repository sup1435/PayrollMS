@extends('layouts.default')

    @section('meta')
        <title>New Employee | CK Tech Media</title>
        <meta name="description" content="Workday add new employee, delete employee, edit employee">
    @endsection

    @section('styles')
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __('Employee Profile') }}</h2>
            </div>    
        </div>

        <div class="row">
            <div class="col-md-12">
            @if ($errors->any())
            <div class="ui error message">
                <i class="close icon"></i>
                <div class="header">{{ __('There were some errors with your submission') }}</div>
                <ul class="list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
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
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>
    <script type="text/javascript">
    $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'yyyy-mm-dd', autoClose: true });
    
    $('.ui.dropdown.department').dropdown({ onChange: function(value, text, $selectedItem) {
        $('.jobposition .menu .item').addClass('hide disabled');
        $('.jobposition .text').text('');
        $('input[name="jobposition"]').val('');
        $('.jobposition .menu .item').each(function() {
            var dept = $(this).attr('data-dept');
            if(dept == value) {$(this).removeClass('hide disabled');};
        });
    }});

    function validateFile() {
        var f = document.getElementById("imagefile").value;
        var d = f.lastIndexOf(".") + 1;
        var ext = f.substr(d, f.length).toLowerCase();
        if (ext == "jpg" || ext == "jpeg" || ext == "png") { } else {
            document.getElementById("imagefile").value="";
            $.notify({
            icon: 'ui icon times',
            message: "Please upload only jpg/jpeg and png image formats."},
            {type: 'danger',timer: 400});
        }
    }
    </script>
    @endsection