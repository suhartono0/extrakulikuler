<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekskul;

use Illuminate\Http\Request;

class UpdprodController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */


    public function index()
    {
        $updprod = Ekskul::latest()->where('type','=','Upd Prod')->paginate(5);
        return view('Admin.updprod.index',compact('updprod'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function create()
    {
        return view('Admin.updprod.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'tempat'=>'required',
            'hari' => 'required',
            'jam' => 'required',
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'tempat' => $dataRequest['tempat'],
            'type' => "Upd Prod",
            'hari' => $dataRequest['hari'],
            'jam' => $dataRequest['jam'],    
            'description' => $dataRequest['description'],  
        ];
        if(!empty($dataRequest['image_1'])){
            $imageName = date('ymdhis').'_image_1.'.$request->image_1->extension();
            $request->image_1->move(public_path('images/updprod'), $imageName);
            $data['image_1'] = $imageName;
        }
        if(!empty($dataRequest['image_2'])){
            $imageName = date('ymdhis').'_image_2.'.$request->image_2->extension();  
            $request->image_2->move(public_path('images/updprod'), $imageName);
            $data['image_2'] = $imageName;
        }
        if(!empty($dataRequest['image_3'])){
            $imageName = date('ymdhis').'_image_3.'.$request->image_3->extension();  
            $request->image_3->move(public_path('images/updprod'), $imageName);
            $data['image_3'] = $imageName;
        }
        Ekskul::create($data);
        
        return redirect()->route('updprod.index')
            ->with('success', 'Success Added Data');

    }

    public function edit($id)
    {
        $updprod = Ekskul::find($id);
        return view('Admin.updprod.update', compact('updprod'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $dataRequest = $request->all();
        $data = [
        
            'name' => $dataRequest['name'],
            'tempat' => $dataRequest['tempat'],
            'type' => "Upd Prod",
            'hari' => $dataRequest['hari'],
            'jam' => $dataRequest['jam'],  
            'description' => $dataRequest['description'],                        
        ];
        if(!empty($dataRequest['image_1'])){
            $imageName = date('ymdhis').'_image_1.'.$request->image_1->extension();
            $request->image_1->move(public_path('images/updprod'), $imageName);
            $data['image_1'] = $imageName;
        }
        if(!empty($dataRequest['image_2'])){
            $imageName = date('ymdhis').'_image_2.'.$request->image_2->extension();  
            $request->image_2->move(public_path('images/updprod'), $imageName);
            $data['image_2'] = $imageName;
        }
        if(!empty($dataRequest['image_3'])){
            $imageName = date('ymdhis').'_image_3.'.$request->image_3->extension();  
            $request->image_3->move(public_path('images/updprod'), $imageName);
            $data['image_3'] = $imageName;
        }
        Ekskul::find($id)->update($data);
        return redirect()->route('updprod.index')
            ->with('success','Success Update Data');
    }
    public function destroy($id)
    {
        Ekskul::find($id)->delete();
        return redirect()->route('updprod.index')
            ->with('success', 'Success Delete Data');
    }
}