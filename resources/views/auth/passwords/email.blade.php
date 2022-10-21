@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Restablecer usuario y contraseña </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Ingresa tu correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar Correo
                                </button>
                            </div>
                        </div>




                    </form>

                    


                    <div class="panel-body">
						
						<div class="conten">
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
</div>
@endsection