<?php

namespace LaravelLiberu\Google\Http\Controllers\Settings;

use Illuminate\Routing\Controller;
use LaravelLiberu\Google\Http\Requests\ValidateSettings;
use LaravelLiberu\Google\Models\Settings;

class Update extends Controller
{
    public function __invoke(ValidateSettings $request, Settings $settings)
    {
        $settings->update($request->validated());

        return ['message' => 'Settings were stored sucessfully'];
    }
}
