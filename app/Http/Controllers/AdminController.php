<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kampung;
use App\Models\Panorama;
use App\Models\Informasi;
use App\Models\Pindah_Panorama;
use App\Models\AkunAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

   public function login(){
     return view('login');
   }

   //Contoller logika untuk login
  public function loginPost(Request $request){
      $username = $request->username;
      $pass = $request->password;
      $data = AkunAdmin::where('username',$username)->first();

        //  if($data->count() > 0){
        try { //try
        if($data->count() > 0){ //apakah username tersebut ada atau tidak
          if(Hash::check($pass, $data->password)){
            Session::put('username',$data->username);
            Session::put('login',TRUE);
            return redirect('admin');
            }
            else{
                return redirect('login')->with('alert','Username atau password tidak sesuai'.Hash::check($password,$data->password));
            }
        }
        else{
            return redirect('login')->with('alert','Username atau password tidak sesuai');
        }
      } catch (\Throwable $ex) { //catch
        return redirect('login')->with('alert','Username atau password tidak sesuai'); //catch
      } //catch
  }

   public function register(){
     return view('register');
   }

   public function registerPost(Request $request){
     $data = new AkunAdmin;
     $data->userName= $request->username;
     $data->password = bcrypt($request->password);
     $data->save();
     return redirect('login');
   }

   public function logout(){
     Session::flush();
      return redirect(url('login'));
   }

   public function admin(){

     $key_kampung = Kampung::all();

     return view('admin_home', ['key_id'=>$key_kampung]);
   }

   public function getTambahKampung(){

     return view('tambah_kampung');
   }

   public function setTambahKampung(Request $request){
     $tambah_kampung = new Kampung;
     $tambah_kampung->key_id = $request->key_kampung;
     $tambah_kampung->nama_tempat = $request->nama_tempat;
     $tambah_kampung->link_gambar = $request->link_kampung;
     $tambah_kampung->save();
     return redirect('admin');
   }

   public function editKampung($id){
     $key_kampung = Kampung::where('key_id', $id)->first();
     $panorama = Panorama::where('key_panorama', 'HOME1')->first();
     // $target = Panorama::where('kampung_id', 'HOME1')->first();
     $target = Panorama::where('kampung_id', $panorama->kampung_id)->first();
     $panoramas = Panorama::all();
     return view('edit_kampung', ['key_id'=>$key_kampung, 'panoramas'=>$panoramas, 'target'=>$target, 'panorama'=>$panorama]);
   }

   public function updateKampung(Request $request, $id){
     $key_kampung = Kampung::find($id);
     $key_kampung->nama_tempat = $request->nama_tempat;
     $key_kampung->link_gambar = $request->link_kampung;

     $pindah_spot = new Pindah_Panorama;
     $pindah_spot->key_parent = $request->key_parent;
     $panorama = Panorama::where('nama_panorama', $request->key_target)->first();
     $pindah_spot->key_target = $panorama->key_panorama;
     $pindah_spot->pos_x = '0';
     $pindah_spot->pos_y = '0';
     $pindah_spot->pos_z = '0';
     $pindah_spot->rot_x = '0';
     $pindah_spot->rot_y = '0';
     $pindah_spot->rot_z = '0';
     $key_kampung->save();
     $pindah_spot->save();
     return redirect('admin');
   }

   public function destroy($id){
     $key_kampung = Kampung::find($id);
     // $panorama = Panorama::where('kampung_id', $key_kampung->key_id)->get();
     // $deskripsi = Informasi::where('panorama_id', $panorama->panorama_id);
     // $pindah_spot = Pindah_Panorama::where('key_parent', $panorama->key_parent);
     $key_kampung->delete();
     // $panorama->delete();
     // $deskripsi->delete();
     // $pindah_spot->delete();
     return redirect('admin');
   }

   public function getPanorama($id){
     $kampung = Kampung::where('key_id',$id)->first();
     $key_kampung = Panorama::where('kampung_id',$id)->get();
     return view('admin_panorama', ['pan'=>$key_kampung, 'kampung'=>$kampung]);
   }

   public function getTambahPanorama($id){
     $id_kampung = Kampung::where('key_id',$id)->first();
     return view('tambah_panorama', ['key_kampung'=>$id_kampung]);
   }

   public function setTambahPanorama(Request $request, $id){
     $tambah_panorama = new Panorama;
     $tambah_panorama->key_panorama = $request->key_panorama;
     $tambah_panorama->nama_panorama = $request->nama_panorama;
     $tambah_panorama->link_thumb = $request->link_thumb;
     $tambah_panorama->link_panorama = $request->link_panorama;
     $tambah_panorama->kampung_id = $id;
     $tambah_panorama->save();
     return redirect('panorama/'.$tambah_panorama->kampung_id);
   }

   public function destroyPanorama($id){
     $panorama = Panorama::find($id);
     $deskripsi = Informasi::where('panorama_id', $panorama->panorama_id);
     $pindah_spot = Pindah_Panorama::where('key_parent', $panorama->key_parent);
     $panorama->delete();
     $deskripsi->delete();
     $pindah_spot->delete();
     return redirect ('panorama/'.$panorama->kampung_id);
   }

   public function getEditPanorama($key_panorama){//key_panorama
     $kPanorama = Panorama::where('key_panorama', $key_panorama)->first();
     return view('edit_panorama', ['kPan'=>$kPanorama]);
   }

   public function updatePanorama(Request $request, $id){
     $pan = Panorama::find($id);
     $pan->nama_panorama = $request->nama_panorama;
     $pan->link_thumb = $request->link_thumb;
     $pan->link_panorama = $request->link_gambar_panorama;
     $pan->kampung_id = $request->kampung_id;
     $pan->save();
     return redirect ('panorama/'.$pan->kampung_id);
   }

   public function getInformasi($panorama_id){
     $panorama = Panorama::where('key_panorama', $panorama_id)->first();
     $deskripsi = Informasi::where('panorama_id', $panorama_id)->get();
     $pindah = Pindah_Panorama::where('key_parent', $panorama_id)->get();
     $panoramas = Panorama::all();
     return view('admin_informasi', ['deskripsi'=>$deskripsi, 'pindah'=>$pindah, 'panorama'=>$panorama, 'panoramas'=>$panoramas]);
   }

   public function getTambahDeskripsi ($panorama_id){
     $panorama = Panorama::where('key_panorama',$panorama_id)->first();
     return view('tambah_deskripsi', ['kPan'=>$panorama]);
   }

   public function setTambahDeskripsi(Request $request, $id){
     $tambah_deskripsi = new Informasi;
     $tambah_deskripsi->panorama_id = $request->id_panorama;
     $tambah_deskripsi->informasi_id = $request->id_deskripsi;
     $tambah_deskripsi->informasi_panorama = $request->deskripsi;
     $tambah_deskripsi->pos_x = $request->pos_x;
     $tambah_deskripsi->pos_y = $request->pos_y;
     $tambah_deskripsi->pos_z = $request->pos_z;
     $tambah_deskripsi->rot_x = $request->rot_x;
     $tambah_deskripsi->rot_y = $request->rot_y;
     $tambah_deskripsi->rot_z = $request->rot_z;
     $tambah_deskripsi->save();
     return redirect('informasi/'.$tambah_deskripsi->panorama_id);
   }

   public function getEditDeskripsi($key_deskripsi){
     $kDeskripsi = Informasi::where('informasi_id', $key_deskripsi)->first();
     return view('edit_deskripsi', ['kDes'=>$kDeskripsi]);
   }

   public function updateDeskripsi(Request $request, $id){
     $des = Informasi::find($id);
     $des->informasi_panorama = $request->deskripsi;
     $des->pos_x = $request->pos_x;
     $des->pos_y = $request->pos_y;
     $des->pos_z = $request->pos_z;
     $des->rot_x = $request->rot_x;
     $des->rot_y = $request->rot_y;
     $des->rot_z = $request->rot_z;
     $des->panorama_id = $request->panorama_id;
     $des->save();

     return redirect('informasi/'.$des->panorama_id);
   }

   public function destroyDeskripsi($id){
     $informasi = Informasi::find($id);
     $informasi->delete();
     return redirect ('informasi/'.$informasi->panorama_id);
   }

   public function getPindahSpot($key_panorama){
     $panorama = Panorama::where('key_panorama', $key_panorama)->first();
     $panoramas = Panorama::all();
     $target = Panorama::where('kampung_id', $panorama->kampung_id)->first();
     return view('tambah_pindahSpot', ['panorama'=>$panorama, 'panoramas'=>$panoramas, 'target'=>$target]);
   }

   public function setPindahSpot(Request $request){
     $pindah_spot = new Pindah_Panorama;
     $pindah_spot->key_parent = $request->key_parent;
     $pindah_spot->pos_x = $request->pos_x;
     $pindah_spot->pos_y = $request->pos_y;
     $pindah_spot->pos_z = $request->pos_z;
     $pindah_spot->rot_x = $request->rot_x;
     $pindah_spot->rot_y = $request->rot_y;
     $pindah_spot->rot_z = $request->rot_z;
     $panorama = Panorama::where('nama_panorama', $request->key_target)->first();
     $pindah_spot->key_target = $panorama->key_panorama;
     $pindah_spot->save();
     return redirect('informasi/'.$pindah_spot->key_parent);
   }

   public function getEditPindahSpot($id){
     $pindah_spot = Pindah_Panorama::find($id);
     $target = Panorama::where('key_panorama', $pindah_spot->key_target)->first();
     $kampung = Panorama::where('kampung_id', $target->kampung_id)->first();
     $panoramas = Panorama::all();
     return view('edit_pindahSpot', ['pindah_spot'=>$pindah_spot, 'target'=>$target, 'panoramas'=>$panoramas, 'kampung'=>$kampung]);
   }

   public function updatePindahSpot(Request $request, $id){
     $pindah_spot = Pindah_Panorama::find($id);
     $pindah_spot->key_parent = $request->key_parent;
     $pindah_spot->pos_x = $request->pos_x;
     $pindah_spot->pos_y = $request->pos_y;
     $pindah_spot->pos_z = $request->pos_z;
     $pindah_spot->rot_x = $request->rot_x;
     $pindah_spot->rot_y = $request->rot_y;
     $pindah_spot->rot_z = $request->rot_z;
     $target = Panorama::where('nama_panorama', $request->key_target)->first();
     $pindah_spot->key_target = $target->key_panorama;
     $pindah_spot->save();
     return redirect('informasi/'.$pindah_spot->key_parent);
   }

   public function destroyPindahSpot($id){
     $pindah_spot = Pindah_Panorama::find($id);
     $panorama = Panorama::where('key_panorama', $pindah_spot->key_parent)->first();
     $pindah_spot->delete();
     return redirect ('informasi/'.$panorama->key_panorama);
   }
}
