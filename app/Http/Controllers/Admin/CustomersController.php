<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller {
    
    public function index(){
        $customers = Customer::all();
        return view('admin.customers.index', ['customers' => $customers]);
    }

    public function create(){
        return view('admin.customers.create');
    }

    public function store(Request $request){
        $params = $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:customers,email'],
            'phone' => ['required', 'digits:10', 'numeric']
        ]);
        $params['phone'] = $this->formatPhoneNumber($params['phone']);
        Customer::create($params);
        return redirect('/adminonline/customers')->with('success', 'Cliente creado correctamente');
    }

    public function edit(Customer $customer){
        return view('admin.customers.edit', ['customer' => $customer]);
    }

    public function update(Customer $customer){
        $currentEmail = $customer->email;
        $emailParam = request()->input('email');
        if ($currentEmail == $emailParam) {
            $params = request()->validate([
                'name' => ['required'],
                'phone' => ['required', 'digits:10', 'numeric']
            ]);
        } else {
            $params = request()->validate([
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:customers,email'],
                'phone' => ['required', 'digits:10', 'numeric']
            ]);
        }
        $params['phone'] = $this->formatPhoneNumber($params['phone']);
        $customer->update($params);
        return redirect('/adminonline/customers')->with('success', 'Cliente actualizado correctamente');
    }

    public function delete(Customer $customer){
        $customer->delete();
        return redirect('/adminonline/customers')->with('success', 'Cliente eliminado correctamente');
    }

    private function formatPhoneNumber(string $phone): string {
        $part1 = substr($phone, 0, 3);
        $part2 = substr($phone, 3, 3);
        $part3 = substr($phone, 6);
        return $part1.'-'.$part2.'-'.$part3;
    }
}
