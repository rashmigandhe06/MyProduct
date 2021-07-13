<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Monarobase\CountryList\CountryListFacade;
use App\Rules\NationalInsuranceNumberRule;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(Request $request){

        $countries = CountryListFacade::getList('en');

        $user = auth()->user();
        $data =[
            'details' => $user,
            'countries' => $countries
        ];

        return view('user.profile')->with($data);
    }

    /**
     * @param null $id
     * @return array
     */
    public function validator($id = null): array
    {
        $str = isset($id) ? "," . $id : '';
        return [
            'name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'phone_no' => ['required'],
            'address_line1' => ['required'],
            'address_line2' => 'required',
            'city' => ['required', 'max:30'],
            'country' => ['required', 'max:3'],
            'postcode' => ['required'],
             'ni_number' => [new NationalInsuranceNumberRule],
        ];


    }


    public function update(Request $request){

        $request->validate($this->validator(null));

        $user = User::findOrfail(auth()->user()->id);
        $dataArr = $request->all();
        if($request->file()) {
            $fileName = time().'_'.$request->image_url->getClientOriginalName();
            $filePath = $request->file('image_url')->storeAs('uploads', $fileName, 'public');
            $dataArr['image_url'] = '/storage/' . $filePath;
        }

        $user->update($dataArr);

        return redirect('profile')->with("status", "Profile details updated successfully");


    }
}
