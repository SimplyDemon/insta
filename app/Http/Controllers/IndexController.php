<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $allContacts  = Contact::orderBy( 'id', 'asc' )->get();
        $userContacts = User::find( Auth::user()->id )->contacts->sortByDesc( 'pivot.created_at' );

        return view( 'index', [
            'allContacts'  => $allContacts,
            'userContacts' => $userContacts,
        ] );
    }
}
