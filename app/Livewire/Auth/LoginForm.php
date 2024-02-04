<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm as FormsLoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LoginForm extends Component
{
    public FormsLoginForm $form;

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }
}
