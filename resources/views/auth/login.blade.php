@extends('layouts.app')

@section('content')
<b-container>
    <b-row class="justify-content-md-center"    >
        <b-col cols="8">
             

                <b-card
                  header="Inicio de seción"
                  header-tag="header" 
                  bg-variant="info" 
                  text-variant="white" 
                >
                @if($errors->any())
                    <b-alert show variant="danger">
                        Corrije los siguientes errores:
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>  
                    </b-alert>
                @else 
                    <b-alert show variant="success">Por favor ingresa tus datos:</b-alert>
                @endif
      
                    <b-form method="POST" action="{{ route('login') }}">
                        @csrf

                        <b-form-group 
                            label="{{ __('E-Mail') }}"
                            label-for="email" 
                          >
                            <b-form-input
                              id="email"
                              name="email" 
                              type="email"
                              required
                              value="{{ old('email') }}" autofocus
                              placeholder="example@gmail.com">
                                   
                              </b-form-input> 
                        </b-form-group>
                        <!--
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   -->

                        <b-form-group 
                            label="{{ __('Contraseña') }}"
                            label-for="password" 
                          >
                            <b-form-input
                              id="password"
                              name="password" 
                              type="password"
                              required >
                                  
                              </b-form-input> 
                        </b-form-group>

                        
                        <!--
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  -->
                        <b-form-group>
                            <b-form-checkbox  
                              name="remember" 
                              {{ old('remember') ? 'checked="true"' : '' }}
                            >
                              Recordar sesión
                            </b-form-checkbox>
                        </b-form-group>
                        <!--
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>  -->
 

                        
                        <b-button type="submit" variant="primary">
                                {{ __('Login') }}
                        </b-button>

                        @if (Route::has('password.request'))
                            <b-button href="{{ route('password.request') }}" variant="link">
                                    {{ __('Forgot Your Password?') }}
                            </b-button> 
                        @endif
                     
                        <!--
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>  -->

                    </b-form>
                </b-card>

              <br>

                <b-card
                    title="Card Title"
                    img-src="https://picsum.photos/600/300/?image=25"
                    img-alt="Image"
                    img-top
                    tag="article"
                    style="max-width: 20rem;"
                    class="mb-2"
                  >
                    <b-card-text>
                      Some quick example text to build on the card title and make up the bulk of the card's content.
                    </b-card-text>

                    <b-button href="#" variant="primary">Go somewhere</b-button>
                  </b-card>


             
        </b-col>
    </b-row>
</b-container>
@endsection
