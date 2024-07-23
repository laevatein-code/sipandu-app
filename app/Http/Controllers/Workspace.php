<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class Workspace extends Controller
{
    public function index(): View
    {
        $tasks = Item::all()->where('petugas', auth()->user()->info->nama);

        return view('contents/workspace', ['tasks' => $tasks]);
    }

    public function updateProgress(Request $request, $id): RedirectResponse
    {
        $task = Item::findOrFail($id);
        $task->update([
            'progress' => $request->dropdown
        ]);

        return redirect('contents/workspace')->with('success', 'Berhasil mengupdate progress');
    }

    public function editFile($id)
    {
        $item = Item::findOrFail($id);

        return view('modal/editWorkspace', ['item'=>$item]);
    }

    public function updateFile(Request $request, $id): RedirectResponse
    {
        $item = Item::findOrFail($id);

        if($request->file('upload') != null){
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            if(Storage::exists('public/uploads/'.$item->namaFile)){
                Storage::delete('public/uploads/'.$item->namaFile);
            }

            Item::where('id',$id)->update([
                'pathFile' => '/storage/'.$filePath,
                'namaFile'=> $fileName
            ]);
        } else {
            if(Storage::exists('public/uploads/'.$item->namaFile)){
                Storage::delete('public/uploads/'.$item->namaFile);
            }

            Item::where('id',$id)->update([
                'pathFile' => null,
                'namaFile'=> null
            ]);
        }

        return redirect('contents/workspace/')->with('success', 'Berhasil mengupdate file');
    }
}
