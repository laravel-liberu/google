<?php

namespace LaravelLiberu\Google\Http\Controllers\Settings;

use Illuminate\Routing\Controller;
use LaravelLiberu\Google\Forms\Builders\Settings as Form;
use LaravelLiberu\Google\Models\Settings;

class Index extends Controller
{
    public function __invoke(Form $form)
    {
        return ['form' => $form->edit(Settings::current())];
    }
}
