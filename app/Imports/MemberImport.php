<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;

class MemberImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Member([
            'nama'  => $row[1],
            'alamat'  =>$row[2],
            'jenis_kelamin' =>$row[3],
            'tlp' =>$row[4],
        ]);
    }
}
