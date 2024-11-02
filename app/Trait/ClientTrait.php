<?php

namespace App\Trait;

use Illuminate\Http\Request;

trait ClientTrait
{
    public function validateClient(Request $request): void
    {
        $input = ["full_name" => "required", "education.*" => "required"];
        foreach ($request->education as $key => $value) {
            $input["education.{$key}.degree"] = 'required';
            $input["education.{$key}.institute"] = 'required';
            $input["education.{$key}.result"] = 'required';
            $input["education.{$key}.year"] = 'required';
        }
        $request->validate($input);
    }
}
