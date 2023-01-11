<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\candidates;
use App\Models\skill_sets;
use App\Models\skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class candidateController extends Controller
{
    public function store(Request $request)
    {
        $name = $request->input('name');
        $job_id = $request->input('job_id');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $year = $request->input('year');

        $message = [
            'required' => 'Entry :attribute wajib diisi',
            'unique' => 'Telah digunakan',
            'email' => 'Email tidak sesuai, sertakan @ pada alamat email',
            'numeric' => 'No Telepon Harus berupa angka'
        ];


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:candidates,email|email',
            'phone' => 'required|unique:candidates,phone|numeric',
            'year' => 'required',
            'job_id' => 'required',
            'skill' => 'required'
        ], $message);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'true',
                'data' => $validator->errors()
            ], 400);
        }

        $candidate = new candidates();
        $candidate->name = $name;
        $candidate->job_id = $job_id;
        $candidate->phone = $phone;
        $candidate->email = $email;
        $candidate->year = $year;
        $candidate->save();
        
        $candidate_id = DB::table('candidates')->where('email', $email)->first()->id;

        foreach ($request->input('skill') as $skill) {
            $skill_sets = new skill_sets();
            $skill_sets->candidate_id = $candidate_id;
            $skill_sets->skill_id = $skill;
            $skill_sets->save();
        }

        return response()->json([
            'error' => 'false',
            'message' => 'data berhasil ditambahkan'
        ], 400);
    }
}
