<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactAdd;
use App\Http\Requests\ContactRemove;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function contactAdd( ContactAdd $request ) {
        $message = 'Contact was added!';
        $user    = User::find( Auth::user()->id );
        $user->contacts()->attach( $request->contact_id );

        $request->session()->flash( 'message', $message );

        return redirect()->route( 'index' );
    }

    public function contactRemove( ContactRemove $request ) {
        $message = 'Contact was removed!';
        $user    = User::find( Auth::user()->id );
        $user->contacts()->detach( $request->contact_id );

        $request->session()->flash( 'message', $message );

        return redirect()->route( 'index' );
    }
}
