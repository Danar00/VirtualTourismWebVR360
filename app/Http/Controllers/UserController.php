<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kampung;
use App\Models\Panorama;
use App\Models\Pindah_Panorama;
use App\Models\Informasi;

class UserController extends Controller
{
    public function preview($nama_panorama){
      $panorama  = Panorama::where('nama_panorama', $nama_panorama)->first();
      //$pindah_panorama = Pindah_Panorama::where('parent_panorama', $panorama->key_panorama)->get();
      //$deskripsiPanorama = Informasi::where('panorama_id', $panorama->key_panorama)->get();
      $panoramas = Panorama::All();
      // return view('a_frame', ['panorama'=>$panorama , 'pindah_panorama'=>$pindah_panorama, 'deskripsiPanorama'=>$deskripsiPanorama,'panoramas'=>$panoramas]);
      return view('aframe', ['panorama'=>$panorama , 'panoramas'=>$panoramas]);
    }

    public function index(){
      $panorama = Panorama::where('key_panorama', 'HOME1')->first();
      $linkPanorama = Pindah_Panorama::where('key_parent', $panorama->key_panorama)->get();
      $deskripsi = Informasi::where('panorama_id',$panorama->key_panorama)->get();
      $panoramas = Panorama::all();
      $kampungs = Kampung::all();
      $counts = collect($kampungs)->count();
      return view('kampungtematik', ['panorama'=>$panorama, 'linkPanorama'=>$linkPanorama, 'deskripsi'=>$deskripsi, 'panoramas'=>$panoramas, 'kampungs'=>$kampungs, 'counts'=>$counts]);
    }

    //Menuju Panorama
    public function goto($nama_panorama){
      $panorama = Panorama::where('nama_panorama', $nama_panorama)->first();
      $linkPanorama = Pindah_Panorama::where('key_parent',$panorama->key_panorama)->get();
      $deskripsi = Informasi::where('panorama_id',$panorama->key_panorama)->get();
      $panoramas = Panorama::all();
      return view('user_panorama', ['panorama'=>$panorama, 'linkPanorama'=>$linkPanorama, 'deskripsi'=>$deskripsi,'panoramas'=>$panoramas]);
    }

    //Menuju Panorama VR
    public function vrmode($nama_panorama){
      $panorama = Panorama::where('nama_panorama', $nama_panorama)->first();
      $linkPanorama = Pindah_Panorama::where('key_parent',$panorama->key_panorama)->get();
      $deskripsi = Informasi::where('panorama_id',$panorama->key_panorama)->get();
      $panoramas = Panorama::all();
      return view('user_panorama', ['panorama'=>$panorama, 'linkPanorama'=>$linkPanorama, 'deskripsi'=>$deskripsi,'panoramas'=>$panoramas]);
    }



}
