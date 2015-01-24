<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-title">
            <h3> {{ Lang::get('core.config_lang_title'); }}
                <small> {{ Lang::get('core.config_lang_subtitle'); }} </small>
            </h3>
        </div>

        <ul class="breadcrumb">
            <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home'); }}</a></li>
            <li><a href="{{ URL::to('config') }}">{{ Lang::get('core.config_language'); }}</a></li>
        </ul>


    </div>


    <div class="page-content-wrapper m-t">
        <ul class="nav nav-tabs">
            <li><a href="{{ URL::to('config')}}">{{ Lang::get('core.tab_siteinfo'); }} </a></li>
            <li><a href="{{ URL::to('config/email') }}">{{ Lang::get('core.tab_email'); }}</a></li>
            <li><a href="{{ URL::to('config/security') }}"> {{ Lang::get('core.tab_loginsecurity'); }}  </a></li>
            <li class="active"><a
                        href="{{ URL::to('config/translation') }}">  {{ Lang::get('core.config_lang_title'); }}   </a>
            </li>
            <li><a href="{{ URL::to('config/log') }}">  {{ Lang::get('core.config_lang_clearcache'); }}  </a></li>
        </ul>
        <div class="tab-pane active use-padding" id="info">
            <div class="tab-content">


                @if(Session::has('message'))

                    {{ Session::get('message') }}

                @endif
                <ul class="parsley-error-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                {{ Form::open(array('url'=>'config/translation/', 'class'=>'form-vertical row')) }}

                <div class="col-sm-9 m-t">
                    <h4> {{ Lang::get('core.config_language'); }} </h4>
                    <hr/>
                    <a href="{{ URL::to('config/addtranslation')}} "
                       onclick="SximoModal(this.href,'Add New Language');return false;"
                       class="btn btn-success"> {{ Lang::get('core.config_lang_addnew'); }} </a>
                    <hr/>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> {{ Lang::get('core.config_lang_Name'); }} </th>
                            <th> {{ Lang::get('core.config_lang_Folder'); }} </th>
                            <th> {{ Lang::get('core.config_lang_Author'); }} </th>
                            <th> {{ Lang::get('core.config_lang_Action'); }} </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach(SiteHelpers::langOption() as $lang)
                            <tr>
                                <td>  {{  $lang['name'] }}   </td>
                                <td> {{  $lang['folder'] }} </td>
                                <td> {{  $lang['author'] }} </td>
                                <td>
                                    @if($lang['folder'] !='en')
                                        <a href="{{ URL::to('config/translation?edit='.$lang['folder'])}} "
                                           class="btn btn-sm btn-primary"> {{ Lang::get('core.config_lang_manage'); }} </a>
                                        <a href="{{ URL::to('config/removetranslation/'.$lang['folder'])}} "
                                           class="btn btn-sm btn-danger"> {{ Lang::get('core.config_lang_delete'); }} </a>

                                    @endif

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>


            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
</div>





