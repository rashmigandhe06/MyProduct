<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;

class DocumentController extends Controller
{
    /**
     * DocumentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit=4;
        $num  = num_rows($request->input('page'), $limit);

        $search = $request->input('search');

        $documents = $search?
            Document::search($search)
            : Document::paginate($limit);

        $data = [
            'documents' => $documents,
            'num' => $num
        ];

        return view('admin.document.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //validate
        $resp = $request->validate($this->validator(null));
        Document::create($request->all());
        return redirect('admin/document')->with("status", "Document details added successfully");
    }

    /**
     * @param null $id
     * @return array
     */
    public function validator($id = null): array
    {
        $str = isset($id) ? "," . $id : '';
        return [
            'document_name' => ['required', 'unique:documents,document_name' . $str],
            'is_required' => ['required'],
        ];

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $data = [
            'document' => $document
        ];

        return view('admin.document.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $document = Document::find($id);
        $request->validate($this->validator($id));
        $document->update($request->all());
        return redirect('admin/document')->with("status", "Document details updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();
        return redirect('admin/document')->with("status", "Document deleted successfully");
    }
}
