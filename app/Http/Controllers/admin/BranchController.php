<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Bank;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BranchController extends Controller
{
    /**
     * BranchController constructor.
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
        $search = $request->input('search');
        $bank_id= $request->get('bank_id');


        $limit=4;
        $num  = num_rows($request->input('page'), $limit);

        if($bank_id!="") {
            $bank = Bank::find($bank_id);
            $branches = $bank->branches;
            $branches = $this->paginate($branches, $limit);

        }
         else{
              $branches = $search?
                 Branch::search($search)
                 : Branch::paginate($limit);
         }

        $data = [
            'branches' => $branches,
        ];

        return view('admin.branch.index')->with($data);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $banks = Bank::all();
        $countries = CountryListFacade::getList('en');
        $data = [
            'countries' => $countries,
            'banks' =>$banks,
            'bank_id' => $request->get('bank_id')!="" ? $request->get('bank_id') : '',
        ];

        return view('admin.branch.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $resp = $request->validate($this->validator(null));
        Branch::create($request->all());
        return redirect('admin/branch')->with("status", "Branch details added successfully");
    }

    /**
     * @param null $id
     * @return array
     */
    public function validator($id = null): array
    {
        $str = isset($id) ? "," . $id : '';
        return [
            'bank_id' => ['required'],
            'branch_code' => ['required', 'unique:branches,branch_code' . $str],
            'address_line1' => ['required'],
            'address_line2' => 'required',
            'city' => ['required', 'max:30'],
            'country' => ['required', 'max:3'],
            'postcode' => ['required'],
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $countries = CountryListFacade::getList('en');
        $banks = Bank::all();
        $data = [
            'branch' => $branch,
            'countries' => $countries,
            'banks' => $banks
        ];

        return view('admin.branch.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);
        $request->validate($this->validator($id));
        $branch->update($request->all());
        return redirect('admin/branch')->with("status", "Branch details updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return redirect('admin/branch')->with("status", "Branch deleted successfully");
    }
}
