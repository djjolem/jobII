@section('menu')

<!-- Menu -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header>"
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    {{ HTML::link('#', Lang::get('lcl.productName'), array('class' => 'navbar-brand')) }}
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li>{{ HTML::link('/', Lang::get('lcl.ads.list'), array('class' => 'link-bold')) }}</li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li>{{ HTML::link('/newad', Lang::get('lcl.ads.new'), array('class' => 'link-bold')) }}</li>

        @if(Auth::check())
          <li class="dropdown">
          <a data-toggle="dropdown"> 
            {{ Auth::user()->username }}
            &nbsp;
            {{ HTML::image('http://placehold.it/32x32', Lang::get('user'), array('class' => 'pull-right img-responsive img-circle')) }}
          </a>
          
          <ul class="dropdown-menu"  data-no-collapse="true">
            <li>
              {{ HTML::link('#', Lang::get('lcl.settings'), array('onclick' => 'submitMenuForm("user_settings")')) }}
            </li>
            <li>
              {{ HTML::link('#', Lang::get('lcl.myAds'), array('onclick' => 'submitMenuForm("my_ads")')) }}
            </li>
            <li class="divider"></li>
            <li>
              {{ HTML::link('#', Lang::get('lcl.signout'), array('onclick' => 'submitMenuForm("signinup")')) }}
            </li>
          </ul>  
        </li>
        @else
          @if (isset($userEnable) && $userEnable)
            <li class="dropdown">
              {{ HTML::link('#', Lang::get('lcl.signinSignup'), array('class' => 'btn btn-default btn-block', 'data-toggle' => 'modal', 'data-target' => '#myModalMenu')) }}
            </li>
          @endif
        @endif
    </ul>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<div class="">&nbsp;</div>
<div class="">&nbsp;</div>
<div class="">&nbsp;</div>
<div class="">&nbsp;</div>


<!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModalMenu" tabindex="-1" 
    role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <br>
      <div class="bs-example bs-example-tabs">
        <ul id="myTab" class="nav nav-tabs">
          <li class="">
            {{ HTML::link('#signin', Lang::get('lcl.signin'), array('data-toggle' => 'tab')) }}
          </li>
          <li class="">
            {{ HTML::link('#pass', Lang::get('lcl.forgotPass'), array('data-toggle' => 'tab')) }}
          </li> 
          <li class="">
            {{ HTML::link('#signup', Lang::get('lcl.signup'), array('data-toggle' => 'tab')) }}
          </li> 
          <li class="">
            {{ HTML::link('#why', Lang::get('lcl.why?'), array('data-toggle' => 'tab')) }}
          </li>
        </ul>
      </div>

      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
          
          <!-- ***************** --> 
          <!-- Tab: Sign In Form -->
          <div class="tab-pane fade active in" id="signin">
            {{ Form::open(array('url' => 'signinup', 'method' => 'POST', 'name' => 'sign_in', 'id' => 'sign_in', 'class' => 'form-horizontal', 'role' => 'form')) }}
              <fieldset>
                <div class="control-group">
                  {{ Form::label('username', Lang::get('lcl.alias'), array('calss' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::text('username', null, array('class' => 'form-control input-medium', 'placeholder' =>  Lang::get('lcl.placeholder.usernameEmail'), 'required' => '')) }}
                  </div>
                </div>
                <!-- Password input-->
                <div class="control-group">
                {{ Form::label('password', Lang::get('lcl.password'), array('class' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::password('password', array(
                        'class' => 'form-control input-medium', 
                        'placeholder' => Lang::get('lcl.placeholder.passwordHidden'), 'required' => ''
                      )) 
                    }}
                  </div>
                </div>

                <!-- Multiple Checkboxes (inline) -->
                <div class="control-group">
                  <div class="controls">
                    {{ Form::checkbox('rememberme0', null, array('value' => 'Remember me')) }}
                    {{ Form::label('rememberme0', Lang::get('lcl.rememberMe'), array('class' => 'checkbox inline')) }}
                  </div>
                </div>
                <!-- Button -->
                <div class="control-group">
                  <div class="controls">
                    <div class="">&nbsp;</div>
                    {{ Form::button(Lang::get('lcl.signin'),
                        array('class' => 'btn btn-success', 'name' => 'signin', 'id' => 'signin', 'value' => 'signin', 'type' => '')) 
                    }}
                  </div>
                </div>
              </fieldset>
            {{ Form::close() }}
          </div>

          <!-- ***************** --> 
          <!-- Tab: Sign Up Form --> 
          <div class="tab-pane fade" id="signup">
            {{ Form::open(array('url' => 'signinup', 'method' => 'POST', 'name' => 'new_user', 'id' => 'new_user', 'class' => 'form-horizontal', 'role' => 'form')) }}        
              <fieldset>
                <div class="control-group">
                  {{ Form::label('email', Lang::get('lcl.email'), array('class' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::email('email', null, array('class' => 'form-control input-large', 
                      'placeholder' => Lang::get('lcl.placeholder.email'), 'required' => '')) 
                    }}
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="control-group">
                  {{ Form::label('username', Lang::get('lcl.alias'), array('class' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::text('username', null, array('class' => 'form-control input-large', 
                      'placeholder' => Lang::get('lcl.placeholder.alias'), 'required' => '')) 
                    }}
                  </div>
                </div>
                
                <!-- Password input-->
                <div class="control-group">
                  {{ Form::label('password', Lang::get('lcl.password'), array('class' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::password('password', array('class' => 'form-control input-large', 
                      'placeholder' => Lang::get('lcl.placeholder.passwordHidden'), 'required' => '')) 
                    }}
                      <small><em>{{ Lang::get('lcl.placeholder.passwordComment') }}</em></small>
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="control-group">
                  {{ Form::label('password_confirmation', Lang::get('lcl.passwordConfirm'), 
                      array('class' => 'control-label')) 
                  }}
                  <div class="controls">
                    {{ Form::password('password_confirmation', array('class' => 'form-control input-large', 'placeholder' => Lang::get('lcl.placeholder.passwordHidden'), 'required' => '' )) 
                    }}
                  </div>
                </div>
                    
                <!-- Button -->
                <div class="control-group">
                  <div class="">&nbsp;</div>
                  <div class="controls">
                    {{ Form::button (Lang::get('lcl.signup'), 
                      array('class' => 'btn btn-success', 'id' => 'signup', 'name' => 'signup', 'value' => 'signup', 'type' => '')) 
                    }}
                  </div>
                </div>
              </fieldset>
            {{ Form::close() }}
          </div>

          <div class="tab-pane fade" id="pass">
            {{ Form::open(array('url' => 'recover', 'metod' => 'POST', 'name' => 'forgot_pass', 'id' => 'forgot_pass', 'class' => 'form-horizontal', 'role' => 'form')) }}
              <fieldset>
                <!-- Text input-->
                <div class="control-group">
                  {{ Form::label('email', Lang::get('lcl.email'), array('class' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::email('email', null, array('class' => 'form-control input-large', 
                      'placeholder' => Lang::get('lcl.placeholder.email'), 'required' => '')) 
                    }}
                  </div>
                </div>

                <div class="control-group">
                  {{ Form::label(null, Lang::get('lcl.or'), array('class' => 'control-label')) }}
                </div>

                <!-- Text input-->
                <div class="control-group">
                  {{ Form::label('alias', Lang::get('lcl.alias'), array('class' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::text('alias', null, array('class' => 'form-control input-large', 
                      'placeholder' => Lang::get('lcl.placeholder.alias'), 'required' => '')) 
                    }}
                  </div>
                </div>

                <!-- Button -->
                <div class="control-group">
                  <div class="">&nbsp;</div>
                  <div class="controls">
                    {{ Form::button(Lang::get('submit'),
                      array('class' => 'btn btn-success', 'name' => 'signup', 'id' => 'signup', 'value' => 'signup', 'type' => '')) 
                    }}
                  </div>
                </div>
              </fieldset>
            {{ Form::close() }}
          </div>

          <div class="tab-pane fade in" id="why">
            {{ Lang::get('lcl.longText.explainWhy') }}
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <center>
          {{ Form::button(Lang::get('lcl.close'),
            array('class' => 'btn btn-default', 'data-dismiss' => 'modal')) 
          }}
        </center>
      </div>

    </div>
  </div>
</div>

{{ Form::open(array(
      'url' => 'settings', 'method' => 'POST', 'name' => 'user_settings',
      'id' => 'user_settings', 'class' => 'form-horizontal', 'role' => 'form',
  )) 
}}
  {{ Form::hidden('settings', 'settings') }}
{{ Form::close() }}

{{ Form::open(array(
      'url' => 'signinup', 'method' => 'POST', 'name' => 'signinup', 
      'id' => 'signinup', 'class' => 'form-horizontal', 'role' => 'form',
  ))
}}
  {{ Form::hidden('signout', 'signout') }}
{{ Form::close() }}

{{ Form::open(array(
    'url' => 'myads', 'method' => 'POST', 'name' => 'my_ads',
    'id' => 'my_ads', 'class' => 'form-horizontal', 'role' => 'form' 
  ))
}}
  {{ Form::hidden('myads', 'myads') }}
{{ Form::close() }}

<script type="text/javascript">
var submitMenuForm = function(formName){
  document.getElementById(formName).submit();
}
</script>

@stop
