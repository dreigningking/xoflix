<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    public $data;
    public function __construct($data){
        $this->data = $data;
    }
    public function view(): View
    {
        return view('admin.users_export', [
            'users' => $this->data
        ]);
    }
}