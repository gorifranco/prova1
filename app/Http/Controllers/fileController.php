<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class fileController extends Controller
{
  public function createForm(){
$files = DB::select("select * from file");
    return view('file')->with('files', $files);
  }
  public function fileUpload(Request $req){
        $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf'
        ]);

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('public/uploads', $fileName);
            $req->file('file')->move('uploads/', $fileName);
            DB::table('file')->insert(['name'=> $fileName]);
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }
   public function fileview($file_id){
     $file = DB::select("select * from file where file.file_id=".$file_id);
     $filesrc ="/uploads/".$file[0]->name;
     return view('fileview')->with('filesrc', $filesrc);
   }

   public function deletefile($file_id){
    $file = DB::select("select * from file where file_id ='".$file_id."';");
    File::delete(public_path("uploads/{$file[0]->name}"));
    DB::table('file')->delete(['file_id'=> $file_id]);
    return view('file');
   }
   
}