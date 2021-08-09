<?php

namespace LaravelEnso\Google\Http\Controllers\Settings;

use Illuminate\Routing\Controller;
use LaravelEnso\Google\Forms\Builders\Settings as Form;
use LaravelEnso\Google\Models\Settings;

class Index extends Controller
{
    public function __invoke(Form $form)
    {
        return ['form' => $form->edit(Settings::current())];
    }
}
