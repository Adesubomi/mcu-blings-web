<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
        'role', 'level', 'matric_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullnameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function createStudent($request)
    {
        $student = null;

        DB::transaction( function ($query) use (&$student, $request) {
            $student = $this->create([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
                'level' => $request->input('level') ?? 1,
                'matric_number' => $request->input('matric_number'),
                'password' => bcrypt( Str::random(6) ),
            ]);

            $biometric = Biometric::create([
                'user_id' => $student->id,
                'left_thumb' => '',
                'left_index' => '',
                'left_middle' => '',
                'left_ring' => '',
                'left_pinky' => '',
                'right_thumb' => '',
                'right_index' => '',
                'right_middle' => '',
                'right_ring' => '',
                'right_pinky' => '',
            ]);
        });

        return $student;
    }

    public function getLastMatricNumber()
    {
        $latestStudent = $this->students()->latest()->first();

        if (!empty($latestStudent)) {
            return $latestStudent->matric_number;
        }

        return '';
    }

    public function scopeStudents($query)
    {
        return $query->where('role', config('app.roles.STUDENT.Key'));
    }

    public function getStudents()
    {
        return $this->students()->get();
    }
}
