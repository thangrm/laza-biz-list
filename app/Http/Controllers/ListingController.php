<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Diff\Line;

class ListingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::orderBy('created_at', 'desc')->get();
        return view('index')->with('listings', $listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nameBusiness' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(0)[0-9]{9,11}/',
            'bio' => 'required'
        ], [
            'nameBusiness.required' => 'Tên doanh nghiệp không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'website.required' => 'Website không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'phone.regex' => 'Số điện thoại không hợp lệ',
            'phone.required' => 'Số điện thoại không được để trống',
            'bio.required' => 'Thông tin không được để trống'
        ]);
        $listing = new Listing();
        $listing->user_id = Auth::id();
        $listing->name = $request->input('nameBusiness');
        $listing->address = $request->input('address');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->bio = $request->input('bio');
        $listing->save();

        return redirect()->to('/home')->with('success', 'Thêm danh sách thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        return view('show')->with('listing', $listing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('edit')->with('listing', $listing);
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
        $this->validate($request, [
            'nameBusiness' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(0)[0-9]{9,11}/',
            'bio' => 'required'
        ], [
            'nameBusiness.required' => 'Tên doanh nghiệp không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'website.required' => 'Website không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'phone.regex' => 'Số điện thoại không hợp lệ',
            'phone.required' => 'Số điện thoại không được để trống',
            'bio.required' => 'Thông tin không được để trống'
        ]);
        $listing = Listing::find($id);
        $listing->name = $request->input('nameBusiness');
        $listing->address = $request->input('address');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->bio = $request->input('bio');
        $listing->save();

        return redirect()->to('/home')->with('success', 'Đã cập nhật thông tin doanh nghiệp thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();
        return redirect()->to('/home')->with('success', 'Đã xóa doanh nghiệp thành công');
    }
}
