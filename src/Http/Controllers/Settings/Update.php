<?php

namespace LaravelEnso\Google\Http\Controllers\Settings;

use Illuminate\Routing\Controller;
use LaravelEnso\Google\Http\Requests\ValidateSettings;
use LaravelEnso\Google\Models\Settings;

class Update extends Controller
{
    public function __invoke(ValidateSettings $request, Settings $settings)
    {
        $settings->update($request->validated());

        return ['message' => 'Settings were stored sucessfully'];
    }
}
