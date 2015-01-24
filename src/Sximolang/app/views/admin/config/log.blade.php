<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-title">
            <h3> {{ Lang::get('core.t_logstitle') }}
                <small> {{ Lang::get('core.fr_logsview'); }} </small>
            </h3>
        </div>

        <ul class="breadcrumb">
            <li><a href="{{ URL::to('dashboard') }}"> {{ Lang::get('core.home'); }} </a></li>
            <li><a href="{{ URL::to('config') }}"> {{ Lang::get('core.fr_logserrors'); }} </a></li>
        </ul>


    </div>

    <div class="page-content-wrapper">
        @if(Session::has('message'))

            {{ Session::get('message') }}

        @endif
        <ul class="parsley-error-list">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="block-content">
            <ul class="nav nav-tabs">
                <li><a href="{{ URL::to('config')}}"> {{ Lang::get('core.tab_siteinfo'); }} </a></li>
                <li><a href="{{ URL::to('config/email') }}"> {{ Lang::get('core.tab_email'); }} </a></li>
                <li><a href="{{ URL::to('config/security') }}"> {{ Lang::get('core.tab_loginsecurity'); }} </a></li>
                <li><a href="{{ URL::to('config/translation') }}"> {{ Lang::get('core.config_lang_title'); }} </a></li>
                <li class="active"><a
                            href="{{ URL::to('config/log') }}"> {{ Lang::get('core.config_lang_clearcache'); }} </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active use-padding" id="info">
                    {{ Form::open(array('url'=>'config/email/', 'class'=>'form-vertical row')) }}

                    <div class="col-sm-6">

                        <fieldset>
                            <legend> {{ Lang::get('core.fr_logssessions'); }} </legend>
                            <div class="form-group">
                                <label for="ipt" class=" control-label"> {{ Lang::get('core.fr_logserrors'); }} </label>
                                <label class="label label-danger"> {{  $filesize }} </label>
                            </div>

                            <div class="form-group">
                                <label for="ipt"
                                       class=" control-label"> {{ Lang::get('core.fr_logstemplate'); }} </label>

                            </div>

                            <div class="form-group">
                                <a href="{{ URL::to('config/clearlog') }}"
                                   class="btn btn-primary">  {{ Lang::get('core.fr_logsclear'); }}  </a>
                            </div>

                        </fieldset>


                    </div>


                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>





