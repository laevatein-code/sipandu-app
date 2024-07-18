<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Item;
use App\Models\Wokrspace;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DistribusiController extends Controller
{
    public function index() : View
    {
        $ipds = Item::distribusiItem();
        $workspace = Wokrspace::distribusiWorkspace();
        $anggota = Anggota::all(['nama']);

        if(auth()->user()->seksi_id == 2 || auth()->user()->status == 'Admin') {
            return view('distribusi', ['items' => $ipds, 'workspace' => $workspace, 'anggota' => $anggota]);
        }

        return view('home');
    }   

    public function download($id){
        $file = Item::findOrFail($id);
        return Storage::download('public/uploads/'.$file->fileNames);

    }

    public function createWorkspace() : View
    {
        return view('distribusi');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = $request->user();
        $request->validate([
            'name' => 'required',
        ]);

        Wokrspace::create([
            'nama' => $request->name,
            'author_id' => $user->pengguna_id,
            'seksi_id' => 2
        ]);

        return redirect('/distribusi')->with(['sukses' => 'Data Berhasil Disimpan']);
    }

    public function destroy($workspace){
        if(Item::where('workspace_id',$workspace)->exists()){
            return redirect('distribusi')->with(['sukses' => 'Hapus semua task terlebih dahulu']);
        } else {
            Wokrspace::destroy($workspace);
            
            return redirect('distribusi')->with(['sukses' => 'Data Berhasil Dihapus']);
        }
    }

    public function deleteItems($id): RedirectResponse
    {
        $item = Item::findOrFail($id);

        if(Storage::exists('public/uploads/'.$item->fileNames)){
            Storage::delete('public/uploads/'.$item->fileNames);
        }

        $item->delete();
        
        return redirect('/distribusi')->with(['sukses' => 'Data Berhasil Dihapus']);
    }

    public function update(Request $request,$workspace): RedirectResponse
    {
        
        $updated = Wokrspace::where('id', $workspace)->update(['nama'=>$request->nama]);

        if($updated){
            return redirect('distribusi')->with(['sukses' => 'Data Berhasil Diupdate']);
        } else {
            return redirect('distribusi')->with(['sukses' => 'Data Gagal diedit']);
        }
    }

    public function updateItems(Request $request, $id): RedirectResponse
    {
        $data = Item::findOrFail($id);

        $request->validate([
            'namaTugas' => 'required',
            'anggota' => 'required',
            'status' => 'required',
            'dateRange' => 'required',
            'file' => 'nullable|file'
        ]);

        $anggotaTags = json_decode($request->input('anggota'), true);

        $tags = [];

        foreach($anggotaTags as $tag){
            $tags[] = $tag['value'];
        }

        $anggotaTagsString = implode(',', $tags);

        if($request->file('file') != null){
            if(Storage::exists('public/uploads/'.$data->fileNames)){
                Storage::delete('public/uploads/'.$data->fileNames);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            list($startDate, $endDate) = explode(' - ', $request->dateRange);

            Item::where('id',$id)->update([
                'nama' => $request->namaTugas,
                'Anggota' => $anggotaTagsString,
                'status' => $request->status,
                'dateStart' => $startDate,
                'dateEnd' => $endDate,
                'files' => '/storage/'.$filePath,
                'fileNames'=> $fileName
            ]);
        } else {
            list($startDate, $endDate) = explode(' - ', $request->dateRange);

            Item::where('id',$id)->update([
                'nama' => $request->namaTugas,
                'Anggota' => $anggotaTagsString,
                'status' => $request->status,
                'dateStart' => $startDate,
                'dateEnd' => $endDate,
                'files' => null,
                'fileNames' => null
            ]);
        
        }

        return redirect('distribusi')->with(['sukses' => 'Data Berhasil diedit']);
    }

    public function storeItems(Request $request, $workspace): RedirectResponse
    {
        $user = $request->user();

        $request->validate([
            'namaTugas' => 'required',
            'anggota' => 'required',
            'status' => 'required',
            'dateRange' => 'required',
            'file' => 'nullable|file'
        ]);

        $anggotaTags = json_decode($request->input('anggota'), true);

        $tags = [];

        foreach($anggotaTags as $tag){
            $tags[] = $tag['value'];
        }

        $anggotaTagsString = implode(',', $tags);

        if($request->file('file') != null){
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            list($startDate, $endDate) = explode(' - ', $request->dateRange);

            Item::create([
                'nama' => $request->namaTugas,
                'Anggota' => $anggotaTagsString,
                'status' => $request->status,
                'dateStart' => $startDate,
                'dateEnd' => $endDate,
                'files' => '/storage/'.$filePath,
                'fileNames'=> $fileName,
                'workspace_id' => $workspace,
            ]);
        } else {
            list($startDate, $endDate) = explode(' - ', $request->dateRange);

            Item::create([
                'nama' => $request->namaTugas,
                'Anggota' => $anggotaTagsString,
                'status' => $request->status,
                'dateStart' => $startDate,
                'dateEnd' => $endDate,
                'workspace_id' => $workspace,
        ]);
        
        }

        return redirect('/distribusi')->with(['sukses' => 'Data Berhasil Disimpan']);

    }

    public function upload(Request $request, $id): RedirectResponse
    {
        $upload = Item::where('id', $id);

        $upload->update(['is_upload' => $request->upload]);

        return redirect('distribusi')->with(['sukses'=>'Data Berhasil '. $request->upload]);
    }
}
