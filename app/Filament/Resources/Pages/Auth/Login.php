<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class Login extends BaseLogin
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Change Email to "ID Number"
                TextInput::make('identity_number')
                    ->label('School ID / Employee ID')
                    ->required()
                    ->autocomplete(),
                
                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->required(),
            ]);
    }

    public function getCredentialsFromFormData(array $data): array
    {
        // Tell Laravel to look up the user by 'identity_number'
        return [
            'identity_number' => $data['identity_number'],
            'password' => $data['password'],
        ];
    }
}