<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Member;
use App\Models\Workspace;
use App\Models\WorkspaceMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class Management extends Controller
{
    public function index(): View
    {
        $workspace = Workspace::all();
        $anggotaW = WorkspaceMember::all();
        return view('contents/management', ['workspace' => $workspace, 'anggota' => $anggotaW]);
    }

    public function store(Request $request): RedirectResponse
    {
        $user = auth()->user();
        $validate = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required'
        ]);

        Workspace::create([
            'nama' => $validate['nama'],
            'keterangan' => $validate['keterangan'],
            'author' => $user->info->nama,
            'workspace_seksi' => $user->info->id
        ]);

        return redirect('contents/management')->with('success', 'Berhasil Menambah Workspace');
    }

    public function hapus($post): RedirectResponse
    {
        
        if(Item::all()->where('w_id',$post)->first() != null){
            return redirect('contents/management')->with('success','Hapus terlebih dahulu semua items');
        } else {
            DB::statement('PRAGMA foreign_keys = OFF');

            Workspace::destroy($post);

            DB::statement('PRAGMA foreign_keys = ON');

            if(DB::table('workspaceMembers')->where('w_id', $post) != null){
                DB::table('workspaceMembers')->where('w_id', $post)->delete();
            }

            return redirect('contents/management')->with('success','Workspace berhasil dihapus');
        }
       
    }

    public function editWorkspace($id){
        $workspace = Workspace::findOrFail($id);

        return view('modal/managementEdit', ['workspace' => $workspace]);
    }

    public function updateWorkspace(Request $request, $id): RedirectResponse
    {
        $validate = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required'
        ]);

        $workspace = Workspace::findOrFail($id);

        $workspace->update([
            'nama' => $validate['nama'],
            'keterangan' => $validate['keterangan']
        ]);

        return redirect('contents/management')->with('success', 'Workspace berhasil diupdate');
    }

    public function tambahAnggota($id){

        $workspace = Workspace::findOrFail($id);
        $member = Member::all();

        return view('modal/managementAnggota', ['workspace' => $workspace, 'member' => $member]);
    }

    public function createAnggota(Request $request, $id): RedirectResponse
    {
        $anggotaTags = json_decode($request->input('anggota'), true);

        $tags = [];

        foreach($anggotaTags as $tag){
            $tags[] = $tag['value'];

            WorkspaceMember::create([
                'w_id' => $id,
                'w_anggota' => $tag['value']
            ]);
        }

        return redirect('contents/management')->with('success', 'Berhasil tambah anggota');
    }

    public function getItems($id){
        $idWorkspace = Workspace::findOrFail($id);
        $items = Item::all()->where('w_id', $id);

        return view('contents/items', ['id_w' => $idWorkspace->id, 'items' => $items]);
    }

    public function tambahItems($id){
        $idWorkspace = Workspace::findOrFail($id);
        $member = WorkspaceMember::all()->where('w_id',$id);

        return view('modal/tambahItems', ['id_w' => $idWorkspace->id, 'member' => $member]);
    }

    public function createItems(Request $request, $id): RedirectResponse
    {
        $validate = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'dateRange' => 'required',
            'anggota' => 'required',
            'upload' => 'nullable|file'
        ]);

        $anggotaTags = json_decode($request->input('anggota'), true);

        $tags = [];

        foreach($anggotaTags as $tag){
            $tags[] = $tag['value'];
        }

        if($request->file('upload') != null){
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            list($startDate, $endDate) = explode(' - ', $request->dateRange);

            Item::create([
                'nama' => $validate['nama'],
                'petugas' => $tags[0],
                'keterangan' => $validate['keterangan'],
                'progress' => 'Belum Mulai',
                'waktuMulai' => $startDate,
                'waktuSelesai' => $endDate,
                'pathFile' => '/storage/'.$filePath,
                'namaFile'=> $fileName,
                'w_id' => $id,
            ]);
        } else {
            list($startDate, $endDate) = explode(' - ', $request->dateRange);

            Item::create([
                'nama' => $validate['nama'],
                'petugas' => $tags[0],
                'keterangan' => $validate['keterangan'],
                'progress' => 'Belum Mulai',
                'waktuMulai' => $startDate,
                'waktuSelesai' => $endDate,
                'w_id' => $id,
            ]);
        
        }

        return redirect('contents/items/'.$id)->with('success', 'Berhasil menambah item');
    }

    public function hapusItem($post): RedirectResponse
    {
        DB::statement('PRAGMA foreign_keys = OFF');

        if(Storage::exists('public/uploads/'.Item::findOrFail($post)->namaFile)){
            Storage::delete('public/uploads/'.Item::findOrFail($post)->namaFile);
        }

        Item::destroy($post);

        DB::statement('PRAGMA foreign_keys = ON');

        return redirect('contents/management')->with('success','Item berhasil dihapus');
    }

    public function editItem($id)
    {
        $item = Item::findOrFail($id);
        $member = WorkspaceMember::all()->where('w_id',$item->w_id);

        return view('modal/editItems', ['member'=>$member, 'item'=>$item]);
    }

    public function updateItem(Request $request, $id): RedirectResponse
    {
        $item = Item::findOrFail($id);
        $validate = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'dateRange' => 'required',
            'anggota' => 'required',
            'upload' => 'nullable|file'
        ]);

        $anggotaTags = json_decode($request->input('anggota'), true);

        $tags = [];

        foreach($anggotaTags as $tag){
            $tags[] = $tag['value'];
        }

        if($request->file('upload') != null){
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            if(Storage::exists('public/uploads/'.$item->namaFile)){
                Storage::delete('public/uploads/'.$item->namaFile);
            }

            list($startDate, $endDate) = explode(' - ', $request->dateRange);

            Item::where('id',$id)->update([
                'nama' => $validate['nama'],
                'petugas' => $tags[0],
                'keterangan' => $validate['keterangan'],
                'progress' => 'Belum Mulai',
                'waktuMulai' => $startDate,
                'waktuSelesai' => $endDate,
                'pathFile' => '/storage/'.$filePath,
                'namaFile'=> $fileName
            ]);
        } else {
            list($startDate, $endDate) = explode(' - ', $request->dateRange);

            Item::where('id',$id)->update([
                'nama' => $validate['nama'],
                'petugas' => $tags[0],
                'keterangan' => $validate['keterangan'],
                'progress' => 'Belum Mulai',
                'waktuMulai' => $startDate,
                'waktuSelesai' => $endDate
            ]);
        }

        return redirect('contents/items/'.$item->w_id)->with('success', 'Berhasil mengupdate item');
    }

    public function download($id){
        $file = Item::findOrFail($id);

        return Storage::download('public/uploads/'.$file->namaFile);
    }
}
