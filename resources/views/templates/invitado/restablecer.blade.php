@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Restablecer Contraseña</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('invitado.restablece') }}">
                        {{ csrf_field() }}



                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Ingresa tu correo</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                
                            </div>
                    
                        </div>


                       
                    

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                            </div>
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                                
                            </div>
                        </div>





                        <hr>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Restablecer Contraseña
                                </button>
                            </div>
                        </div>
                        
                        
                        
                        
                    </form>
                    
                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a href="<?php echo route('principal') ?>" class="login100-form-btn">
                                <button type="submit" class="btn btn-primary">
                                    Salir
                                </button></a>
                                </div>
                                <!--button type="submit" class="login100-form-btn">Iniciar</button-->
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
