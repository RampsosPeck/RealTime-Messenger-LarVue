@extends('layouts.app')

@section('content')
<b-container>
    <b-row class="justify-content-md-center"    >
        <b-col cols="8">  

            <b-card
              header="Registra tus datos"
              header-tag="header" 
              bg-variant="info" 
              text-variant="white" 
            >  
                <b-form method="POST" action="{{ route('register') }}">
                        @csrf

                    <b-form-group 
                        label="{{ __('Nombre') }}"
                        label-for="name" 
                      >
                        <b-form-input
                          id="name"
                          name="name" 
                          type="text"
                          required
                          value="{{ old('name') }}" autofocus
                          placeholder="Lic. Juan Perez">
                        </b-form-input>
                    </b-form-group> 

                    <b-form-group 
                        label="{{ __('Email') }}"
                        label-for="email" 
                      >
                        <b-form-input
                          id="email"
                          name="email" 
                          type="email"
                          required
                          value="{{ old('email') }}" 
                          placeholder="ejemplo@gmail.com"
                          description="Nunca compartiremos tu correo. Está seguro con nosotros.">
                              
                          </b-form-input>
                    </b-form-group> 

                    <b-form-group 
                        label="{{ __('Contraseña') }}"
                        label-for="password" 
                      >
                        <b-form-input
                          id="password"
                          name="password" 
                          type="password"
                          required 
                          placeholder="******">
                              
                          </b-form-input>
                    </b-form-group> 
                    
                    <b-form-group 
                        label="{{ __('Confirmar contraseña') }}"
                        label-for="password-confirm" 
                      >
                        <b-form-input
                          id="password-confirm"
                          name="password-confirm" 
                          type="password"
                          required >
                              
                          </b-form-input>
                    </b-form-group> 

                    <b-button type="submit" variant="primary">
                            {{ __('Confirmar registro') }}
                    </b-button> 
                    <b-button href="{{ route('login') }}"  variant="warning">
                            {{ __('¿Ya te has registrado?') }}
                    </b-button> 
                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
