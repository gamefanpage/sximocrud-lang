<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-title">
            <h3>  {{ Lang::get('core.t_blastemail') }}
                <small>{{ Lang::get('core.t_blastemailsmall') }}</small>
            </h3>
        </div>

        <ul class="breadcrumb">
            <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home'); }}</a></li>
            <li class="active">{{ Lang::get('core.t_blastemail') }}  </li>
        </ul>
    </div>

    <div class="page-content-wrapper">
        @if(Session::has('message'))
            {{ Session::get('message') }}
            @endif

                    <!-- Start blast email -->

            {{ Form::open(array('url'=>'config/doblast/', 'class'=>'form-horizontal ','parsley-validate'=>' ' ,'novalidate'=>' ')) }}
            <div class="form-group  ">
                <label for="ipt" class=" control-label col-md-3"> </label>

                <div class="col-md-12">
                    <ul class="parsley-error-list">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group  ">
                    <label for="ipt"
                           class=" control-label col-md-3">  {{ Lang::get('core.fr_emailsubject'); }}   </label>

                    <div class="col-md-9">
                        {{ Form::text('subject',null,array('class'=>'form-control', 'placeholder'=>'','required'=>'true')) }}
                    </div>
                </div>
                <div class="form-group  ">
                    <label for="ipt" class=" control-label col-md-3"> {{ Lang::get('core.fr_emailsendto'); }}   </label>

                    <div class="col-md-9">
                        @foreach($groups as $row)
                            <label class="checkbox">
                                <input type="checkbox" required name="groups[]"
                                       value="{{ $row->group_id}}"/> {{ $row->name }}
                            </label>


                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group  ">
                    <label for="ipt" class=" control-label col-md-3">  {{ Lang::get('core.blast_status'); }}   </label>

                    <div class="col-md-9">
                        <label class="radio">
                            <input type="radio" required name="uStatus"
                                   value="all">  {{ Lang::get('core.blast_status_all'); }}
                        </label>
                        <label class="radio">
                            <input type="radio" required name="uStatus"
                                   value="1">  {{ Lang::get('core.blast_active'); }}
                        </label>
                        <label class="radio">
                            <input type="radio" required name="uStatus"
                                   value="0">  {{ Lang::get('core.blast_unconfirmed'); }}
                        </label>
                        <label class="radio">
                            <input type="radio" required name="uStatus"
                                   value="2">  {{ Lang::get('core.blast_blocked'); }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">


                <div class="form-group ">

                    <div style=" padding:10px;">
                        <label for="ipt" class=" control-label "> {{ Lang::get('core.fr_emailmessage') }} </label>
                        <textarea class="form-control markItUp" rows="15" required name="message"></textarea>
                    </div>
                    <p> {{ Lang::get('core.fr_emailtag'); }} : </p>
                    <small> [fullname] [first_name] [last_name] [email]</small>

                </div>


                <div class="form-group">
                    <label for="ipt" class=" control-label col-md-3"> </label>

                    <div class="col-md-9">
                        <button type="submit" name="submit"
                                class="btn btn-primary">{{ Lang::get('core.sb_send'); }}</button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}


            <!-- / blast email -->

    </div>


</div>


