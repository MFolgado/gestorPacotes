<?php

namespace Blit\Accounts\Http\Controllers;

use App\Http\Controllers\Controller;
use Blit\Accounts\Models\Account;
use Blit\Roles\Models\Role;
use Illuminate\Http\Request;

class AccountsController extends Controller
{

    private $account;

    public function __construct(Account $account){
        $this->account = $account;
    }


    public function index(){

        $accounts = Account::paginate(10);

        $account = Account::find(1);

        return view('BlitAccounts::accounts.index')
            ->with('accounts',$accounts);

    }

    public function create(){


        return view('BlitAccounts::accounts.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['active'] = isset($input['active'])? 1 : 0;

        Account::create($input);

        return redirect(route('accounts.index'));
    }

    public function edit(Account $account)
    {
        return view('BlitAccounts::accounts.edit')
            ->with('account', $account);
    }

    public function update(Request $request, Account $account)
    {

        $input = $request->all();
        $input['active'] = isset($input['active']) ? 1 : 0;

        $account->update($input);

        return redirect(route('accounts.index'));
    }

    public function destroy($id){

        $account = Account::find($id);
        if($account)
        {
            $account->delete();
        }

        return redirect(route('accounts.index'));

    }

    public function show($id){

    }

    public function getRole($id)
    {
        $roles = Role::where('account_id', $id)->paginate(10);

        $account = Account::find($id);

        return view('BlitAccounts::accounts.role', compact('roles', 'account'));

    }



}
