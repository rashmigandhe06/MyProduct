<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;


class UserDocumentController extends Controller
{
    /**
     * UserDocumentController constructor.
     */

    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $limit = 4;
        $num = num_rows($request->input('page'), $limit);
        $userDocuments = User::findOrFail(auth()->user()->id)->documents;

        $data = [
            'userDocuments' => $userDocuments,
            'num' => $num
        ];

        return view('user.document.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents = Document::all();
        $data = [
            'documents' => $documents
        ];
        return view('user.document.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $resp = $request->validate($this->validator(null));

        $document_url = "";
        if ($request->file()) {
            $fileName = $request->document_url->getClientOriginalName();
            $filePath = $request->file('document_url')->storeAs('uploads/documents', $fileName, 'public');
            $document_url = '/storage/' . $filePath;
        }

        $user = User::find(auth()->user()->id);

        $user->documents()->attach([
            1 => [
                'document_id' => $request->input("document_id"),
                'document_url' => $document_url,
                'note' => $request->input("note")
            ]
        ]);

        return redirect('document')->with("status", "Document details added successfully");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documents = Document::all();
        $user = User::find(auth()->user()->id);
        $userDocument = $user->documents()->wherePivot('id', '=', $id)->first();

        $data = [
            'documents' => $documents,
            'userDocument' => $userDocument
        ];

        return view('user.document.edit')->with($data);
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
        $resp = $request->validate([
            'document_id' => ['required'],
            'note' => ['required'],
        ]);

        $dataArr = array(
            'document_id' => $request->input("document_id"),
            'note' => $request->input("note"),
        );

        if ($request->file()) {
            $fileName = $request->document_url->getClientOriginalName();
            $filePath = $request->file('document_url')->storeAs('uploads/documents', $fileName, 'public');
            $document_url = '/storage/' . $filePath;
            $dataArr['document_url'] = $document_url;
        }

        $user = User::find(auth()->user()->id);


        $user->documents()
            ->wherePivot('id', '=', $id)
            ->update($dataArr);

        return redirect('document')->with("status", "Document details updated successfully");
    }

    /**
     * @param null $id
     * @return array
     */
    public function validator($id = null): array
    {
        $str = isset($id) ? "," . $id : '';
        return [
            'document_id' => ['required'],
            'document_url' => ['required'],
            'note' => ['required'],
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(auth()->user()->id);
        $user->documents()->wherePivot('id', '=', $id)->detach();

        return redirect('document')->with("status", "User Document deleted successfully");
    }
}
