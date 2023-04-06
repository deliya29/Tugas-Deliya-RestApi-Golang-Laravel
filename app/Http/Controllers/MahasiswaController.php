<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    public function index(){
        $res = Http::get('http://localhost:8080/mahasiswa');
  
        $mahasiswa = $res->json();

        return view('Vmahasiswa', ['mahasiswa' => $mahasiswa]);
  
      }
  
      public function tampilkan(){
          $res = Http::get('http://localhost:8080/mahasiswa');
  
          $mahasiswa = $res->json();
  
          return view('tblmahasiswa', ['mahasiswa' => $mahasiswa]);
      }
  
      public function tambah (Request $request){
  
          $request->validate(
            [
                'npm'=>'required',
                'name'=>'required',
                'phone'=>'required',
                'address'=>'required',
            ],
            [
                'npm.required'=>'NPM is Required *',
                'name.required'=>'Nama is Required *',
                'phone.required'=>'Phone is Required *',
                'address.required'=>'Alamat is Required *',
            ]
          );
          
          $res = Http::post('http://localhost:8080/mahasiswa', [
            'npm' => (int)$request->npm,
                  'nama' => $request->name,
                  'hp' => $request->phone,
                  'alamat' => $request->address,
          ]);
  
      }
  
      public function hapus(Request $request)
      {
  
      $res = Http::delete('http://localhost:8080/mahasiswa/' . $request->npm);
        
      }
  
      public function edit(Request $request)
      {
          $request->validate(
          [
              'name'=>'required',
              'phone'=>'required',
              'address'=>'required',
          ],
          [
              'name.required'=>'Nama is Required *',
              'phone.required'=>'Phone is Required *',
              'address.required'=>'Alamat is Required *',
          ]
        );
        
        $res = Http::put('http://localhost:8080/mahasiswa/' . $request->npm, [
          'nama' => $request->name,
          'hp' => $request->phone,
          'alamat' => $request->address,
        ]);
      }
}
