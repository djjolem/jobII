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
    <a class="navbar-brand" href="#">
      jobIT
    </a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li>{{ HTML::link('/', 'List Ads', array('class' => 'link-bold')) }}</li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li>{{ HTML::link('/newad', 'New Ad', array('class' => 'link-bold')) }} </li>

        @if(Auth::check())
          <li class="dropdown">
          <a data-toggle="dropdown"> 
            {{ Auth::user()->username }}
            &nbsp;
            <img class="pull-right img-responsive img-circle" src="http://placehold.it/32x32" alt="User" />
          </a>
          
          <ul class="dropdown-menu"  data-no-collapse="true">
            <li>
              <a href="#" onclick="submitForm('user_settings')">Settings</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="#" onclick="submitForm('signinup');">Sign out</a>
            </li>
          </ul>  
        </li>
        @else
          <li class="dropdown">
          <a class="btn btn-default btn-block" href="#signin" data-toggle="modal" 
              data-target="#myModalMenu">
            Sign In
            Sign up
          </a>
        </li>
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
          <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
          <li class=""><a href="#pass" data-toggle="tab"> Forgot password </a></li>
          <li class=""><a href="#signup" data-toggle="tab">Sign up</a></li>
          <li class=""><a href="#why" data-toggle="tab">Why?</a></li>
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
                  {{ Form::label('username', 'Alias', array('calss' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::text('username', null, array('class' => 'form-control input-medium', 'placeholder' => 'Username or email', 'required' => '')) }}
                  </div>
                </div>
                <!-- Password input-->
                <div class="control-group">
                {{ Form::label('password', 'Password', array('class' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::password('password', array(
                        'class' => 'form-control input-medium', 
                        'placeholder' => '*********', 'required' => ''
                      )) 
                    }}
                  </div>
                </div>

                <!-- Multiple Checkboxes (inline) -->
                <div class="control-group">
                  <div class="controls">
                    {{ Form::checkbox('rememberme0', null, array('value' => 'Remember me')) }}
                    {{ Form::label('rememberme0', 'Remember me', array('class' => 'checkbox inline')) }}
                  </div>
                </div>
                <!-- Button -->
                <div class="control-group">
                  <div class="controls">
                    <div class="">&nbsp;</div>
                    {{ Form::button('Sign In', 
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
                  {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::email('email', null, array('class' => 'form-control input-large', 'placeholder' => 'Email', 'required' => '')) }}
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="control-group">
                  {{ Form::label('username', 'Alias', array('class' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::text('username', null, array('class' => 'form-control input-large', 'placeholder' => 'Username', 'required' => '')) }}
                  </div>
                </div>
                
                <!-- Password input-->
                <div class="control-group">
                  {{ Form::label('password', 'Password', array('class' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::password('password', array('class' => 'form-control input-large', 'placeholder' => '**********', 'required' => '')) }}
                      <small><em>1-8 Characters</em></small>
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="control-group">
                  {{ Form::label('password_confirmation', 'Confirm password', 
                      array('class' => 'control-label')) 
                  }}
                  <div class="controls">
                    {{ Form::password('password_confirmation', array('class' => 'form-control input-large', 'placeholder' => '*********', 'required' => '' )) }}
                  </div>
                </div>
                    
                <!-- Button -->
                <div class="control-group">
                  <div class="">&nbsp;</div>
                  <div class="controls">
                    {{ Form::button ('Sign Up', 
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
                  {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::email('email', null, array('class' => 'form-control input-large', 'placeholder' => 'Email', 'required' => '')) }}
                  </div>
                </div>

                <div class="control-group">
                  {{ Form::label(null, 'Or', array('class' => 'control-label')) }}
                </div>

                <!-- Text input-->
                <div class="control-group">
                  {{ Form::label('alias', 'Alias', array('class' => 'control-label')) }}
                  <div class="controls">
                    {{ Form::text('alias', null, array('class' => 'form-control input-large', 'placeholder' => 'Alias', 'required' => '')) }}
                  </div>
                </div>

                <!-- Button -->
                <div class="control-group">
                  <div class="">&nbsp;</div>
                  <div class="controls">
                    {{ Form::button('Submit', array('class' => 'btn btn-success', 'name' => 'signup', 'id' => 'signup', 'value' => 'signup', 'type' => '')) }}
                  </div>
                </div>
              </fieldset>
            {{ Form::close() }}
          </div>

          <div class="tab-pane fade in" id="why">
            <p>We need this information so that you can receive access to the site and its content. Rest assured your information will not be sold, traded, or given to anyone.</p>
            <p></p><br> Please contact us at <a href="mailto:suport@jobit.com">email</a> for any other inquiries.</p>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <center>
          {{ Form::button('Close', 
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

<script type="text/javascript">
var submitForm = function(formName){
  document.getElementById(formName).submit();
}
</script>

@stop
