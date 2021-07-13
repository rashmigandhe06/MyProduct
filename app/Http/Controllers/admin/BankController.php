<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;

class BankController extends Controller
{
    /**
     * BankController constructor.
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

        $banks = $search?
              Bank::search($search)
            : Bank::paginate($limit);

        $data = [
            'banks' => $banks,
            'num' => $num
        ];

        return view('admin.bank.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = CountryListFacade::getList('en');
        $data = [
            'countries' => $countries
        ];
        return view('admin.bank.create')->with($data);
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
        Bank::create($request->all());
        return redirect('admin/bank')->with("status", "Bank details added successfully");
    }

    /**
     * @param null $id
     * @return array
     */
    public function validator($id = null): array
    {
        $str = isset($id) ? "," . $id : '';
        return [
            'bank_name' => ['required', 'unique:banks,bank_name' . $str],
            'bank_code' => ['required', 'unique:banks,bank_code' . $str],
            'country' => ['required', 'max:3'],
           ];

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        $countries = CountryListFacade::getList('en');
        $data = [
            'bank' => $bank,
            'countries' => $countries
        ];

        return view('admin.bank.edit')->with($data);
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
        $bank = Bank::find($id);
        $request->validate($this->validator($id));
        $bank->update($request->all());
        return redirect('admin/bank')->with("status", "Bank details updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::find($id);
        $bank->delete();
        return redirect('admin/bank')->with("status", "Bank deleted successfully");

    }
}
